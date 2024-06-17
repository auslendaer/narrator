<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class NarratorController extends Controller
{
    public function narrate(Request $request): RedirectResponse {
        $fileId = base_convert(sha1(random_bytes(32)), 16, 36);
        Storage::put('public/'.$fileId.'.jpg', base64_decode($request->input('data')));
        return redirect('narrator?fileId='.$fileId);
    }
}
