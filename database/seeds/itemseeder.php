<?php

use Illuminate\Database\Seeder;

class itemseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert(
            [
                'item_name' => 'Penggaris Voila',
                'item_price' => '5000',
                'item_stock' => '50',
                'item_typeid' => '1',
                'item_description' => 'Penggaris voila adalah penggaris yang menyediakan berbagai garis bangun datar sehingga dapat dibuat dengan mudah',
                'item_image' => 'ruler1.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Applepen',
                'item_price' => '10000',
                'item_stock' => '500',
                'item_typeid' => '4',
                'item_description' => 'Smartpen canggih untuk digunakan pada apple phone',
                'item_image' => 'smartpen1.jpg',
            ]);       
        DB::table('item')->insert(
            [
                'item_name' => 'Pencilia',
                'item_price' => '6000',
                'item_stock' => '400',
                'item_typeid' => '3',
                'item_description' => 'Pencilia adalah pencil yang sangat mudah ditajamkan dan tahan patah',
                'item_image' => 'pencil1.jpg',
            ]);                       
        DB::table('item')->insert(
            [
                'item_name' => 'Banbaro Notebook',
                'item_price' => '7000',
                'item_stock' => '100',
                'item_typeid' => '2',
                'item_description' => 'Banbaro Notebook adalah buku tulis ringan dan memiliki banyak halaman, cocok untuk 2 semester sekolah',
                'item_image' => 'notebook3.jpg',
            ]); 

        DB::table('item')->insert(
            [
                'item_name' => 'Wooden Pencil',
                'item_price' => '500',
                'item_stock' => '400',
                'item_typeid' => '3',
                'item_description' => 'Pencil dengna model kayu sederhana',
                'item_image' => 'pencil2.jpg',
            ]);      
        DB::table('item')->insert(
            [
                'item_name' => 'ColorPenta',
                'item_price' => '10000',
                'item_stock' => '30',
                'item_typeid' => '7',
                'item_description' => 'ColorPenta adalah pulpen dengan tinta berwarna khusus tersedia dengan 5 warna',
                'item_image' => 'colorpen.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'SmartBook ETEXT',
                'item_price' => '20000',
                'item_stock' => '18',
                'item_typeid' => '5',
                'item_description' => 'Smartbook ETEXT adalah teknologi untuk membuka buku secara digital, beban ringan dan portable',
                'item_image' => 'e-book1.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'SmartBook NEO ETEXT',
                'item_price' => '25000',
                'item_stock' => '20',
                'item_typeid' => '5',
                'item_description' => 'SmartBook NEO ETEXT adalah teknologi e-book lanjutan dari ETEXT dengan desain lebih ringan dan lebih lebar',
                'item_image' => 'e-book2.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'SmartBook GIGA ETEXT',
                'item_price' => '30000',
                'item_stock' => '25',
                'item_typeid' => '5',
                'item_description' => 'SmartBook GIGA ETEXT merupakan evolusi terbaru series ETEXT, Desain memiliki penutup dengan bonus smartpen',
                'item_image' => 'e-book3.jpg',
            ]);             
        DB::table('item')->insert(
            [
                'item_name' => 'Kamus Besar Bahasa Inggris',
                'item_price' => '11000',
                'item_stock' => '400',
                'item_typeid' => '6',
                'item_description' => 'Kamus Besar Bahasa Inggris berguna untuk belajar dan mengetahui bahasa inggris yang tidak anda ketahui',
                'item_image' => 'kamus1.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Kamus Besar Bahasa German',
                'item_price' => '11000',
                'item_stock' => '400',
                'item_typeid' => '6',
                'item_description' => 'Kamus Besar Bahasa German berguna untuk belajar dan mengetahui bahasa German yang tidak anda ketahui',
                'item_image' => 'kamus2.jpg',
            ]); 
        DB::table('item')->insert(
            [
                'item_name' => 'Kamus Besar Bahasa Francis',
                'item_price' => '11000',
                'item_stock' => '400',
                'item_typeid' => '6',
                'item_description' => 'Kamus Besar Bahasa Francis berguna untuk belajar dan mengetahui bahasa Francis yang tidak anda ketahui',
                'item_image' => 'kamus3.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'SmartPen Digital',
                'item_price' => '5000',
                'item_stock' => '200',
                'item_typeid' => '4',
                'item_description' => 'Smartpen yang dapat digunakan di teknologi elektronik seperti handphone dan e-book',
                'item_image' => 'smartpen2.jpg',
            ]);   
        DB::table('item')->insert(
            [
                'item_name' => 'Aerial Note',
                'item_price' => '7000',
                'item_stock' => '100',
                'item_typeid' => '2',
                'item_description' => 'Aerial Note adalah note dengan model tutup ke atas dengan ukuran sedang tersedia dengan pilihan 4 warna dan pulpen gratis per satu pembelian',
                'item_image' => 'notebook1.jpg',
            ]); 
        DB::table('item')->insert(
            [
                'item_name' => 'Penggaris',
                'item_price' => '2500',
                'item_stock' => '200',
                'item_typeid' => '1',
                'item_description' => 'Penggaris panjang 100cm untuk membantumu belajar',
                'item_image' => 'ruler3.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Super Pencil',
                'item_price' => '5000',
                'item_stock' => '100',
                'item_typeid' => '3',
                'item_description' => 'Super Pencil adalah paket pensil untuk pelajar tersedia dengan set rautan pensil dan pulpen ',
                'item_image' => 'pencil3.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Fuji Note',
                'item_price' => '5500',
                'item_stock' => '300',
                'item_typeid' => '2',
                'item_description' => 'Fuji Note adalah buku terbitan universitas jepang dibuat dengan kertas khusus yang tidak mudah menyerap air dan cepat kering',
                'item_image' => 'notebook5.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Penggaris Kimia',
                'item_price' => '3000',
                'item_stock' => '250',
                'item_typeid' => '1',
                'item_description' => 'Penggaris Kimia memiliki banyak bentuk peralatan kimia untuk mempermudah penggambaran',
                'item_image' => 'ruler2.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Smartpen Kingmas',
                'item_price' => '7500',
                'item_stock' => '50',
                'item_typeid' => '4',
                'item_description' => 'Smartpen digunakan khusus untuk E-Book',
                'item_image' => 'smartpen3.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Standard Pen',
                'item_price' => '2500',
                'item_stock' => '200',
                'item_typeid' => '7',
                'item_description' => 'Pena standard yang wajib digunakan oleh setiap orang dalam belajar dan menggali ilmu',
                'item_image' => 'pen1.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Samsung SmartPen',
                'item_price' => '8500',
                'item_stock' => '70',
                'item_typeid' => '4',
                'item_description' => 'Smartpen khusus untuk hp samsung',
                'item_image' => 'smartpen4.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Plain Note Black Edition',
                'item_price' => '8000',
                'item_stock' => '70',
                'item_typeid' => '2',
                'item_description' => 'Plain Note dengan model cover hitam untuk membantu belajar',
                'item_image' => 'notebook2.jpg',
            ]);
        DB::table('item')->insert(
            [
                'item_name' => 'Wided Notebook',
                'item_price' => '9000',
                'item_stock' => '60',
                'item_typeid' => '2',
                'item_description' => 'Notebook yang cocok digunakan untuk note note besar seperti rumus, kimia, fisika, dan lainnnya',
                'item_image' => 'notebook4.jpg',
            ]);                      
    }
}
