@extends('MM.Layout.app')
@section('title' , 'MM | Login-in') 

@section('style') 

@endsection 

@section('nav-bar') 
    @parent 
@endsection 

@section('search-1')
    <div>

    </div>
@endsection 

@section('content') 
    <!-- component -->
<div class="font-mono">
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 mt-3">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-full   bg-gray-400 block lg:block  lg:w-1/2 bg-cover rounded-l-lg"
                    style="background-image: url({{asset('storage/img/dog-log-in.jpg')}})"
                ></div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Welcome Back!</h3>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{url('mm_cars/log-in')}}" method="post">
                        <div class="mb-4">
                            @csrf 
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                                UserEmail
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="username"
                                type="email"
                                name="email"
                                placeholder="Username"
                            />
                            @if($errors->has('email'))
                                <p class="text-xs italic pt-1 text-red-500">{{$errors->first('email')}}</p>
                            @endif 
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Password
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border @if($errors->has('password') ) border-red-500 @endif  rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Password"
                            />
                            @if($errors->has('password'))
                                <p class="text-xs italic text-red-500">{{$errors->first('password')}}</p>
                            @endif 
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 mb-3 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Sign In
                            </button>
                            @if($errors->has('password_token'))
                                <p class="text-xs italic text-red-500 mb-3">{{$errors->first('password_token')}}</p>
                            @endif 
                            <a
                                href="{{url('/google')}}"
                                class="w-full px-4 inline-block py-2 mb-3 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                            >
                                Google 
                            </a>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{url('mm_cars/register')}}"
                            >
                                Create an Account!
                            </a>
                        </div>
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="#"
                            >
                                Forgot Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('footer') 

@endsection 

@section('script')
    <script>

    </script>
@endsection 