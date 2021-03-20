<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function update(Request $request, User $user)
    {

        if ($request->hasFile("avatar")) { //$this->avatar
            $user->updateProfilePhoto($request->file("avatar"));
            return $request->file("avatar");
        }


        return "Hola Mundo";
    }
}
