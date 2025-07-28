<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popup;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function popup()
    {
        $popup = Popup::first();
        return view('admin.popup', compact('popup'));
    }

    public function popupStore(Request $request)
    {
        // Get or create the popup record
        $popup = Popup::first();

        if (!$popup) {
            $popup = new Popup();
        }

        // Common fields
        $popup->main_title = $request->main_title;
        $popup->description = $request->description;
        $popup->footer_title = $request->footer_title;
        $popup->footer_desc = $request->footer_desc;
        $popup->page2_heading = $request->page2_heading;
        $popup->page2_sub_heading = $request->page2_sub_heading;

        // Extract titles and descriptions from repeater list
        $page2_details = $request->input('page2_details', []);

        $titles = [];
        $descs = [];

        foreach ($page2_details as $item) {
            $titles[] = $item['page2_detail_title'] ?? '';
            $descs[] = $item['page2_detail_desc'] ?? '';
        }

        // Save as JSON (replacing old data)
        $popup->page2_detail_title = json_encode($titles);
        $popup->page2_detail_desc = json_encode($descs);

        $popup->save();

        return back()->with('success', 'Popup saved successfully!');
    }

}
