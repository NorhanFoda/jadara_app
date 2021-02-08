<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'location_ar' => 'المملكة العربية السعودية',
                'location_en' => 'Saudi Arabia Kingdom',
                'phone_1' => '0563793461',
                'phone_2' => '0565423498',
            ],
            [
                'location_ar' => 'الإمارات العربية المتحدة',
                'location_en' => 'The United Arab Emirates',
                'phone_1' => '0547775300',
                'phone_2' => null,
            ],
            [
                'location_ar' => 'الكويت',
                'location_en' => 'Kuwait',
                'phone_1' => '0547775300',
                'phone_2' => null,
            ],
        ]); 
    }
}
