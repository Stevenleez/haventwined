<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBannerController extends Controller
{
    // Fetch the banner data
    public function index()
    {
        $banner = Banner::first();
        return response()->json($banner);
    }

    // Store or update banner data
    public function store(Request $request)
    {
        $request->validate([
            'company_description' => 'required',
            'intro' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['company_description', 'intro', 'email', 'phone']);

        if ($request->hasFile('background_image')) {
            $imagePath = $request->file('background_image')->store('backgrounds', 'public');
            $data['background_image'] = $imagePath;
        }

        $banner = Banner::updateOrCreate(['id' => 1], $data); // Assuming only one banner

        return response()->json($banner);
    }

    // Delete the banner
    public function destroy()
    {
        $banner = Banner::first();
        if ($banner) {
            // Optionally delete the image file from storage
            if ($banner->background_image) {
                Storage::delete('public/' . $banner->background_image);
            }
            $banner->delete();
        }

        return response()->json(['message' => 'Banner deleted successfully']);
    }
}
