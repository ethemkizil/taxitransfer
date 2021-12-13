<?php

namespace App\Services;

class UploadService
{
    public function uploadImage($fieldName, $request, $uploadCategory = "")
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $fileSize = $image->getClientSize();
            $maxSize = $this->file_upload_max_size();

            if($fileSize > $maxSize) {
                return false;
            }

            $name = md5($request->taskName)."_".md5($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $uploadPath = strlen($uploadCategory)>0 ? '/uploads/'.$uploadCategory : '/uploads';
            $destinationPath = public_path($uploadPath);
            //$imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            return $name;
        }else{
            return false;
        }
    }

    function file_upload_max_size() {
        static $max_size = -1;

        if ($max_size < 0) {
            // Start with post_max_size.
            $post_max_size = $this->parse_size(ini_get('post_max_size'));
            if ($post_max_size > 0) {
                $max_size = $post_max_size;
            }

            // If upload_max_size is less, then reduce. Except if upload_max_size is
            // zero, which indicates no limit.
            $upload_max = $this->parse_size(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
                $max_size = $upload_max;
            }
        }
        return $max_size;
    }

    function parse_size($size) {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        }
        else {
            return round($size);
        }
    }
}