<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            
            $table->bigIncrements('id') ;
            $table->string('vehmod', 50)->nullable() ;
            $table->string('vehmark', 50)->nullable() ;
            $table->string('vehyear', 50)->nullable() ;
            $table->string('vehengine', 30)->nullable() ;
            $table->string('vehtrans', 40)->nullable() ;
            $table->string('vehimage', 120)->nullable() ;
            $table->mediumtext('vehgalimages', 700)->nullable() ;
            $table->timestamps() ;
            
            $table->collation = 'utf8mb4_unicode_ci' ;
            $table->engine = 'InnoDB' ;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
    
    
} // End
