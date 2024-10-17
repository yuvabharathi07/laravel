<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement('ALTER TABLE `users` CHANGE `name` `user_name` VARCHAR(255);');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->renameColumn('name', 'user_name'); //This is method for renaming but Maria DB doesn't support this so alternative we use the below query
            DB::statement('ALTER TABLE `users` CHANGE `user_name` `name` VARCHAR(255);');
        });
    }
};
