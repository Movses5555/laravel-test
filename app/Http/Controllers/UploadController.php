<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

    public function upload(FileRequest $request, Company $company)
    {
        $file = $request->file('logo');
        $fileName = time().$file->getClientOriginalName();
        $fileSet = Storage::disk('public')->put($fileName, File::get($file));
        $path = storage_path('app/public/'.$fileName);
        return response()->json(['logo'=> $fileName]);
    }

}
