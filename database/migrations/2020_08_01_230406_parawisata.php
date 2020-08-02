<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parawisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->string('nama', 50);
            $table->string('alamat', 150);
            $table->enum('jenis_kelamin', array('L', 'P'));
            $table->string('no_telpon', 20);
        });
        Schema::create('wisata', function (Blueprint $table) {
            $table->string('id_wisata', 5)->primary();
            $table->string('kategori', 50);
            $table->string('nama_wisata', 50);
            $table->string('alamat_wisata', 150);
            $table->string('fasilitas', 50);

            // $table->foreign('id_pengunjung')->references('id')->on('pengunjung')->onDelete('cascade')->oUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata');
        Schema::dropIfExists('pengunjung');
    }
}
