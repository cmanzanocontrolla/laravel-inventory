<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInventoryAssembliesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inventory_assemblies', function (Blueprint $table) {

          $table->increments('id');
          $table->integer('inventory_id')->unsigned();
          $table->integer('part_id')->unsigned();
          $table->integer('quantity')->nullable();
          
          $table->foreign('inventory_id')->references('id')->on(config('inventory.inventory_table'))->onDelete('cascade');
          $table->foreign('part_id')->references('id')->on(config('inventory.inventory_table'))->onDelete('cascade');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('inventory_assemblies');
    }
}