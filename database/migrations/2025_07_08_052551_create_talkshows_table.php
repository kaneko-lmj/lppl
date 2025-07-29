<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('talkshows', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('poster')->nullable(); // path ke file poster
            $table->timestamps();
        });
    }

};
