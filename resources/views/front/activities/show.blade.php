@extends('layouts.front')

@section('content')

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
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
              {{ $activitiy->activitycategory->{'title_' . app()->getLocale()} }} <span>{{ $activitiy->date_mask->format('F d,Y') }}</span>
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
            {{-- <div class="img-content">
              <div class="col col-1">
                <img src="./../images/activities-1.jpg" alt="" />
              </div>
              <div class="col col-2">
                <img src="./../images/activities-1.jpg" alt="" />
              </div>
            </div> --}}

          </div>
        </div>
      </div>

      <!-- Activities end -->


@endsection