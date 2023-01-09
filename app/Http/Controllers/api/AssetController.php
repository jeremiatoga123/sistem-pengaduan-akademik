<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function getAssets()
    {
        $assets = Asset::orderBy('id', 'desc')->get();
        $tree = array();

        foreach($assets as $asset){
            if (isset($asset->parent->id)) {
                $parent = $asset->parent->id;
            } else {
                $parent = "#";
            }

            $selected = false;
            $opened = false;
            // if($asset->id == 2){
            //     $selected = true;
            //     $opened = true;
            // } 
            
            $tree[] = array(
                "id" => $asset->id,
                "parent" => $parent,
                "text" => $asset->name . " (" . (isset($asset->type->name) ? $asset->type->name : '') . " - " . (isset($asset->category->name) ? $asset->category->name : '') . ")",
                "icon" => asset($asset->image ? 'img/assets/'.$asset->image :'img/types/noimage.jpg'),
                'a_attr'=> array(
                    'name'=> $asset->name,
                    'add_child'=> "assets/create?parent=".$asset->id,
                    'show'=> "assets/".$asset->id,
                    'edit'=> "assets/".$asset->id.'/edit'
                ),
                "state" => array("selected" => $selected,"opened"=>$opened)
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Show All Assets',
            'data' => $tree,
        ], 200);
    }
}
