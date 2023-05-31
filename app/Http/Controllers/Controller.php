<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog;
use App\Models\Settings;
use App\Models\Faq;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function upload(Request $request)
    {
        abort_if(Gate::denies('edit_blogs'), 403);
        
        $image_path = request()->file('file')->store('images');

        return response()->json([
            'location' => url($image_path)
        ]);
    }

    public function list_blogs($main_slug)
    {
        $blogs = Blog::where('published', true)->get();

        $settings = Settings::first();

        return view('blogs.list', [
            'blogs' => $blogs,
            'settings' => $settings
        ]);
    }

    public function list_blog($main_slug, $slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $settings = Settings::first();

        return view('blogs.list_blog', [
            'blog' => $blog,
            'settings' => $settings
        ]);
    }

    public function list_faqs()
    {
        $faqs = Faq::orderBy('order')->get();

        $settings = Settings::first();

        return view('faqs.list', [
            'faqs' => $faqs,
            'settings' => $settings
        ]);
    }
}
