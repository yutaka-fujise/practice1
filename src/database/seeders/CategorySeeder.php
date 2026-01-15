<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    \App\Models\Category::insert([
        ['content' => '商品の交換について', 'created_at' => now(), 'updated_at' => now()],
        ['content' => '商品の返品について', 'created_at' => now(), 'updated_at' => now()],
        ['content' => '商品の不具合について', 'created_at' => now(), 'updated_at' => now()],
        ['content' => '会員登録について', 'created_at' => now(), 'updated_at' => now()],
        ['content' => 'その他', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
