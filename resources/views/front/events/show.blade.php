@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">{{ $event->{'title_' . app()->getLocale()} }}</p>
          <p class="text"><a href="{{ route('events') }}">@lang('front.events')</a> - {{ $event->{'title_' . app()->getLocale()} }}</p>
        </div>
      </div>
      <!-- Background Image end -->


      <!-- Activities start -->
      <div class="container">
        <div class="events-post">
          <div class="video-section">
            <div class="video-box">
              <div class="play video-play"><i class="fa-solid fa-play"></i></div>
              <a data-fancybox href="{{ $event->frame }}">
                <img 
                id="videoImg"
                  class="card-img-top img-fluid"
                  src="{{ asset($event->image) }}"
                />
              </a>
            </div>
          </div>

          <div class="head-section">
            <div class="text-content">{{ $event->created_at->format('F d, Y') }}</div>
            <div class="link-logos">
              <div class="share">@lang('front.share')</div>
              <a href="https://www.instagram.com/sharer/sharer.php?u={!! request()->url() !!}" class="sm-logo">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={!! request()->url() !!}" class="sm-logo">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
              <a href="#" class="sm-logo">
                <i class="fa-brands fa-youtube"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <p class="title">{{ $event->{'title_' . app()->getLocale()} }}</p>
            <p class="text">
              {!! $event->{'content_' . app()->getLocale()} !!}
            </p>
          </div>
        </div>
      </div>

      <!-- Activities end -->

      <!-- Activities start -->
      {{-- <div class="container">
        <div class="events-post">
          <div class="video-section">
            <div class="video-box">
              <img src="{{ asset($event->image) }}" alt="" />
              <div class="play video-play"><i class="fa-solid fa-play"></i></div>
              <video controls frameborder="0" >
                <source src="{{ $event->frame }}" type="video/mp4"></a>
              </video>
              <div class="close close-video"><i class="fa-solid fa-xmark"></i></div>
            </div>
          </div>

          <div class="head-section">
            <div class="text-content">{{ $event->created_at->format('F d, Y') }}</div>
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
          <div class="row">
            <p class="title">{{ $event->{'title_' . app()->getLocale()} }}</p>
            <p class="text">
                {!! $event->{'content_' . app()->getLocale()} !!}
            </p>
          </div>
        </div>
      </div> --}}

      <!-- Activities end -->

   @endsection