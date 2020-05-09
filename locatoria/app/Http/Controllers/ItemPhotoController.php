<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\ItemPhoto;

class ItemPhotoController extends Controller
{
    //
    public function show($item_id)
    {

        //return all images corresponding to an item in an associative array
        // to be display in edit item. also on reservation page

        $item_photos = ItemPhoto::where('item_id', $item_id)->get();
        $item_photos_links = array();
        foreach ($item_photos as $item_photo) {
            $item_photos_links [$item_photo->id] = $item_photo->photo_path;
        }

        return $item_photos_links;


    }

    public function destroy($id)
    {
        $phototodelete = ItemPhoto::find($id);
        $path = $phototodelete->photo_path;
        $phototodelete->delete();
        Storage::disk('public')->delete($path);

        return "deleted  ";
    }
}
