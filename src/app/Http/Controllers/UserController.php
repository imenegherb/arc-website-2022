<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Validator;

class UserController extends Controller {

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            "leader_name"           =>      "required",
            "email"                 =>      "required|email|unique:users,email",
            "phone_1"               =>      "required",
            "phone_2"               =>      "required",
            "wilaya"                =>      "required",
            "member_2"              =>      "required",
            "member_3"              =>      "required",
            "participations_number" =>      "required|integer"
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
        User::create([
            "leader_name" => $request->leader_name,
            "email" => $request->email,
            "phone" => $request->phone_1."/".$request->phone_2,
            "wilaya" => $request->wilaya,
            "member_2" => $request->member_2,
            "member_3" => $request->member_3,
            "member_4" => ($request->has("member_4") AND !empty($request->member_4)) ? $request->member_4 : null,
            "participations_number" => $request->participations_number,
            "skills" => ($request->has("skills") AND !empty($request->skills)) ? $request->skills : "",
        ]);
        return back()->withSuccess('Merci, votre inscription à été effectuée avec succès, un e-mail de confirmation vous sera bientôt envoyé.');
    }

}
