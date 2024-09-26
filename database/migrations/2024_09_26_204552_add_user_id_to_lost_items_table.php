<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lost_items', function (Blueprint $table) {
            // Add the user_id column as a foreign key referencing the users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lost_items', function (Blueprint $table) {
            // Drop the user_id column if rolling back the migration
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
