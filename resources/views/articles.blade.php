@extends('layouts.index')

@section('title', 'Каталог статей' . (request()->has('tag') ? ', тег "' . request()->get('tag') . '"' : ''))

@section('content')

    <div class="mt-5">
        <div class="max-w-[1170px] grid grid-cols-6 sm:gap-[10px] items-start gap-[40px] mx-auto p-5">
            <div class="col-span-2 sm:col-span-6 flex flex-wrap items-start mb-5 gap-2">
                @foreach($tags as $tag)
                    <a href="{{route('articles', ['tag' => $tag->slug])}}" class="px-4 pt-[2px] pb-[4px] bg-gray-600 text-white rounded-2xl">{{$tag->title}}</a>
                @endforeach
            </div>
            <div class="col-span-4 sm:col-span-6">
                <div class="grid gap-[40px] mb-[40px]">
                    @foreach($posts as $post)
                        <div class="grid content-start shadow rounded-sm overflow-hidden">
                            <div class="w-full h-[270px] hover:opacity-90 overflow-hidden">
                                <a href="{{route('post', ['slug' => $post->slug])}}" ref="nofollow">
                                    <img class="w-full h-full object-cover" src="{{asset('images/full.jpg')}}" alt="">
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
                {{$posts->onEachSide(2)->links('vendor.pagination.tailwind')}}
            </div>
        </div>
    </div>
@endsection
