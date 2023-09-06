@extends('MM.Layout.app')
@section('title' , 'MM | Login-in') 

@section('style') 
    <style>
        .proifle {
            height : 500px ;
        }
    </style>
@endsection 

@section('nav-bar') 
    @parent 
@endsection 

@section('search-1')
    
@endsection 

@section('content') 
    <div class="profile-container">
        <div class="grid grid-cols-3 mt-[100px]">
            <div class="col-span-1 mx-2 ">
                <div class="proifle flex flex-col px-10 bg-gray-50 py-2 rounded-2xl hover:shadow-md  " >
                    <div class="rounded-full w-52 h-52 overflow-hidden bg-gray-400 m-auto  flex justify-center items-center" >
                        <div class="profiler-header flex justify-center rounded-full overflow-hidden h-44 w-44 object-center  ">
                            @if(session()->has('picture'))
                                <img src="{{asset('storage/'.session()->get('picture'))}}" class="w-full h-full " alt="">
                            @else
                                <img src="{{asset('storage/'.$id->user_img)}}" class="w-full h-full " alt="">
                            @endif 
                        </div>
                    </div>
                    <div class="profilter-body bg-white p-5 rounded  font-bold">
                        <ul class="flex flex-col items-center justify-center text-center">
                            <li class="pb-3 mb-1  border-b-2 w-[80%] rounded border-black">{{$id->name}}</li>
                            <li class="pb-3 mb-1  border-b-2 w-[80%] rounded border-black">{{$id->email}}</li>
                            @if($id->google_id)
                                <li class="pb-3 mb-1  border-b-2 w-[80%] rounded border-black">{{$id->google_id}}</li>
                            @endif
                        </ul>
                        <div class="footer flex justify-between items-center mt-2 ">
                            <button class="px-3 py-2 rounded bg-black w-[80px] text-white font-semibold">Save </button>
                            <button class="px-3 py-2 rounded bg-purple-500 text-black font-semibold"> Change</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 flex justify-center items-center">
                <form action="{{ url('mm_cars/change_profile/'.$id->id)}}" method="post" class="w-[95%] m-auto" enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-3">
                        <label class="font-semibold pl-3" for="name">Name </label>
                        <input type="text" name="name" value="{{old('name' , $id->name)}}" class="w-full px-5 py-2 rounded bg-neutral-100 outline-none focus:ring-0 focus:ring-transparent " id="">
                        @if($errors->has('name'))
                            <p class="text-red-900 text-[13px]">{{$errors->first('name')}}</p>
                        @endif 
                    </div>
                    <div class="mb-3">
                        <label class="font-semibold pl-3" for="name">Email </label>
                        <input type="email" name="email" value="{{old('email',$id->email)}}" class="w-full px-5 py-2 rounded bg-neutral-100 outline-none focus:ring-0 focus:ring-transparent " id="">
                        @if($errors->has('email'))
                            <p class="text-red-900 text-[13px]">{{$errors->first('email')}}</p>
                        @endif 
                    </div>
                    <div class="mb-3">
                        <label class="font-semibold pl-3" for="name">Photo</label>
                        <input type="file" name="file" class="w-full px-5 py-2 rounded bg-neutral-100 outline-none focus:ring-0 focus:ring-transparent " id="">
                        @if($errors->has('file'))
                            <p class="text-red-900 text-[13px]">{{$errors->first('file')}}</p>
                        @endif 
                    </div>
                    <div class="mb-3">
                        <button class="w-full px-3 py-2 bg-red-800 mb-2 rounded">Change</button>
                        @if(session()->has('message')) 
                            <button class="w-full px-3 py-2 bg-green-300 text-dark font-semibold rounded">{{session()->get('message')}}</button> 
                        @endif 
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 

@section('footer') 
    @parent 
@endsection 

@section('script')
    <script>

    </script>
@endsection 