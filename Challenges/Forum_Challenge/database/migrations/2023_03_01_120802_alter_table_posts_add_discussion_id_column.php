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
        Schema::table('posts', function (Blueprint $table) {
            $table->bigInteger('discussion_id')->unsigned();
            $table->foreign('discussion_id')->references('id')->on('id')->on('discussions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->dropForeign('posts_discussion_id_foreign');
            $table->dropColumn('discussion_id');




        });
    }
};
