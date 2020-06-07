<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Webhooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('trigger')) {
            Schema::create('trigger', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description', 25);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }
        
        if (!Schema::hasTable('webhook')) {
            Schema::create('webhook', function (Blueprint $table) {
                $table->increments('id');
                $table->string('link', 255);
                $table->unsignedInteger('trigger_id');
                $table->foreign('trigger_id')->references('id')->on('trigger');
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
