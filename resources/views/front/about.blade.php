@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">@lang('front.about')</p>
          <p class="text"><a href="{{ route('/') }}">@lang('front.main')</a> - @lang('front.about')</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- What we do start -->
      <div class="container">
        <div class="what-we-do">
          @foreach($pages as $page)
          <div class="row">
            <div class="col col-1">
              <p class="text" style="margin-top: 0px !important">
                {!! $page->{'sub_content_' . app()->getLocale()} !!}
              </p>
            </div>
            <div class="col col-2">
              <img src="{{ asset($page->image) }}" alt="" />
            </div>
          </div>
          <div class="row">
            <div class="col col-1">
              <p class="text">
                {!! $page->{'content_' . app()->getLocale()} !!}
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- What we do end -->

      @endsection
