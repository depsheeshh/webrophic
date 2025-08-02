<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            'slug' => ['required', 'unique:posts'],
            'foto' => 'image|file|max:3024',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        if($request->file('foto')){
            $validate['foto'] = $request->file('foto')->store('foto-post');
        }

        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validate);
        return redirect('/dashboard/posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
       }
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'foto' => 'image|file|max:3024',
            'category_id' => 'required',
            'body' => 'required',
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validate = $request->validate($rules);

        if($request->file('foto')){
            if($request->fotoLama){
                Storage::delete($request->fotoLama);
            }
            $validate['foto'] = $request->file('foto')->store('foto-post');
        }

        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validate);
        return redirect('/dashboard/posts')->with('success', 'Post update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->foto){
            Storage::delete($post->foto);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post deleted successfully');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function showDashboard()
    {
        $user = auth()->user();

        // Data untuk Kartu Statistik
        $totalUserPosts = Post::where('user_id', $user->id)->count();
        $totalCategories = Category::count();

        // Data untuk Chart
        $postsPerDay = Post::where('user_id', $user->id)
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $chartLabels = $postsPerDay->pluck('date')->map(fn ($date) => \Carbon\Carbon::parse($date)->format('d M'));
        $chartData = $postsPerDay->pluck('count');

        // Data untuk Aktivitas Terbaru
        $recentPosts = Post::where('user_id', $user->id)->latest()->take(5)->get();

        // Kirim semua data ke view dashboard utama
        return view('dashboard.index', [
            'totalUserPosts'  => $totalUserPosts,
            'totalCategories' => $totalCategories,
            'chartLabels'     => $chartLabels,
            'chartData'       => $chartData,
            'recentPosts'     => $recentPosts,
        ]);
    }
}
