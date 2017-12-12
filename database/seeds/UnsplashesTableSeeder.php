<?php

use Illuminate\Database\Seeder;

use App\Unsplash;

class UnsplashesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $picsums = [
        [
          'picsum_id'=> 1083,
          'author'=> 'Sweet Ice Cream Photography'
        ],
        [
          'picsum_id'=> 830,
          'author'=> 'Luca Zanon'
        ],
        [
          'picsum_id'=> 943,
          'author'=> 'Paul Earle'
        ],
        [
          'picsum_id'=> 950,
          'author'=> 'Nitish Kadam'
        ],
        [
          'picsum_id'=> 991,
          'author'=> 'Fritz Bielmeier'
        ],
        [
          'picsum_id'=> 552,
          'author'=> 'Hugo Kerr'
        ],
        [
          'picsum_id'=> 971,
          'author'=> 'Natasha Vasiljeva'
        ],
        [
          'picsum_id'=> 931,
          'author'=> 'Paul Earle'
        ],
        [
          'picsum_id'=> 465,
          'author'=> 'Paula Vermeulen'
        ],
        [
          'picsum_id'=> 544,
          'author'=> 'Francesco Gallarotti'
        ],
        [
          'picsum_id'=> 810,
          'author'=> 'Luis Perdigao'
        ],
        [
          'picsum_id'=> 472,
          'author'=> 'Dustin Scarpitti'
        ]
      ];
      $picsums = array_reverse($picsums);

      foreach ($picsums as $picsum) {
        $faker = Faker\Factory::create();

        $unsplash = new Unsplash;
        $unsplash->picsum_id = $picsum['picsum_id'];
        $unsplash->author = $picsum['author'] . '/Unsplash';
        $unsplash->title = $this->title( $faker->sentence(rand(7, 9), true) );
        $unsplash->caption = $faker->sentence(rand(15, 20), true);
        $unsplash->save();
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
