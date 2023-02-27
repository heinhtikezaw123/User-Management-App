<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserUploadController extends Controller
{
     //direct user upload page
    public function uploadFilePage() {
        return view('admin.storeFile.storeFile');
    }

    //upload user data
    public function uploadFile(Request $request) {
        // dd($request->user()->id);
        $userId = $request->user()->id;
        $extension = $request->file('file')->extension();
        $mimeType = $request->file('file')->getMimeType();
        $originalName = $request->file('file')->getClientOriginalName();

        if($request->storage == 'do') {
            $path = Storage::disk('do')->putFileAs('uploads/'.$userId, $request->file('file'), $request->file('file')->getClientOriginalName(), ['visibility' => 'public']);
            if ($path) {
                return redirect()->route('admin#fileLists')->with(['successMessage' => 'Upload Successful' , 'originalName' => $originalName]);
            } else {
                dd('File was not saved');
            }

        } else {
            $path = $request->file('file')->store('uploads', 'public');
            return redirect()->route('admin#fileLists')->with(['successMessage' => 'Upload Successful' , 'originalName' => $originalName]);
        }
    }

    //show files
    public function fileLists(){
    $userId = Auth::user()->id;
    $files = Storage::disk('do')->files('uploads/' . $userId);

    usort($files, function ($file1, $file2) {
        return Storage::disk('do')->lastModified($file2) <=> Storage::disk('do')->lastModified($file1);
    });

    return view('admin.storeFile.fileList',compact('files'));
    }

    //edit file
    public function editFile($file) {
    $url = Storage::disk(config('filesystems.default'))->url($file);
    return view('admin.storeFile.edit', compact('url', 'file'));
    }

    public function updateFile(Request $request, $file)
    {
        $storage = config('filesystems.default');
        if ($request->storage == 'local') {
            // For local storage
            if ($request->hasFile('file')) {
                Storage::delete($file);
                Storage::disk('do')->delete('uploads/'.$file);

                $path = $request->file('file')->store('uploads');
                return redirect()->route('admin#fileLists')->with(['successMessage' => 'File updated successfully']);
            } else {
                return redirect()->back()->withInput()->withErrors(['error' => 'Please select a file to upload']);
            }
        } else {
            // For DO space storage
            $disk = Storage::disk($storage);
            Storage::disk('do')->delete('uploads/'.$file);

            if ($request->hasFile('file')) {
                $path = Storage::disk('do')->putFileAs('uploads', $request->file('file'), $request->file('file')->getClientOriginalName(), ['visibility' => 'public']);
                return redirect()->route('admin#fileLists')->with(['successMessage' => 'File updated successfully']);
            } else {
                return redirect()->back()->withInput()->withErrors(['error' => 'Please select a file to upload']);
            }
        }
    }

    //delete file
    public function deleteFile($filename)
    {
        if (Storage::disk('do')->exists('uploads/'.$filename)) {
            Storage::disk('do')->delete('uploads/'.$filename);
            return redirect()->route('admin#fileLists')->with(['successMessage' => 'File deleted successfully']);
        } else {
            return redirect()->route('admin#fileLists')->with(['errorMessage' => 'File not found']);
        }
    }

    public function download($filename)
    {
        $path = 'uploads/' . $filename;
        $exists = Storage::disk('do')->exists($path);

        if (!$exists) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $url = Storage::disk('do')->temporaryUrl($path, now()->addMinutes(5));

        return response()->streamDownload(function () use ($url) {
            echo file_get_contents($url);
        }, $filename, $headers);
    }

}
