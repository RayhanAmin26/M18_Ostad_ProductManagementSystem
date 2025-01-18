<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductManagementDatabase extends Migration
{
    public function up()
    {
        // Create the database
        DB::statement('CREATE DATABASE product_management');
    }

    public function down()
    {
        // Drop the database
        DB::statement('DROP DATABASE product_management');
    }
};



