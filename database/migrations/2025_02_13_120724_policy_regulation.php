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
        Schema::create('policyregulation', function (Blueprint $table) {
            $table->id();
            $table->timestamp('publishdate')->nullable();
            $table->string('titleID');
            $table->string('titleEN');
            $table->string('descID');
            $table->string('descEN');
            $table->string('fileID');
            $table->string('fileEN');
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
        Schema::dropIfExists('policyregulation');
    }
};
