<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_id' => '1',
                'product_name'=> '商品1',
                'price'=> '100',
                'stock'=> '1',
                'comment'=> '小学生の間で非常に好評です。とくに低学年にお薦めです。',
                'img_path' => 'storage\images\25194919_s.jpg',
            ],

            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_id' => '2',
                'product_name'=> '商品2',
                'price'=> '200',
                'stock'=> '2',
                'comment'=> '小学生の間で非常に好評です。とくに低学年にお薦めです。',
                'img_path' => 'storage\images\25194919_s.jpg',
            ],

            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_id' => '3',
                'product_name'=> '商品3',
                'price'=> '300',
                'stock'=> '3',
                'comment'=> '小学生の間で非常に好評です。とくに低学年にお薦めです。',
                'img_path' => 'storage\images\25194919_s.jpg',
            ],

            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_id' => '1',
                'product_name'=> '商品4',
                'price'=> '400',
                'stock'=> '4',
                'comment'=> '小学生の間で非常に好評です。とくに低学年にお薦めです。',
                'img_path' => 'storage\images\25194919_s.jpg',
            ],

            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_id' => '2',
                'product_name'=> '商品5',
                'price'=> '500',
                'stock'=> '5',
                'comment'=> '小学生の間で非常に好評です。とくに低学年にお薦めです。',
                'img_path' => 'storage\images\25194919_s.jpg',
            ],

            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_id' => '3',
                'product_name'=> '商品6',
                'price'=> '600',
                'stock'=> '6',
                'comment'=> '小学生の間で非常に好評です。とくに低学年にお薦めです。',
                'img_path' => 'storage\images\25194919_s.jpg',
            ],
        ]);
    }
}