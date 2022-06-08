<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('author_id');
            // $table->foreignId('user_id');
            $table->string('title');
            $table->string('penulis');
            $table->string('edisi');
            $table->string('isbn');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('tempat_terbit');
            $table->string('jumlah');
            $table->string('bahasa');
            $table->string('lokasi');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('publish_at')->nullable();
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
        Schema::dropIfExists('katalogs');
    }
}
