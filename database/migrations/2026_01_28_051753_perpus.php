<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        if (!Schema::hasTable('tbl_siswa')) {
            Schema::create('tbl_siswa', function (Blueprint $table) {
                $table->id('id_siswa');
                $table->string('nis', 25)->unique();
                $table->string('nama', 70);
                $table->string('kelas', 40);
                $table->string('alamat', 50);
                $table->string('hp', 20);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tbl_petugas')) {
            Schema::create('tbl_petugas', function (Blueprint $table) {
                $table->id('id_petugas');
                $table->string('nip', 50)->unique();
                $table->string('nama_petugas', 100);
                $table->string('hp_petugas', 20);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tbl_penerbit')) {
            Schema::create('tbl_penerbit', function (Blueprint $table) {
                $table->id('id_penerbit');
                $table->string('nama_penerbit', 100);
                $table->string('kota', 100)->nullable();
                $table->string('ISBN', 50)->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tbl_penulis')) {
            Schema::create('tbl_penulis', function (Blueprint $table) {
                $table->id('id_penulis');
                $table->string('nama_penulis', 100);
                $table->string('hp_penulis', 20)->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tbl_buku')) {
            Schema::create('tbl_buku', function (Blueprint $table) {
                $table->id('id_buku');
                $table->string('kode_buku', 50)->unique();
                $table->string('judul', 200);
                $table->integer('stok')->default(0);
                $table->unsignedBigInteger('id_penerbit')->nullable();
                $table->unsignedBigInteger('id_penulis')->nullable();
                $table->timestamps();

                $table->foreign('id_penerbit')->references('id_penerbit')->on('tbl_penerbit')->onDelete('set null');
                $table->foreign('id_penulis')->references('id_penulis')->on('tbl_penulis')->onDelete('set null');
            });
        }

        if (!Schema::hasTable('tbl_pinjam')) {
            Schema::create('tbl_pinjam', function (Blueprint $table) {
                $table->id('id_pinjam');
                $table->unsignedBigInteger('id_siswa');
                $table->unsignedBigInteger('id_petugas');
                $table->dateTime('waktu_pinjam');
                $table->timestamps();

                $table->foreign('id_siswa')->references('id_siswa')->on('tbl_siswa')->onDelete('cascade');
                $table->foreign('id_petugas')->references('id_petugas')->on('tbl_petugas')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('tbl_pinjamdetail')) {
            Schema::create('tbl_pinjamdetail', function (Blueprint $table) {
                $table->id('id_pinjamdetail');
                $table->unsignedBigInteger('id_pinjam');
                $table->unsignedBigInteger('id_buku');
                $table->timestamps();

                $table->foreign('id_pinjam')->references('id_pinjam')->on('tbl_pinjam')->onDelete('cascade');
                $table->foreign('id_buku')->references('id_buku')->on('tbl_buku')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_pinjamdetail');
        Schema::dropIfExists('tbl_pinjam');
        Schema::dropIfExists('tbl_buku');
        Schema::dropIfExists('tbl_penulis');
        Schema::dropIfExists('tbl_penerbit');
        Schema::dropIfExists('tbl_petugas');
        Schema::dropIfExists('tbl_siswa');
    }
};