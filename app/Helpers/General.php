<?php

use App\Http\Requests\Admin_panel_settings_Request;
use Illuminate\Support\Facades\Config;


function uploadImage($folder, $newImage)
{
    $extension = strtolower($newImage->extension());
    $newImageName = time() . uniqid() . $extension;
    $newImage->getClientOriginalName = $newImageName;
    $newImage->move($folder, $newImageName);
    return  $newImageName;
}
































// function uploadImage($folder, $image)
// {
//     $extension = strtolower($image->extension());
//     $filename = time() . uniqid() . '.' . $extension;
//     $image->getClientOriginalName = $filename;
//     $image->move($folder, $filename);
//     return $filename;
// }
