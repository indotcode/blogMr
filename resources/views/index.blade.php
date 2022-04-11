@extends('layouts.index')

@section('title', 'Главная')

@section('content')
    <div class="bg-slate-100">
        <div class="max-w-[1170px] mx-auto p-5">
            <div class="mb-[70px] mt-[50px]">
                <div class="text-[45px]">Успех</div>
                <div>Для молодых и успешных</div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="max-w-[1170px] grid grid-cols-3 lgx:grid-cols-2 smx:grid-cols-1 gap-[40px] mx-auto p-5">
            @foreach($posts as $post)
                <div class="grid content-start shadow rounded-sm overflow-hidden">
                    <div class="w-full h-[270px] hover:opacity-90 overflow-hidden">
                        <a href="{{route('post', ['slug' => $post->slug])}}" ref="nofollow">
                            <img class="w-full h-full object-cover" src="{{asset('images/mini.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="p-5 grid gap-5">
                        <div class="grid gap-3">
                            <h3 class="font-semibold text-[18px]">
                                <a class="hover:opacity-90" href="{{route('post', ['slug' => $post->slug])}}">{{$post->title}}</a>
                            </h3>
                            <p>{{$post->getDescription(110)}}</p>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <view-post :id="{{$post->id}}" :view="{{$post->view}} "></view-post>
                            </div>
                            <div>
                                <like-post :status="{{$post->getStatusLike()}}" :id="{{$post->id}}"></like-post>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
