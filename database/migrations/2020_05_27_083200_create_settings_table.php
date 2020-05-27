;<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website')->nullable();
            $table->string('services')->nullable();
            $table->string('clients_area')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('chat')->nullable();
            $table->string('visit')->nullable();
            $table->string('meeting')->nullable();
            $table->string('ticket')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
