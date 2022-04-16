<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBindDeleteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('accommodations', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('bank_pays', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('conditions', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('equipment', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('maps', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('pay_methods', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('bind_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bind_delete');
    }
}
