<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_name' => '株式会社A',
                'street_address' => '東京都港区芝公園1-2-3',
                'representative_name' =>'田中一郎'
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_name' => '株式会社B',
                'street_address' => '東京都墨田区押上1-2-3',
                'representative_name' =>'鈴木花子'
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'company_name' => '株式会社C',
                'street_address' => '東京都品川区1-2-3',
                'representative_name' =>'佐藤三郎'
            ],
        ]);
    }
}
