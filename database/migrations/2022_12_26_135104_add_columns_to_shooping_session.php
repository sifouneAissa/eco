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
        Schema::table('shopping_sessions', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->enum('type',['guest','user'])->default('guest');
            $table->string('ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shooping_session', function (Blueprint $table) {
            //
        });
    }
};
