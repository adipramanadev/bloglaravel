<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //variabel 
        $categories = [
            [
                'namecategory'=>'Entertaiment'
            ],
            [
                'namecategory'=>'News'
            ],
            [
                'namecategory'=>'Olahraga'
            ],
            [
                'namecategory'=>'Travel'
            ],
            
        ];
        //create to database 
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
