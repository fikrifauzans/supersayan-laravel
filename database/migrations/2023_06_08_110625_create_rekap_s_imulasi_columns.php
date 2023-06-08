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
        Schema::dropIfExists('rekap_simulasi');
        Schema::create('rekap_simulasi', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('total_pertanyaan')->nullable();
            $table->integer('jawaban_benar')->nullable();
            $table->integer('jawaban_salah')->nullable();
            $table->double('persentasi_skor')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap_s_imulasi_columns');
    }
};
