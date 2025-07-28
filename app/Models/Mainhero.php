<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class Mainhero extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $casts = [
        'navbar'=>'array',
        'loader_body'=>'array',
        'main_heading_5'=>'array',
        'main_heading_4'=>'array',
        'main_heading_3'=>'array',
        'main_heading_2'=>'array',
        'main_heading_1'=>'array',
        'cube_char_1'=>'array',
        'cube_char_2'=>'array',
        'projects'=>'array',
        'drop_me_links'=>'array',
        'copy_links'=>'array',
        'social_media_links'=>'array',
        'awward_list'=>'array',
        'css_design_list'=>'array',
        'the_fwa_list'=>'array',
    ];


    public function getTeamPartOfImagesAttribute($value)
    {
        $images = json_decode($value, true);

        if (!$images || !is_array($images)) {
            return [];
        }

        return collect($images)->mapWithKeys(function ($path, $key) {
            return [$key => URL::to($path)];
        })->toArray();
    }
}
