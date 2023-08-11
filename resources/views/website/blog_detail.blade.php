@extends('website.layout')
@section('content_website')
<!-- Post -->
<div class="pb-3">
    <header class="header-post">
        <div class="header-post__date">{{date('M d, Y', strtotime($data->created_at));}}</div>
        <h1 class="title title--h1">{{$data->title}}</h1>
        <div class="caption-post">
            <p>{{$data->description}}</p>
        </div>
        <div class="header-post__image-wrap">
            <img class="cover lazyload" src="{{asset('images/'.str_replace('_thumb','',$data->cover_img))}}" alt="" />
        </div>
    </header>
    <section class="content">
        {!!$data->content!!}
    </section>
    <footer class="footer-post">
        <a class="footer-post__share" target="_blank" href="https://www.facebook.com/nguyen1872oz"><i class="font-icon icon-facebook"></i><span>Facebook</span></a>
        <a class="footer-post__share" target="_blank" href="https://github.com/DamNT055"><i class="font-icon icon-github"></i><span>Github</span></a>
        <a class="footer-post__share" target="_blank" href="https://www.linkedin.com/in/nguyen-thanh-dam-808661216/"><i class="font-icon icon-linkedin2"></i><span>Linkedin</span></a>
    </footer>
</div>

<div class="box-inner box-inner--rounded">
    <h2 class="title title--h3">Comments <span class="color--light"></span></h2>
</div>

@endsection
