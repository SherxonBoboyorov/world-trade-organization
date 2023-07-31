@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">@lang('front.about')</p>
          <p class="text"><a href="{{ route('/') }}">@lang('front.main')</a> - @lang('front.about')</p>
        </div>
      </div>
      <!-- Background Image end -->


      <div class="container">
        <div class="what-we-do">
          <div class="row">
            @foreach($pages as $page)
              
            <div class="col col-1">
              <p class="text" style="margin-top: 0px !important">
                {!! $page->{'content_' . app()->getLocale()} !!}
              </p>
            </div>
            @endforeach
          </div>
          </div>
        </div>

      @endsection
