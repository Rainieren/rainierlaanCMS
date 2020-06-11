<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_headers', function (Blueprint $table) {
            $table->id();
            $table->integer('layout_id');
            $table->string('logo_url')->nullable();
            $table->string('color')->default("#ffffff");
            $table->string('placement')->default("fixed-top");
            $table->string('shadow')->default('shadow-sm')->nullable();
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
        Schema::dropIfExists('layout_headers');
    }
}
