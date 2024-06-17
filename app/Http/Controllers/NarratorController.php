<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class NarratorController extends Controller
{
    public function narrate(Request $request) {
        $fileId = base_convert(sha1(random_bytes(32)), 16, 36);
        $request->webcam->storeAs('public', $fileId.'.jpg');
        return $fileId;
    }
}
