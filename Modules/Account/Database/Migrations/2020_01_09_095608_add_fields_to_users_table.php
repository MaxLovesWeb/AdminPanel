<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('title')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();

            $table->string('phone')->nullable();
            $table->date('birthDate')->nullable();
            $table->longText('biography')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('title');
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');

            $table->dropColumn('phone');
            $table->dropColumn('birthDate');
            $table->dropColumn('biography');
        });
    }
}
