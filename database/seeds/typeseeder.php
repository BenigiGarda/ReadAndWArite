<?php

use Illuminate\Database\Seeder;

class typeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_type')->insert(
            [
                'type_name' => 'Ruler',
                'type_image' => 'ruler1.jpg',
            ]);
        DB::table('table_type')->insert(
            [
                'type_name' => 'Notebook',
                'type_image' => 'notebook1.jpg',
            ]);
        DB::table('table_type')->insert(
            [
                'type_name' => 'Pencil',
                'type_image' => 'pencil1.jpg',
            ]);    
        DB::table('table_type')->insert(
            [
                'type_name' => 'Smartpen',
                'type_image' => 'smartpen1.jpg',
            ]);          
        DB::table('table_type')->insert(
            [
                'type_name' => 'e-Book',
                'type_image' => 'e-book.jpg',
            ]);    
        DB::table('table_type')->insert(
            [
                'type_name' => 'Dictionary',
                'type_image' => 'kamus1.jpg',
            ]);
        DB::table('table_type')->insert(
            [
                'type_name' => 'pen',
                'type_image' => 'pen1.jpg',
            ]);          
    }
}
