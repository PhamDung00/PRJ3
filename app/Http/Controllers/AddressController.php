<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function getSubProvinces(Request $request){
        $province = Province::find($request->province);
        $data = $province->childrens;
        $html = '';
        foreach($data as $value) {
            $html .= '<option value='.$value->id.'>';
            $html .= $value->name;
            $html .= '</option>';
        }
        return response()->json($data, 200);
    }
     public function getWards(Request $req) {
        $district_id = $req->district;
        $data = Province::where('province_at',$district_id)->get();
        return response()->json($data, 200);
    }

    public function getDistricts(Request $req) {
        $province = Province::find( $req->province );
        $data = $province->childrens;
        $html = '';
        foreach($data as $value) {
            $html .= '<option value='.$value->id.'>';
            $html .= $value->name;
            $html .= '</option>';
        }
        return response()->json($data, 200);
    }

    public function getAllProvinces() {
        $data = Province::all();
        return response()->json($data, 200);
    }
}