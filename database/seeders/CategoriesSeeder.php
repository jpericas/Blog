<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Categories();
        $cat->title = "Noves tecnologies";
        $cat->url_clean = "noves_tecnologies";
        $cat->save();

        $cat1 = new Categories();
        $cat1->title = "Menjar";
        $cat1->url_clean = "menjar";
        $cat1->save();
    }
}
