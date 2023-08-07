@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/back-img-member.png') }}" alt="" />
        <div class="text-content">
          <p class="title">{{ $team->{'title_' . app()->getLocale()} }}</p>
          <p class="text"><a href="{{ route('our-teams') }}">@lang('front.our_team')</a> - {{ $team->{'title_' . app()->getLocale()} }}</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Our Team start -->
      <div class="container">
        <div class="member">
          <div class="row row-1">
            <div class="col col-1">
              <img src="{{ asset($team->image) }}" alt="" />
            </div>
            <div class="col col-2">
              <p class="title">{{ $team->{'title_' . app()->getLocale()} }}</p>
              <p class="text">
                {!! $team->{'content_' . app()->getLocale()} !!}
              </p>
            </div>
          </div>

          <div class="row line">
            <p class="title">@lang('front.biography')</p>
            <p class="text">
              {!! $team->{'biography_' . app()->getLocale()} !!}
            </p>
            <hr />
            <p class="title">@lang('front.publications')</p>
            <p class="text">
              {!! $team->{'publication_' . app()->getLocale()} !!}
            </p>
          </div>
        </div>
      </div>
      <!-- Our Team end -->
@endsection