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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('help_label_1')->nullable();
            $table->string('help_label_2')->nullable();
            $table->string('range_label_1')->nullable();
            $table->string('range_label_2')->nullable();
            $table->string('details_label_1')->nullable();
            $table->string('details_label_2')->nullable();
            $table->string('contact_info_label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
