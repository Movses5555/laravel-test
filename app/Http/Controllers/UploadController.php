<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * Store a newly created file in storage.
     *
     * @param  App\Http\Requests\FileRequest  $request
     * @param  App\Models\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(FileRequest $request, Company $company)
    {
        $file = $request->file('logo');
        $fileName = time().$file->getClientOriginalName();
        $fileSet = Storage::disk('public')->put($fileName, File::get($file));
        $path = storage_path('app/public/'.$fileName);
        return response()->json(['logo'=> $fileName]);
    }
}

