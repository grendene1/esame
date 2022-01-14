<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmland;

class FarmlandController extends Controller
{
    public function list() {
        return Farmland::all();
    }

    public function detail($id) {
        return Farmland::where("id", $id)->first();
    }

    public function create(Request $req) {
        $farmlandData = json_decode($req->getContent());

        $farmland = new Farmland();

        $farmland->city = $farmlandData->city;
        $farmland->photo = $farmlandData->photo;
        $farmland->size = $farmlandData->size;
        $farmland->cadastralMap = $farmlandData->cadastralMap;
        $farmland->cadastralParcel = $farmlandData->cadastralParcel;
        $farmland->landType = $farmlandData->landType;
        $farmland->irrigationType = $farmlandData->irrigationType;
        $farmland->offerType = $farmlandData->offerType;
        $farmland->rental = $farmlandData->rental;
        $farmland->available = $farmlandData->available;

        $farmland->save();

        return response()->json($farmland, 201);
    }

    public function modify(Request $req, $id) {
        $farmland = Farmland::where("id", $id)->first();

        $farmlandData = json_decode($req->getContent());

        $farmland->city = $farmlandData->city;
        $farmland->photo = $farmlandData->photo;
        $farmland->size = $farmlandData->size;
        $farmland->cadastralMap = $farmlandData->cadastralMap;
        $farmland->cadastralParcel = $farmlandData->cadastralParcel;
        $farmland->landType = $farmlandData->landType;
        $farmland->irrigationType = $farmlandData->irrigationType;
        $farmland->offerType = $farmlandData->offerType;
        $farmland->rental = $farmlandData->rental;
        $farmland->available = $farmlandData->available;

        $farmland->save();

        return response()->json($farmland, 200);
    }

    public function destroy($id) {
        return Farmland::destroy($id);
    }
}