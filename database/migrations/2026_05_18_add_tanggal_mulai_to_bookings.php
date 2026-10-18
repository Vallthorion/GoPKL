<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Add tanggal_mulai if it doesn't exist
            if (!Schema::hasColumn('bookings', 'tanggal_mulai')) {
                $table->date('tanggal_mulai')->nullable()->after('perusahaan_id');
            }
            
            // Add tanggal_selesai if it doesn't exist
            if (!Schema::hasColumn('bookings', 'tanggal_selesai')) {
                $table->date('tanggal_selesai')->nullable()->after('tanggal_mulai');
            }
            
            // Add alasan if it doesn't exist
            if (!Schema::hasColumn('bookings', 'alasan')) {
                $table->text('alasan')->nullable()->after('status');
            }
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['tanggal_mulai', 'tanggal_selesai', 'alasan']);
        });
    }
};
