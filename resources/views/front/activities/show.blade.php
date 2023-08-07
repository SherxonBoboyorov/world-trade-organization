@extends('layouts.front')

@section('content')

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/activities-back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">{{ $activitiy->{'title_' . app()->getLocale()} }}</p>
          <p class="text"><a href="{{ route('activities', ['id' => 1]) }}">@lang('front.activities')</a> - {{ $activitiy->{'title_' . app()->getLocale()} }}</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Activities start -->
      <div class="container">
        <div class="activities-post">
            
          <div class="head-section">
            <div class="text-content">
              {{ $activitiy->activitycategory->{'title_' . app()->getLocale()} }} <span>{{ $activitiy->created_at->format('F d, Y') }}</span>
            </div>
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
            <p class="title">{{ $activitiy->{'title_' . app()->getLocale()} }}</p>
            <p class="text">
              {!! $activitiy->{'content_' . app()->getLocale()} !!}
            </p>

          </div>
        </div>
      </div>

      <!-- Activities end -->


@endsection