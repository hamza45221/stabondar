<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        $case = Cases::all();
        return view('case.index',compact('case'));
    }

    public function fetch()
    {
        $campaigns = Cases::select('*');
        return datatables()->of($campaigns)
            ->editColumn('id', function ($pg) {
                return ' <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="'.$pg->id.'" />
                    </div>';
            })
            ->editColumn('image', function ($row) {
                return '<div class="d-flex flex-wrap align-items-center">
                    <a href="'.$row->main_image_1.'" class="symbol symbol-50px p-1" target="_blank">
                        <span class="symbol-label" style="background-image:url('.$row->main_image_1.');"></span>
                    </a>
                </div>';
            })
            ->addColumn('actions', function ($program) {
                return '<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" data-dt=\''.json_encode($program).'\' data-id="'.$program->id.'" class="menu-link btn-edit px-3">Edit</a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="'.route('admin.case.delete',$program->id).'" data-kt-customer-table-filter="delete_row" class="menu-link px-3">Delete</a>
                        </div>
                    </div>';
            })
            ->rawColumns(['id', 'actions', 'image'])
            ->make(true);
    }

    public function store(Request $request)
    {

        $case=Cases::firstOrNew(['id'=>$request->id]);

        $case->category_id                  = $request->input('category_id');
        $case->site_award_heading_1         = $request->input('site_award_heading_1');
        $case->site_award_heading_2         = $request->input('site_award_heading_2');
        $case->web_day_heading_1            = $request->input('web_day_heading_1');
        $case->web_day_heading_2            = $request->input('web_day_heading_2');
        $case->web_day_heading_3            = $request->input('web_day_heading_3');
        $case->fwa_heading_1                = $request->input('fwa_heading_1');
        $case->fwa_heading_2                = $request->input('fwa_heading_2');
        $case->studio_heading_1             = $request->input('studio_heading_1');
        $case->studio_heading_2             = $request->input('studio_heading_2');
        $case->depo_studio                  = $request->input('depo_studio');
        $case->case_nav_name                = $request->input('case_nav_name');
        $case->case_nav_section             = $request->input('case_nav_section');
        $case->case_nav_footer              = $request->input('case_nav_footer');
        $case->depo_sequence_banner_content = $request->input('depo_sequence_banner_content');

        // Handle hero_image upload
        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('cases/hero_images', 'public');
            $case->hero_image = 'storage/' . $path;
        }

        // Handle depo_suquence_hero_image upload
        if ($request->hasFile('depo_suquence_hero_image')) {
            $path = $request->file('depo_suquence_hero_image')->store('cases/depo_sequence', 'public');
            $case->depo_suquence_hero_image = 'storage/' . $path;
        }


        // Home section images
        if ($request->hasFile('home_sec_images1')) {
            $path = $request->file('home_sec_images1')->store('cases/home_sec_images1', 'public');
            $case->home_sec_images1 = 'storage/' . $path;
        } else {
            $case->home_sec_images1 = $request->input('home_sec_images1');
        }

        if ($request->hasFile('home_sec_images2')) {
            $path = $request->file('home_sec_images2')->store('cases/home_sec_images2', 'public');
            $case->home_sec_images2 = 'storage/' . $path;
        } else {
            $case->home_sec_images2 = $request->input('home_sec_images2');
        }

        // Home page images
        if ($request->hasFile('home_page_images1')) {
            $path = $request->file('home_page_images1')->store('cases/home_page_images1', 'public');
            $case->home_page_images1 = 'storage/' . $path;
        } else {
            $case->home_page_images1 = $request->input('home_page_images1');
        }

        if ($request->hasFile('home_page_images2')) {
            $path = $request->file('home_page_images2')->store('cases/home_page_images2', 'public');
            $case->home_page_images2 = 'storage/' . $path;
        } else {
            $case->home_page_images2 = $request->input('home_page_images2');
        }

        // Home page video (treat as file or URL)
        if ($request->hasFile('home_page_video')) {
            $path = $request->file('home_page_video')->store('cases/home_page_video', 'public');
            $case->home_page_video = 'storage/' . $path;
        } else {
            $case->home_page_video = $request->input('home_page_video');
        }

        // Case study images & videos
        if ($request->hasFile('case_image1')) {
            $p = $request->file('case_image1')->store('cases/case_image1', 'public');
            $case->case_image1 = 'storage/' . $p;
        } else {
            $case->case_image1 = $request->input('case_image1');
        }

        if ($request->hasFile('case_image2')) {
            $p = $request->file('case_image2')->store('cases/case_image2', 'public');
            $case->case_image2 = 'storage/' . $p;
        } else {
            $case->case_image2 = $request->input('case_image2');
        }

        if ($request->hasFile('case_image3')) {
            $p = $request->file('case_image3')->store('cases/case_image3', 'public');
            $case->case_image3 = 'storage/' . $p;
        } else {
            $case->case_image3 = $request->input('case_image3');
        }

        if ($request->hasFile('case_image4')) {
            $p = $request->file('case_image4')->store('cases/case_image4', 'public');
            $case->case_image4 = 'storage/' . $p;
        } else {
            $case->case_image4 = $request->input('case_image4');
        }

        if ($request->hasFile('case_image5')) {
            $p = $request->file('case_image5')->store('cases/case_image5', 'public');
            $case->case_image5 = 'storage/' . $p;
        } else {
            $case->case_image5 = $request->input('case_image5');
        }

        if ($request->hasFile('case_video')) {
            $p = $request->file('case_video')->store('cases/case_video', 'public');
            $case->case_video = 'storage/' . $p;
        } else {
            $case->case_video = $request->input('case_video');
        }

        if ($request->hasFile('case_image6')) {
            $p = $request->file('case_image6')->store('cases/case_image6', 'public');
            $case->case_image6 = 'storage/' . $p;
        } else {
            $case->case_image6 = $request->input('case_image6');
        }

        if ($request->hasFile('case_image7')) {
            $p = $request->file('case_image7')->store('cases/case_image7', 'public');
            $case->case_image7 = 'storage/' . $p;
        } else {
            $case->case_image7 = $request->input('case_image7');
        }

        if ($request->hasFile('case_image8')) {
            $p = $request->file('case_image8')->store('cases/case_image8', 'public');
            $case->case_image8 = 'storage/' . $p;
        } else {
            $case->case_image8 = $request->input('case_image8');
        }

        if ($request->hasFile('case_vide2')) {
            $p = $request->file('case_vide2')->store('cases/case_vide2', 'public');
            $case->case_vide2 = 'storage/' . $p;
        } else {
            $case->case_vide2 = $request->input('case_vide2');
        }

        // Contact section assets
        if ($request->hasFile('contact_img1')) {
            $p = $request->file('contact_img1')->store('cases/contact_img1', 'public');
            $case->contact_img1 = 'storage/' . $p;
        } else {
            $case->contact_img1 = $request->input('contact_img1');
        }

        if ($request->hasFile('contact_img2')) {
            $p = $request->file('contact_img2')->store('cases/contact_img2', 'public');
            $case->contact_img2 = 'storage/' . $p;
        } else {
            $case->contact_img2 = $request->input('contact_img2');
        }

        if ($request->hasFile('contact_img3')) {
            $p = $request->file('contact_img3')->store('cases/contact_img3', 'public');
            $case->contact_img3 = 'storage/' . $p;
        } else {
            $case->contact_img3 = $request->input('contact_img3');
        }

        // Footer assets
        if ($request->hasFile('footer_image')) {
            $p = $request->file('footer_image')->store('cases/footer_image', 'public');
            $case->footer_image = 'storage/' . $p;
        } else {
            $case->footer_image = $request->input('footer_image');
        }

        if ($request->hasFile('footer_thumb')) {
            $p = $request->file('footer_thumb')->store('cases/footer_thumb', 'public');
            $case->footer_thumb = 'storage/' . $p;
        } else {
            $case->footer_thumb = $request->input('footer_thumb');
        }


        $case->footer_text         = $request->input('footer_text');
        // Footer Fixed Image
        if ($request->hasFile('footer_fixed_img')) {
            $path = $request->file('footer_fixed_img')->store('cases/footer_fixed_img', 'public');
            $case->footer_fixed_img = 'storage/' . $path;
        } else {
            $case->footer_fixed_img = $request->input('footer_fixed_img');
        }

        $case->footer_fixed_text   = $request->input('footer_fixed_text');





        $case->save();
        return response(['success'=>true,'message'=>'Case Blog updated successfully...']);

    }
    public function delete($id)
    {
        $program=Cases::find($id);
        if ($program){
            $program->delete();
            return redirect()->back()->with('success','Case deleted successfully...');
        }
        return redirect()->back()->with('error','Error While deleting Program...');
    }
    public function deleteMultiple(Request $request){
        $departments = Cases::whereIn('id',$request->id)->delete();
        return response(['success'=>true,'message'=>'Selected row deleted successfully...']);
    }
}
