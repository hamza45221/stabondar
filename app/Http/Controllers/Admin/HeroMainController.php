<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Mainhero;
use App\Models\MainHeroPageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HeroMainController extends Controller
{
    public function index()
    {
        $heromain = Mainhero::first();
        return view('admin.heromain',compact('heromain'));
    }

    public function store(Request $request)
    {
        $hero = Mainhero::first() ?? new Mainhero();

        // Basic fields
//        $hero->main_heading_1 = $request->input('main_heading_1');

        $loader_body = [];

        if ($request->has('loader_body') && is_array($request->loader_body)) {
            foreach ($request->loader_body as $line) {
                foreach ($line as $key => $value) {
                    $loader_body[$key] = $value;
                }
            }
        }

        $hero->loader_body = $loader_body;

        $hero->hero_video_wrapper = $request->hero_video_wrapper;
        $hero->hero_video_unmute = $request->hero_video_unmute;
        $hero->description = $request->description;
        $hero->num_text = $request->num_text;
        $hero->team_description = $request->team_description;
        $hero->drop_me_heading1 = $request->drop_me_heading1;
        $hero->drop_me_heading2 = $request->drop_me_heading2;
        $hero->copy_heading = $request->copy_heading;
        $hero->social_media_heading1 = $request->social_media_heading1;
        $hero->social_media_heading2 = $request->social_media_heading2;
        $hero->stas_bondar = $request->stas_bondar;
        $hero->year = $request->year;
        $hero->privacy_policy_url = $request->privacy_policy_url;
        $hero->privacy_policy = $request->privacy_policy;
        $hero->awward_title = $request->awward_title;
        $hero->css_design_title = $request->css_design_title;
        $hero->the_fwa_title = $request->the_fwa_title;


        $hero->navbar = $request->navbar ?? [];
        $hero->main_heading_1  = $request->main_heading_1  ?? [];
        $hero->main_heading_2  = $request->main_heading_2  ?? [];
        $hero->main_heading_3  = $request->main_heading_3  ?? [];
        $hero->main_heading_4  = $request->main_heading_4  ?? [];
        $hero->main_heading_5  = $request->main_heading_5  ?? [];
        $hero->cube_char_1 = $request->cube_char_1 ?? [];
        $hero->cube_char_2 = $request->cube_char_2 ?? [];
        $hero->drop_me_links = $request->drop_me_links ?? [];
        $hero->copy_links = $request->copy_links ?? [];
        $hero->social_media_links = $request->social_media_links ?? [];
        $hero->awward_list = $request->awward_list ?? [];
        $hero->css_design_list = $request->css_design_list ?? [];
        $hero->the_fwa_list = $request->the_fwa_list ?? [];


//        $rowImages = [];
//
//        if ($request->has('images')) {
//            foreach ($request->team_part_of_images as $imageData) {
//                // If a new image is uploaded
//                if (isset($imageData['file']) && $imageData['file'] instanceof \Illuminate\Http\UploadedFile) {
//                    $path = $imageData['file']->store('uploads',['disk' => 'public']);
//                    $rowImages[] = Storage::url($path); // Save public URL
//                }
//                // If existing image URL is provided
//                elseif (!empty($imageData['image'])) {
//                    $rowImages[] = $imageData['image']; // Keep existing
//                }
//            }
//        }
//
//        $hero->team_part_of_images = $rowImages;


        $hero->save();

        return back()->with('success', 'Hero section saved successfully!');
    }


}
