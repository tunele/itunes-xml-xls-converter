<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DownloadController extends Controller
{
    public function download($file_name) {
        $file_path = storage_path('uploads/'.$file_name);
        return response()->download($file_path);
    }
}
