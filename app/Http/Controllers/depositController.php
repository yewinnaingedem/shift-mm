<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\depositImg ;
use Carbon\Carbon ;

class depositController extends Controller
{
    public function index (Request $request) {
        $user = Auth::user() ;
        $depositImg = 'depositImg' ;
        if($user){
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if($validator->fails()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            $path = Storage::disk('public')->put($depositImg , $request->file('image'));
            $userId = $user->id ;
            $inputs = [] ;
            $inputs['image'] = $path ;
            $inputs['user_id'] = $userId ;
            $inputs['created_at'] = Carbon::now() ;
            depositImg::insert($inputs);
            return response()->json([
                'message' => 'you made deposit for it successfully',
            ]);
        }
        return response()->json('User does not have login');
    }
}
