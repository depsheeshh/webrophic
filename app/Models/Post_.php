<?php

namespace App\Models;



class Post_
{
    private static $posts_blog = [
        [
        "title" => "Judul Blog Pertama",
        "slug" => "judul-blog-pertama",
        "author" => "Reshfams",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati assumenda inventore, nesciunt laboriosam architecto molestiae ipsa vel accusamus illo autem molestias aliquid consectetur cum magnam. Officia animi odio doloremque nihil, nulla delectus neque molestias nobis totam iusto eligendi pariatur quis praesentium optio ipsum aperiam ea sint esse, incidunt alias tempora soluta, quae amet. Iste unde dolores dolorem quasi ut debitis, rem voluptatum tempore, explicabo commodi a laborum doloremque veniam at? Libero impedit sequi qui quod saepe nam voluptatibus ad eaque",
    ],[
        "title" => "Judul Blog Kedua",
        "slug" => "judul-blog-kedua",
        "author" => "Queen",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quaerat impedit dolor possimus neque praesentium inventore iusto animi. Numquam cupiditate inventore nobis eos nisi, dolores ab. Autem nemo sint dolore, distinctio rerum eos odio, in suscipit commodi officia necessitatibus voluptatum. Vitae, possimus perferendis animi nesciunt fugit, reiciendis ut veritatis inventore corrupti quisquam nemo exercitationem, officia expedita repellat libero tenetur tempora similique enim. Praesentium esse rerum soluta nulla quo, est quos alias magnam veniam, illo consequatur inventore natus necessitatibus incidunt accusamus, delectus cumque odit doloribus tenetur. Tenetur culpa doloremque, facere quia placeat voluptatum reiciendis tempore quidem saepe hic odit, omnis illo?",
    ]
    ];

    public static function all()
    {
        return collect(self::$posts_blog);
    }

    public static function find($slug)
    {
        $posts = static::all();

        // $post = [];
        // foreach($posts as $p){
        //     if ($p['slug'] === $slug){
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
