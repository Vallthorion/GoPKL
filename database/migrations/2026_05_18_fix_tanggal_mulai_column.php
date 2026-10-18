<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Modify tanggal_mulai to be nullable with default NULL
        DB::statement('ALTER TABLE bookings MODIFY COLUMN tanggal_mulai DATE NULL DEFAULT NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE bookings MODIFY COLUMN tanggal_mulai DATE NOT NULL');
    }
};
