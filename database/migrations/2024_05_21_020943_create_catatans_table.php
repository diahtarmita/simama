<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        public function up(): void
        {
        Schema::create('catatans', function (Blueprint $table) {
        $table->id();
        $table->peserta_id();
        $table->date('tanggal');
        $table->string('uraian kegiatan');
        $table->double('disetujui');
        });
        }  
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catatans');
    }
}
