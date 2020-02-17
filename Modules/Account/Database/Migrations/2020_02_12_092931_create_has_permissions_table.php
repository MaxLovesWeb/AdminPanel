<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_permissions', function (Blueprint $table) {
            $table->string('permission_slug');
            $table->morphs('permissible');
            //$table->string('permissible_id');
            //$table->string('permissible_type');
            $table->timestamps();
            $table->foreign('permission_slug')->references('slug')->on('permissions')->onDelete('cascade');
           // $table->unique(['permission_slug', 'permissible_id', 'permissible_type']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_permissions');
    }
}
