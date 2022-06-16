<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSugestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugestions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alpha_two_code')->nullable();
            $table->string('domains')->nullable();
            $table->string('country')->nullable();
            $table->string('web_pages')->nullable();
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
        Schema::dropIfExists('sugestions');
    }
}
