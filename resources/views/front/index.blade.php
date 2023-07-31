
@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Slider start -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          @foreach($sliders as $slider)
            
          <div class="swiper-slide">
            <img src="{{ asset($slider->image) }}" alt="" />
            <div class="block">
              <div class="text-content">
                <div class="title">{{ $slider->{'title_' . app()->getLocale()} }}</div>
                <div class="description">{{ $slider->{'content_' . app()->getLocale()} }}</div>
              </div>
            </div>
            <div class="text-block"></div>
          </div>
          @endforeach

        </div>
        <div class="sw-btn swiper-button-next"></div>
        <div class="sw-btn swiper-button-prev"></div>
      </div>
      <!-- Slider end -->

      <!-- What we do start -->
      <div class="container">
        <div class="what-we-do">
          <div class="row">
            @foreach($pages as $page)
              
            <div class="col col-1">
              <div class="title-block">
                <p class="title">{{ $page->{'title_' . app()->getLocale()} }}</p>
                <hr />
              </div>
              <p class="text">
                {!! $page->{'content_' . app()->getLocale()} !!}
              </p>
              
              <div class="btn">
                <a href="{{ route('about') }}" style="width: 100%; height: 100%">
                  <button>@lang('front.more')</button>
                </a>
              </div>
            </div>
            <div class="col col-2">
              <img src="{{ asset($page->image) }}" alt="" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- What we do end -->

        <!-- Our Team start -->
      <div class="our-team">
        <div class="our-team-block">
          <div class="title-block">
            <p class="title">@lang('front.our_team')</p>
            <hr />
          </div>
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
      <!-- Our Team end -->

      <!-- Activities start -->
      <div class="container">
        <div class="activities">
          <div class="title-block">
            <p class="title">@lang('front.activities')</p>
            <hr />
          </div>

          <div class="btns">
            @foreach($avtivitycategories as $activitycategory)
               <a href="{{ route('activities', ['id' => $activitycategory->id])}}">{{ $activitycategory->{'title_' . app()->getLocale()} }}</a>
            @endforeach
          </div>

          <div class="row">
            @foreach($activities as $activity)
              
            <div class="col">
              <a href="{{ route('activitiy', $activity->id) }}">
                <img src="{{ asset($activity->image) }}" alt="" />
                <div class="text-content">
                  <div class="date-content">
                    <div class="type">{{ $activity->activitycategory->{'title_' . app()->getLocale()} }}</div>
                    <div class="date">{{ $activity->created_at->format('F d, Y') }}</div>
                  </div>
                  <p class="title">{{ $activity->{'title_' . app()->getLocale()} }}</p>
                  <h6 class="description">
                    {!! $activity->{'content_' . app()->getLocale()} !!}
                  </h6>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <hr />
        </div>
      </div>


      <div class="container">
        <div class="news">
          <div class="title-block">
            <p class="title">@lang('front.news')</p>
            <hr />
          </div>

          <div class="row">
            @foreach($articles as $article)
              
            <div class="col">
              <a href="{{ route('article', $article->id) }}">
                <img src="{{ asset($article->image) }}" alt="" />
                <div class="text-content">
                  <div class="date-content">
                    <div class="date">{{ $article->created_at->format('F d, Y') }}</div>
                  </div>
                  <p class="title">{{ $article->{'title_' . app()->getLocale()} }}</p>
                  <h6 class="description">
                    {!! $article->{'content_' . app()->getLocale()} !!}
                  </h6>
                </div>
              </a>
            </div>
          
            @endforeach
          </div>
          <hr />
        </div>
      </div>
      <!-- News end -->

      <!-- Events start -->
      <div class="container">
        <div class="events">
          <div class="title-block">
            <p class="title">@lang('front.events')</p>
            <hr />
          </div>

          <div class="row">
            @foreach($events as $event)
            <div class="col">
              <a href="{{ route('event', $event->id) }}">
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
      <!-- Events end -->


    @endsection


 