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
                'flag' => '/images/f1.png',
                'phone' => '+966563793461 - +966547358125',
                'whatsapp_ar' => '+966563793461',
                'whatsapp_en' => '+966547358125',
            ],
            [
                'location_ar' => 'الإمارات العربية المتحدة',
                'location_en' => 'The United Arab Emirates',
                'flag' => '/images/f2.png',
                'phone' => '+966547775300',
                'whatsapp_ar' => '+966547775300',
                'whatsapp_en' => null,
            ],
            [
                'location_ar' => 'الكويت',
                'location_en' => 'Kuwait',
                'flag' => '/images/f3.png',
                'phone' => null,
                'whatsapp_ar' => null,
                'whatsapp_en' => null,
            ],
        ]); 
    }
}
