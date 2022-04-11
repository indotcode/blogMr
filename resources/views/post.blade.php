@extends('layouts.index')

@section('title', $post->title)

@section('content')

    <div class="mt-5">
        <div class="max-w-[850px] mx-auto p-5">
            <h1 class="text-[30px] font-semibold mb-5">{{$post->title}}</h1>
            <div class="flex gap-3 mb-5 items-center">
                <div>
                    <like-post :status="{{$post->getStatusLike()}}" :id="{{$post->id}}"></like-post>
                </div>
                <div>
                    <view-post :detect="true" :id="{{$post->id}}" :view="{{$post->view}}"></view-post>
                </div>
            </div>
            <div class="flex flex-wrap mb-5">
                @foreach($post->postAndTag as $item)
                    <a href="{{route('articles', ['tag' => $item->tag->slug])}}" class="px-4 pt-[2px] pb-[4px] bg-gray-600 text-white rounded-2xl">{{$item->tag->title}}</a>
                @endforeach
            </div>
            <div>
                {!! $post->content !!}
            </div>
            <div>
                <comments-post :id="{{$post->id}}" :result="{{$post->comments}}"></comments-post>
            </div>
        </div>
    </div>
@endsection
