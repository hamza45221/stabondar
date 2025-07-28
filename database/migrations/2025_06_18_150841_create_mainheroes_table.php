<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainheroes', function (Blueprint $table) {
            $table->id();
            $table->longText('navbar')->nullable();
            $table->longText('loader_body')->nullable();
            $table->longText('main_heading_1')->nullable();
            $table->longText('main_heading_2')->nullable();
            $table->longText('main_heading_3')->nullable();
            $table->longText('main_heading_4')->nullable();
            $table->longText('main_heading_5')->nullable();
            $table->string('hero_video_wrapper')->nullable();
            $table->string('hero_video_unmute')->nullable();
            $table->text('descrition')->nullable();
            $table->string('num_text')->nullable();
            $table->longText('cube_char_1')->nullable();
            $table->longText('cube_char_2')->nullable();
            $table->text('team_description')->nullable();
            $table->longText('projects')->nullable();
            $table->string('drop_me_heading1')->nullable();
            $table->string('drop_me_heading2')->nullable();
            $table->longText('drop_me_links')->nullable();
            $table->string('copy_heading')->nullable();
            $table->longText('copy_links')->nullable();
            $table->string('social_media_heading1')->nullable();
            $table->string('social_media_heading2')->nullable();
            $table->longText('social_media_links')->nullable();
            $table->string('stas_bondar')->nullable();
            $table->string('year')->nullable();
            $table->string('privacy_policy_url')->nullable();
            $table->string('privacy_policy')->nullable();
            $table->string('awward_title')->nullable();
            $table->longText('awward_list')->nullable();
            $table->longText('css_design_list')->nullable();
            $table->longText('css_design_title')->nullable();
            $table->string('the_fwa_title')->nullable();
            $table->string('the_fwa_list')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainheroes');
    }
}
