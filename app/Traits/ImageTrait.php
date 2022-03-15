<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

Trait ImageTrait
{

    function saveImage($photo , $folder , $unique=''){

//        $file_extension = $request->left_first_image-> getClientOriginalExtension();
        $file_extension = $photo-> getClientOriginalExtension();
        $file_name = time() . $unique .'.' . $file_extension;

        $path = $folder;

        $photo->move($path , $file_name);

        return $file_name;

    }
        /***********************************************************/
    function deleteUploadedImage($image  ,$path){
        //deleting from path

        if ($image != null) {
            unlink(public_path() . $path . $image);
        }
    }


    /******************************************/






}
