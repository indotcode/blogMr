<div class="my-[30px]">
    <div class="max-w-[1170px] mx-auto p-5 grid grid-cols-3 md:grid-cols-1 md:gap-5">
        <div class="md:order-2">
            <div class="">
                <a class="font-semibold text-[30px]" href="{{route('index')}}">Тредиум</a>
            </div>
            <div>© 2010-2030 Все права защищены.</div>
        </div>
        <div class="md:order-1">
            <h4 class="font-semibold mb-1 mt-4">Блог</h4>
            <ul>
                @foreach($posts_footer as $post_footer)
                    <li>
                        <a href="{{route('post', ['slug' => $post_footer->slug])}}">{{$post_footer->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
