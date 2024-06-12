<?php

namespace App\Models;



class Post 
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Muhammad Fauzan Alfath",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, voluptatem similique quaerat molestias doloribus sed eos error quis hic dolorem pariatur sapiente consequatur impedit suscipit veniam in quod voluptatum nam officia totam nulla fugiat at unde. Voluptatibus, blanditiis voluptates ipsa odit quo aperiam illo iure culpa fugiat nemo adipisci similique ducimus et veniam aliquid rem est! Excepturi obcaecati cum ullam repellendus architecto sint earum dolores? Quod cumque, quaerat eligendi doloribus iste praesentium provident! Libero, explicabo fuga. Repudiandae, et ipsa. Adipisci."
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Mulyadi",
            "slug" => "judul-post-kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora illo fuga iste veniam quod obcaecati et quia ducimus eligendi libero, qui debitis, pariatur iure expedita similique inventore dicta laborum aperiam eos voluptatum enim voluptate. Obcaecati alias asperiores ullam! Iure atque amet commodi quisquam illo repellendus modi deleniti veniam neque recusandae, molestias nulla vero ullam praesentium? Labore consequuntur quod in vero aspernatur quisquam adipisci dolorem libero soluta doloribus natus recusandae, nisi dicta, excepturi quam vel facilis ipsum placeat veritatis impedit magni non dolor nostrum necessitatibus. Sequi perferendis illo debitis blanditiis ipsam deserunt provident dignissimos. Optio quidem ducimus est beatae sunt esse!"
        ],
    ];

    public static function all()
    {
        return collect (self::$blog_posts);
    }

    public static function find ($slug)
    {
        $posts = static::all();
       
        return $posts->firstWhere('slug',$slug);
    }
}
