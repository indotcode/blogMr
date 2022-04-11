<div>
    <div class="max-w-[1170px] mx-auto p-5 flex flex-wrap justify-between">
        <div>
            <a class="font-semibold" href="{{route('index')}}">Тредиум</a>
        </div>
        <div>
            <ul class="flex gap-4">
                @foreach($menu as $item)
                    <li>
                        <a class="{{$item['active'] ? 'decoration-2 underline-offset-2 underline decoration-blue-400' : ''}}" href="{{route($item['route'])}}">
                            {{$item['title']}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
