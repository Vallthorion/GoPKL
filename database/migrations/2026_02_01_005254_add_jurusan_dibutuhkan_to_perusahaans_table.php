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
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->string('jurusan_dibutuhkan')->after('alamat');
            $table->string('syarat_pkl')->after('kuota');
        });
    }

    public function down()
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->dropColumn('jurusan_dibutuhkan');
            $table->dropColumn('syarat_pkl');
        });
    }
};
