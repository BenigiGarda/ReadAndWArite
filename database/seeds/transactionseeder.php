<?php

use Illuminate\Database\Seeder;

class transactionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_transaction')->insert(
            [
                'item_id' => '1',
                'transaction_quantity' => '4',
                'user_id' => '1',
                'transaction_date' => date("2020-11-24"),
            ]);
        DB::table('table_transaction')->insert(
              [
                    'item_id' => '2',
                    'transaction_quantity' => '3',
                    'user_id' => '1',
                    'transaction_date' => date("2020-11-24"),
                ]);

        DB::table('table_transaction')->insert(
                [
                   'item_id' => '3',
                   'transaction_quantity' => '1',
                   'user_id' => '1',
                   'transaction_date' => date("2020-11-24"),
                      ]);

         DB::table('table_transaction')->insert(
                        [
                    'item_id' => '4',
                    'transaction_quantity' => '5',
                    'user_id' => '1',
                'transaction_date' => date("2020-11-24"),
                          ]);
    }
}
