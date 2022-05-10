<?php

use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'food_name' => '卵',
                'amount' => '１個',
                'expiry' => '2022-01-01',
                'storage' => '冷蔵庫',
                'memo' => 'テスト',
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'food_name' => 'じゃがいも',
                'amount' => '１個',
                'expiry' => '2022-01-01',
                'storage' => '野菜室',
                'memo' => 'テスト',
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'food_name' => '卵',
                'amount' => '１個',
                'expiry' => '2022-01-01',
                'storage' => '冷蔵庫',
                'memo' => 'テスト',
            ],
            [
                'id' => 4,
                'user_id' => 3,
                'food_name' => '卵',
                'amount' => '１個',
                'expiry' => '2022-01-01',
                'storage' => '冷蔵庫',
                'memo' => 'テスト',
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'food_name' => 'マヨネーズ',
                'amount' => '１個',
                'expiry' => '2022-01-01',
                'storage' => '冷蔵庫',
                'memo' => 'テスト',
            ],
            [
                'id' => 6,
                'user_id' => 2,
                'food_name' => 'プリン',
                'amount' => '１個',
                'expiry' => '2022-01-01',
                'storage' => '冷蔵庫',
                'memo' => 'テスト',
            ],
            [
                'id' => 7,
                'user_id' => 3,
                'food_name' => 'ケチャップ',
                'amount' => '１個',
                'expiry' => '2022-01-01',
                'storage' => '冷蔵庫',
                'memo' => 'テスト',
            ],
        ]);
    }
}
