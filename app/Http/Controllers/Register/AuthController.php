<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function  index() {
        return view('MM.Register.log-in');  
    }

    public function googleLogIn() {
            return Socialite::driver('google')->redirect();
    }

    public function redirectGoogle() {
       try {
        $user = $user = Socialite::driver('google')->stateless()->user();
        $userId = User::where('google_id', $user->id)->first();
        if($userId) {
                Auth::login($userId);
                return redirect('/mm_cars');
        }else {
                $user_img = $user->user['picture'];
                $img_path =  $this->checkImg($user_img);
                $datas = [] ;
                $datas['name'] = $user->name ;
                $datas['email'] = $user->email ;
                $datas['google_id'] = $user->id ;
                $datas['user_img'] = $img_path ;
                $datas['email_verified_at'] = Carbon::now();
                $datas['password'] = encrypt('admin@123');
                $datas['created_at'] = Carbon::now() ;
        
                $newUser = User::create($datas);
                Auth::login($newUser);
                return redirect('/mm_cars');
        }
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    public function authProfile($id) {
        $name = User::where('id', $id)->first();
        return view('MM.Register.profile')
                    ->with('id',$name);
    }

    public function userRegister() {
        return view('MM.register.register');
    }

    public function changeProfile (Request $request , $id ) {
        if($request->file('file')) {
            $validator = Validator::make(
                $request->all() ,
                [
                    'name' => 'required' ,
                    'email' => 'required' ,
                    'file' => 'required|mimes:jpeg,png,jpg,gif'
                ]
            );
            if($validator->fails()) {
                return redirect('/mm_cars/profile/'.$id)->withErrors($validator)->withInput() ;
            }
            $img_path = Storage::disk('public')->put('img' , $request->file('file')) ;
            $inputs = [] ;
            $inputs['name'] = $request['name'] ;
            $inputs['email'] = $request['email'] ;
            $inputs['user_img'] = $img_path ;
            User::where('id',$id)->update($inputs) ;
            session()->put('message' , 'You have changed successfuly');
            session()->put('picture' , $img_path) ;
            return redirect("/mm_cars/profile/".$id);
        }else {
            $validator = Validator::make(
                $request->all() ,
                [
                    'name' => 'required' ,
                    'email' => 'required' ,
                ]
            );
            if($validator->fails()) {
                return redirect('/mm_cars/profile/'.$id)->withErrors($validator)->withInput() ;
            }
            $inputs = [] ;
            $inputs['name'] = $request['name'] ;
            $inputs['email'] = $request['email'] ;
            User::where('id',$id)->update($inputs) ;
            session()->put('message' , 'You have changed successfuly');
            return redirect("/mm_cars/profile/".$id);
        }
    }

    public function logIn(Request $request ) {
        $validator = Validator::make(
            $request->all() ,
            [
                'email' => "required|email" ,
                'password' => 'required|min:6'
            ]
        );
        if($validator->fails()) {
            return redirect('/mm_cars/log-in')->withErrors($validator)->withInput() ;
        }
        $cardinal = $request->only('email','password') ;
        
        if(Auth::attempt($cardinal)) {
            return redirect('/mm_cars');
        }else {
            $validator->errors()->add('password_token','Pleace fill out the correct Form') ;
            return redirect('/mm_cars/log-in')->withErrors($validator)->withInput();
        }
    }

    public function checkImg (string $user_img) {
        $url = Http::get($user_img) ;
        $img_data = $url->body() ;
        $img_path = "img/user_profile.jpg";
        $img_file = Storage::disk('public')->put( $img_path , $img_data);
        return $img_path ;
    }  
    
    public function register(Request $request) {
        $validator = Validator::make(
            $request->all() ,
            [
                'name' => "required" ,
                'lastName' => "required" ,
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
        );
        if($validator->fails()){
            return redirect('mm_cars/register')->withErrors($validator)->withInput();
        }
        $inputs = [] ;
        $inputs['name'] = $request['name'] ." ". $request['lastName'] ;
        $inputs['email'] = $request['email'] ;
        $inputs['password'] = Hash::make($request['password']) ;
        $inputs['created_at'] = Carbon::now() ;
        $user = User::create($inputs);
        Auth::login($user);
        return redirect('mm_cars');
    }

}

