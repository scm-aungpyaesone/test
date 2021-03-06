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
            $table->string('comment', 1000)->nullable();
            $table->integer('price')->default(0);
            $table->json('images')->nullable()->default(null);
            $table->integer('need_children_count')->default(0);
            $table->boolean('is_customizable')->default(false);
            $table->json('validation_rules')->nullable()->default(null);
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
