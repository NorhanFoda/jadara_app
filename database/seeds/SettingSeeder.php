<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'website' => 'https://jaadara.com/',
                'services' => 'https://jaadara.com/',
                'clients_area' => 'https://jaadara.com/support/clientarea.php',
                'whatsapp' => '+966 56 379 3461',
                'chat' => 'https://jaadara.com/',
                'visit' => 'https://jaadara.com/offline-meet/',
                'meeting' => 'https://jaadara.com/online-meet/', 
                'ticket' => 'https://jaadara.com/support/clientarea.php',
                'contact' => 'https://jaadara.com/support/contact.php',
            ],
        ]); 
    }
}
