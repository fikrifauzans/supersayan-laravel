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
        Schema::table('simulasi', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('value');
            $table->dropColumn('name');
        }); 
        Schema::table('simulasi', function (Blueprint $table) {
            $table->text('question')->nullable();
            $table->text('childs')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
