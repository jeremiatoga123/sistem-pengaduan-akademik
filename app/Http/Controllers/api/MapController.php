<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Cctv;
use App\Models\AccessDoor;
use App\Models\Location;
use App\Models\LocationCategory;
use GuzzleHttp\Psr7\Request;

class MapController extends Controller
{
    public function getCctv()
    {
        $data = Location::whereHas('children', function ($q) {
            $q->has('cctv');
         })->with(['children', 'children.cctv'])->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Show Location',
            'data' => $data,
        ], 200);
    }

    public function getParentLocation()
    {
        $data = Location::has('children.cctv')->get();

        return response()->json([
            'success' => true,
            'message' => 'Show Parent Location',
            'data' => $data,
        ], 200);
    }

    public function getSubLocationList($parentId)
    {
        $data = [];
        $location = "";
        if ($parentId != "none") {
            $data = Location::where('parent_id', $parentId)->with(['cctv'])->get();
            $location = Location::where('id', $parentId)->first();
        }

        
        return response()->json([
            'success' => true,
            'message' => 'Show sub Location',
            'data' => $data,
            'location' => $location,
        ], 200);
    }

    public function getLocation($id)
    {
        $location = Location::where('id', $id)->first();

        
        return response()->json([
            'success' => true,
            'message' => 'Show sub Location',
            'data' => $location,
        ], 200);
    }

    public function getAccessDoor()
    {
        $access = AccessDoor::get();
        $data = $access->map(function($c) {
            $data['id'] = $c->id;
            $data['name'] = $c->name;
            $data['description'] = $c->description;
            $data['address'] = $c->address;
            $data['link'] = $c->link;
            $data['latitude'] = $c->location->latitude ?? '';
            $data['longitude'] = $c->location->longitude ?? '';

            return $data;
        });
        
        return response()->json([
            'success' => true,
            'message' => 'Show Device',
            'data' => $data,
        ], 200);
    }

    public function getAssets()
    {
        $assets = Asset::get();
        $data = $assets->map(function($asset) {
            $data['id'] = $asset->id;
            $data['code'] = $asset->code;
            $data['name'] = $asset->name;
            $data['description'] = $asset->description;
            $data['image'] = $asset->image ?? 'noimage.jpg';
            $data['category_asset'] = $asset->category->name;
            $data['type_asset'] = $asset->type->name;
            $data['latitude'] = $asset->location->latitude ?? '';
            $data['longitude'] = $asset->location->longitude ?? '';
            $data['icon'] = $asset->location->locationCategory->icon ?? '';
            $data['parent'] = $asset->parent_id ?? '';

            return $data;
        });
        
        return response()->json([
            'success' => true,
            'message' => 'Show Assets',
            'data' => $data,
        ], 200);
    }

    public function getLegends()
    {
        $categories = LocationCategory::get();
        $data = $categories->map(function($category) {
            $data['location_category'] = $category->name;
            $data['icon'] = $category->icon;
            $data['location'] = $category->locations->map(function ($location) {
                $data['location_name'] = $location->name;
                $data['assets'] = $location->assets;

                return $data;
            });

            return $data;
        });

        return response()->json([
            'success' => true,
            'message' => 'Show Location Category',
            'data' => $data,
        ], 200);
    }
}
