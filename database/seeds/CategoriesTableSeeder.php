<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = array("Art & Photography", "Audio Books", "Biography", "Business, Finance & Law", "Children's Books",
            "Computing", "Crafts & Hobbies", "Crime & Thriller", "Dictionaries & Languages", "Entertainment", "Fiction", "Food & Drink",
            "Graphic Novels, Anime & Manga", "Health", "History & Archaeology", "Home & Garden", "Humour", "Medical", "Mind, Body & Spirit",
            "Natural History", "Personal Development", "Poetry & Drama", "Reference", "Religion", "Romance", "Science & Geography",
            "Science Fiction, Fantasy & Horror", "Society & Social Sciences", "Sport", "Stationery", "Teaching Resources & Education", "Technology & Engineering",
            "Teen & Young Adult", "Transport", "Travel & Holiday Guides");

        foreach ($categories as $value) {
            DB::table('categories')->insert([
                'name' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
