<?php

use Illuminate\Database\Seeder;

use App\Contact;

use Illuminate\Support\Facades\Storage;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 0; $i < 3; $i++) {
        $faker = Faker\Factory::create();
        $contact = new Contact();
        $contact->ip_address = $faker->ipv4;
        $contact->name = $faker->name;
        $contact->email = $faker->email;
        $contact->phone = $faker->phoneNumber;
        $subject = $faker->sentence(rand(4, 7), true);
        $contact->subject = $this->title($subject);
        $contact->message = $faker->text;
        $contact->save();
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
