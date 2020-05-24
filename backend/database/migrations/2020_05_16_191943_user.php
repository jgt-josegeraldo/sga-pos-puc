<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                
        if (!Schema::hasTable('permission_level')) {
            Schema::create('permission_level', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description', 25);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('module')) {
            Schema::create('module', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description', 25);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('user')) {
            Schema::create('user', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 255);
                $table->string('login', 255);
                $table->string('pass', 255);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('permission')) {
            Schema::create('permission', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('permission_level_id');
                $table->foreign('permission_level_id')->references('id')->on('permission_level');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('user');
                $table->unsignedInteger('module_id');
                $table->foreign('module_id')->references('id')->on('module');
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
