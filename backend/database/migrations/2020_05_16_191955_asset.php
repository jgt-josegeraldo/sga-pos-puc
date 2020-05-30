<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('maintenance_status')) {
            Schema::create('maintenance_status', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description', 25);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('category')) {
            Schema::create('category', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description', 25);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('asset_status')) {
            Schema::create('asset_status', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description', 25);
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('asset')) {
            Schema::create('asset', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code', 255);
                $table->string('name', 255);
                $table->string('description', 255)->nullable();
                $table->unsignedInteger('category_id');
                $table->foreign('category_id')->references('id')->on('category');
                $table->unsignedInteger('asset_status_id');
                $table->foreign('asset_status_id')->references('id')->on('asset_status');
                $table->timestamp('acquisition_date')->nullable();
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('maintenance')) {
            Schema::create('maintenance', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('maintenance_status_id');
                $table->foreign('maintenance_status_id')->references('id')->on('maintenance_status');
                $table->unsignedInteger('responsible_id');
                $table->foreign('responsible_id')->references('id')->on('user');
                $table->unsignedInteger('asset_id');
                $table->foreign('asset_id')->references('id')->on('asset');
                $table->string('note', 255)->nullable();
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
