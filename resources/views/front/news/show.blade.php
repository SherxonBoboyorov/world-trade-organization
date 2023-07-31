@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">{{ $article->{'title_' . app()->getLocale()} }}</p>
          <p class="text"><a href="{{ route('articles') }}">@lang('front.news')</a> - {{ $article->{'title_' . app()->getLocale()} }}</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Activities start -->
      <div class="container">
        <div class="news-post">
          <div class="row">
            <p class="title">{{ $article->{'title_' . app()->getLocale()} }}</p>
            {{-- <p class="text">
                {!! $article->{'sub_content_' . app()->getLocale()} !!}
            </p> --}}

            <div class="img-content big-img"style="width: 100%; height: 400px; margin: 30px 0 !important">
              <img src="{{ asset($article->image) }}"  alt="" style="width: 100%; height: 100%"/>
            </div>

            <p class="text">
                {!! $article->{'content_' . app()->getLocale()} !!}
    
              </p>
          </div>
         

          <div class="head-section">
            <div class="text-content">
              <p>@lang('front.date')</p>
              <p>{{ $article->created_at->format('F d, Y') }}</p>
            </div>
            <hr />
            <div class="link-logos">
              <div class="share">@lang('front.share')</div>
                <a href="https://www.instagram.com/sharer/sharer.php?u={!! request()->url() !!}" class="sm-logos">
                <div class="sm-logo">
                  <i class="fa-brands fa-instagram"></i>
                </div>
                <a href="https://www.facebook.com/sharer/sharer.php?u={!! request()->url() !!}"  class="sm-logo">
                  <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#1" class="sm-logo">
                  <i class="fa-brands fa-youtube"></i>
                </a>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Activities end -->

      @endsection