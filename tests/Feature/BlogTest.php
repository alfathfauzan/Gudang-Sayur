<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    public function testInsert()
    {
        // Blog::create([
        //     'judul_blog' => 'Manfaat Sayur',
        //     'blog_image' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjQj4OTqIrpG9NcKZA1d4zjLTTrsHaWYycT9ziGhXd2caAnywRtvBUYCjYORiiBFM6mdbiPAX0ALUyDVLfrZOcVyA5SzcNqGE438HKoNK-3xTzMMZ19Yaczve0QvfuPAQ7MXebud7G3baisJd8VuO0TG6w17emfTjvKH0_jDXV10UOW2_lvAeviLGdxbqE7/s320/product-1.jpg',
        //     'author' =>''    
        // ])
       $blog = new Blog();
       $blog->judul_blog = "Manfaat Sayur";
       $blog->blog_image = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjQj4OTqIrpG9NcKZA1d4zjLTTrsHaWYycT9ziGhXd2caAnywRtvBUYCjYORiiBFM6mdbiPAX0ALUyDVLfrZOcVyA5SzcNqGE438HKoNK-3xTzMMZ19Yaczve0QvfuPAQ7MXebud7G3baisJd8VuO0TG6w17emfTjvKH0_jDXV10UOW2_lvAeviLGdxbqE7/s320/product-1.jpg";
       $blog->slug = "blog-pertama";
       $blog->author = "Fauzan";
       $blog->isi = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi non, iste rerum cupiditate excepturi repellat mollitia laborum fuga odio officia possimus laudantium illo ab nulla soluta in. Natus, neque consectetur nesciunt quia eius eos nam sequi vero iusto. Sequi dignissimos dolor nesciunt omnis tenetur eaque possimus soluta, voluptatem pariatur ad!";
       $blog->created_at = new \DateTime();
       $blog->updated_at = new \DateTime();
       $result = $blog->save();
       self::assertTrue($result);
    }
}
