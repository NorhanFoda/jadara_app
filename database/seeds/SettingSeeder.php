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
                'email' => 'sales@jaadara.com',
                'website' => 'https://jaadara.com/',
                'services' => 'https://jaadara.com/',
                'clients_area' => 'https://jaadara.com/support/clientarea.php',
                'whatsapp' => '+966 56 379 3461',
                'chat' => 'https://tawk.to/chat/5b526fe7df040c3e9e0bd094/default?$_tawk_sk=5ecf923486b22af366d45005&$_tawk_tk=cbbfbf19381e39170a0c34ee143b5bfd&v=685',
                'visit' => 'https://jaadara.com/offline-meet/',
                'meeting' => 'https://jaadara.com/online-meet/', 
                'ticket' => 'https://jaadara.com/support/clientarea.php',
                'contact' => 'https://jaadara.com/support/contact.php',
            ],
        ]); 
    }
}
