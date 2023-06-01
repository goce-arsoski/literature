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
use App\Models\Subscriber;
use Response;

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

    public function download_csv()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=subscribers.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $subscribers = Subscriber::all();

        $columns = array(
            'ID',
            'Email',
            'Active',
            'Created at'
        );

        $callback = function() use ($subscribers, $columns)
        {

            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($subscribers as $subscriber) {
                $row['ID'] = $subscriber->id;
                $row['Email'] = $subscriber->email;
                $row['Active'] = $subscriber->active;
                $row['Created at'] = $subscriber->created_at;

                $array_values = array(
                    $row['ID'],
                    $row['Email'],
                    $row['Active'],
                    $row['Created at']
                );

                fputcsv($file, $array_values);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function landing_page()
    {
        $settings = Settings::first();

        return view('subscribers.landing_page', [
            'settings' => $settings
        ]);
    }
}
