@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">@lang('front.our_team')</p>
          <p class="text"><a href="{{ route('/') }}">@lang('front.main')</a> - @lang('front.our_team')</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Our Team start -->
      <div class="our-team">
        <div class="our-team-block">
          <div class="row">
            @foreach($teams as $team)
            <div class="col">
              <a href="{{ route('our-team', $team->id) }}">
                <img src="{{ asset($team->image) }}" alt="" />
                <hr />
                <div class="text-content">
                  <p class="title">{{ $team->{'title_' . app()->getLocale()} }}</p>
                  <h6 class="description">
                    {!! $team->{'content_' . app()->getLocale()} !!}
                  </h6>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    {{ $teams->links("vendor.pagination.pagination")}}

      <!-- Our Team end -->
@endsection
