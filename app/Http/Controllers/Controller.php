<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
}
