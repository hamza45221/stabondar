<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Cases extends Model
{
    use HasFactory;

    use HasSlug;

    protected $guarded=[];

    protected $casts = [

    ];


    protected $appends=['main_image_1'];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('case_nav_name') // <-- or any other field
            ->saveSlugsTo('slug');
    }
    public function getMainImage1Attribute()
    {

        if ($this->hero_image) {
            if (Storage::disk('public')->exists($this->hero_image)) {
                return Storage::url($this->hero_image);
            }
        }
        return asset($this->hero_image);

    }
}
