<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inthenews', function (Blueprint $table) {
            $table->id();
            $table->timestamp('publishdate')->nullable();
            $table->string('titleID');
            $table->string('titleEN');
            $table->string('descID');
            $table->string('descEN');
            $table->string('tags');
            $table->string('sourceurl');
            $table->string('sourcename');
            $table->integer('is_active');
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
        Schema::dropIfExists('inthenews');
    }
};
