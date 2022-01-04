<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nim_id')->constrained('mahasiswas')
            ->onUpdate('cascade')
            ->onDelete('cascade');   
            $table->foreignId('nama_id')->constrained('mahasiswas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('makul_id')->constrained('makuls')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('dosens_id')->constrained('dosens')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nilai');   
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
        Schema::dropIfExists('nilais');
    }
}
