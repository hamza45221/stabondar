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
        'dcb_protect_cards'=>'array',
        'slogan_video_img'=>'array',
        'career_billing_heading'=>'array',
        'career_offer_list'=>'array',
        'masive_fraud_list'=>'array',
        'mid_block_video_img_src_path'=>'array',
        'mobile_operater_list'=>'array',
        'merchants_list'=>'array',
        'less_fruad_card'=>'array',
        'fraud_detected_type_faq'=>'array',
        'integration_payment_list'=>'array',
        'gdpr_complaint_list'=>'array',
        'moniter_analyze_list'=>'array',
    ];


    protected $appends=['main_image_1'];


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('hero_sub_heading') // <-- or any other field
            ->saveSlugsTo('slug');
    }
    public function getMainImage1Attribute()
    {

        if ($this->image) {
            if (Storage::disk('public')->exists($this->image)) {
                return Storage::url($this->image);
            }
        }
        return asset($this->image);

    }
}
