<?php

use Illuminate\Database\Seeder;

use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // create page: about us

      $faker = Faker\Factory::create();

      $post = new Post();
      $post->user_id = 1;
      $post->post_type = 'page';
      $post->title = 'About Us';
      $post->slug = 'about-us';
      $paragraphs = null;
      $n = 0;
      $paragraphs_num = 5;
      while ($n < $paragraphs_num) {
        $paragraphs .= '<p>' . $faker->paragraph(rand(5, 10), true) . '</p>';
        $n++;
      }
      $post->content = e($paragraphs);
      $post->tags = 'about us';
      $post->is_active = 1;
      $post->is_feature = 0;
      $post->published_at = date( 'Y-m-d H:i:00');
      $post->save();

      // create articles

      $picsums = [1083, 830, 943, 950, 971, 552, 991, 931, 465, 544, 810, 472];
      $picsums = array_reverse($picsums);

      foreach ($picsums as $i => $picsum_id) {
        $faker = Faker\Factory::create();

        $post = new Post();
        $post->user_id = rand(1, 2);
        $post->post_type = 'article';
        $post->category_id = rand(1, 2);
        $post->picsum_id = $picsum_id;

        $title = $faker->sentence(rand(7, 9), true);
        $post->title = e($this->title($title));

        $post->slug = str_slug($title);
        $post->excerpt = e($faker->sentence(rand(15, 20), true));

        $paragraphs = null;
        $n = 0;
        $paragraphs_num = rand(5, 7);
        while ($n < $paragraphs_num) {
          $paragraphs .= '<p>' . $faker->paragraph(rand(5, 10), true) . '</p>';
          $n++;
        }
        $post->content = e($paragraphs);

        $post->tags = $faker->word . ', lorem, ipsum, dolor, sit amet';
        $post->is_active = ($i == (count($picsums) - 1)) ? 0 : 1;
        $post->is_feature = ($i > (count($picsums) - 5)) ? 1 : 0;

        $j = $i + count($picsums) - (2 * $i + 1);
        $post->published_at = date( 'Y-m-d H:i:00', strtotime('-' . $j . ' days') );
        $post->save();
      }
    }

    private function title($str) {
      if (strlen($str)) {
        $str = substr($str, 0, -1); // remove dot at the end of sentences
        return ucwords($str);
      }
      return null;
    }
}
