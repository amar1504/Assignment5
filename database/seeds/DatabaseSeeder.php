<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // to insert fake record in categories table -start
        /* DB::table('categories')->insert([
            'categoryname' => str_random(10),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
        ]); */
        // to insert fake record in categories table -end

        factory(App\Category::class,5)->create(); // to insert 5 fake records in category
         
        factory(App\Product::class,5)->create(); // to insert 5 fake records in product

    }
}
