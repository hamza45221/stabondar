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
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->text('description')->nullable();
            $table->string('footer_title')->nullable();
            $table->text('footer_desc')->nullable();
            $table->string('page2_heading')->nullable();
            $table->string('page2_sub_heading')->nullable();
            $table->text('page2_detail_title')->nullable(); // all titles concatenated
            $table->text('page2_detail_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popups');
    }
};
