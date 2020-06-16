<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemConstraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_constraints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('src_id')->unsigned()->nullable();
            $table->foreign('src_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');
            $table->integer('src_root_id')->unsigned()->nullable();
            $table->foreign('src_root_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');
            $table->integer('dist_id')->unsigned()->nullable();
            $table->foreign('dist_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');
            $table->integer('dist_root_id')->unsigned()->nullable();
            $table->foreign('dist_root_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');
            $table->string('error_message', 255)->nullable();
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
        Schema::dropIfExists('item_constraints');
    }
}
