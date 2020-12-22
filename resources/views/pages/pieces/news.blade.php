@foreach($news as $item)
    <div>
        <img src="{{ url('/images/news_ico.png') }}" class="float-left">
        <a href="{{ route('news.show', ['id' => $item->id, 'lang' => app()->getLocale()]) }}" >
            <p class="h3 ml-5 text-dark">
                {{ $item->title }}
            </p>
        </a>
    </div>
@endforeach
