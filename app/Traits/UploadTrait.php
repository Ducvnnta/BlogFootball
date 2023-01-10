<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait UploadTrait
{
    public function uploadImage(UploadedFile $file, $folder = '')
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension =  $file->getClientOriginalExtension();
        $fileName = $fileName.'_'.Str::random(16).'.'.$extension;
        $file->move(public_path("uploads/$folder"), $fileName);
        return "uploads/$folder/".$fileName;
    }

    public function uploadImages($file, $path)
    {
        $arr = [];
        dd($file);
        foreach ($file as $item) {
            $date = now()->format('dmYHis');
            $original_name = $item->getClientOriginalName();
            $fileName = pathinfo($original_name, PATHINFO_FILENAME);

            while (file_exists('/upload_tmp/' . $path . '/' . $date . '/' . $fileName)) {
                $original_name;
            }
            $folderpath = public_path('/upload_tmp/' . $path . '/' . $date . '/');
            $item->move($folderpath, $fileName);

            $data =  'upload_tmp/' . $path . '/' . $date . '/' . $fileName;

            $arr[] = $data;
        }
        return $arr;

    }
}
