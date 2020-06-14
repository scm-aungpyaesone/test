<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateItemsTableMigration extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null');
            $table->string('title', 255);
            $table->string('error_message', 255);
            $table->integer('need_children_count')->default(0);
        });

        Schema::create('item_closure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_closure');
        Schema::dropIfExists('items');
    }
}
