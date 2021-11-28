<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnimalsToVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaccines', function (Blueprint $table) {
            if (env('DB_CONNECTION') !== 'sqlite_testing') {
                $table->unsignedInteger('animals_id')->default(1);
            } else {
                $table->unsignedInteger('animals_id');
            }
            $table->foreign('animals_id')->references('id')->on('vaccines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaccines', function (Blueprint $table) {
            $table->dropForeign(['animals_id']);
            $table->dropColumn('animals_id');
        });
    }
}
