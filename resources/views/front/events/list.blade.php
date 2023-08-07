@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/events-back-img.png') }}" alt="" />
        <div class="text-content">
          <p class="title">@lang('front.events')</p>
          <p class="text"><a href="{{ route('/') }}">@lang('front.main')</a> - @lang('front.events')</p>
        </div>
      </div>
      <!-- Background Image end -->
      <div class="container">
        <div class="events">
          <div class="row">
            @foreach($events as $event)
            <div class="col">
              <a href="{{ route('event', $event->{'slug_' . app()->getLocale()}) }}">
                <div class="text-content">
                  <div class="date-content">
                    <div class="date">{{ $event->created_at->format('F d, Y') }}</div>
                  </div>
                  <p class="title">{{ $event->{'title_' . app()->getLocale()} }}</p>
                  <h6 class="description">
                    {!! $event->{'content_' . app()->getLocale()} !!}
                  </h6>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    {{ $events->links("vendor.pagination.pagination")}}


    @endsection