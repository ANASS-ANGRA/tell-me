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
        Schema::create('controlle_inscris', function (Blueprint $table) {
           
            $table->string("email")->unique();
            $table->string("nom");
            $table->string("prenom");
            $table->string("full_name");
            $table->string("filier");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controlle_inscris');
    }
};
