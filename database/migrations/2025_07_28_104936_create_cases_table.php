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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique()->nullable();

            $table->string('category_id')->nullable();
            $table->string('site_award_heading_1')->nullable();
            $table->string('site_award_heading_2')->nullable();
            $table->string('web_day_heading_1')->nullable();
            $table->string('web_day_heading_2')->nullable();
            $table->string('web_day_heading_3')->nullable();
            $table->string('fwa_heading_1')->nullable();
            $table->string('fwa_heading_2')->nullable();
            $table->string('studio_heading_1')->nullable();
            $table->string('studio_heading_2')->nullable();
            $table->string('depo_studio')->nullable();

            // Hero image
            $table->string('hero_image')->nullable();

            // Case navigation
            $table->string('case_nav_name')->nullable();
            $table->string('case_nav_section')->nullable();
            $table->string('case_nav_footer')->nullable();

            // Depo sequence images & banner
            $table->string('depo_suquence_hero_image')->nullable();
            $table->text('depo_sequence_banner_content')->nullable();

            // Home section images
            $table->string('home_sec_images1')->nullable();
            $table->string('home_sec_images2')->nullable();
            $table->string('home_page_images1')->nullable();
            $table->string('home_page_images2')->nullable();
            $table->string('home_page_video')->nullable();

            // Case study assets
            $table->string('case_image1')->nullable();
            $table->string('case_image2')->nullable();
            $table->string('case_image3')->nullable();
            $table->string('case_image4')->nullable();
            $table->string('case_image5')->nullable();
            $table->string('case_video')->nullable();
            $table->string('case_image6')->nullable();
            $table->string('case_image7')->nullable();
            $table->string('case_image8')->nullable();
            $table->string('case_vide2')->nullable();

            // Contact section assets
            $table->string('contact_img1')->nullable();
            $table->string('contact_img2')->nullable();
            $table->string('contact_img3')->nullable();

            // Footer assets
            $table->string('footer_image')->nullable();
            $table->string('footer_thumb')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('footer_fixed_img')->nullable();
            $table->string('footer_fixed_text')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
