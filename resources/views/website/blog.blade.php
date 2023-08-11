@extends('website.layout')
@section('content_website')
<!-- About -->
<div class="pb-2">
    <h1 class="title title--h1 title__separate">Blog</h1>
</div>

<!-- News -->
<div class="news-grid pb-0">
    @foreach ($data as $row)
    <!-- Post -->
    <article class="news-item box">
        <div class="news-item__image-wrap overlay overlay--45">
            <div class="news-item__date">{{date('M d, Y', strtotime($row->created_at));}}</div>
            <a class="news-item__link" href="{{URL::to('blog-detail/'.$row->slug)}}"></a>
            <img class="cover lazyload" src="{{asset('images/'.str_replace('_thumb','',$row->cover_img))}}" alt="" />
        </div>
        <div class="news-item__caption">
            <h2 class="title title--h4">{{$row->title}}</h2>
            <p>{{$row->description}}</p>
        </div>
    </article>
    @endforeach
    

</div>
@endsection
