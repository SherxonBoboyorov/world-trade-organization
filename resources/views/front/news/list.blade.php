@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">@lang('front.news')</p>
          <p class="text"><a href="{{ route('/') }}">@lang('front.main')</a> - @lang('front.news')</p>
        </div>
      </div>
      <!-- Background Image end -->

    <!-- News start -->
    <div class="container">
      <div class="news" style="margin-bottom: 50px !important;">
        <div class="row">
          @foreach($articles as $article)
          <div class="col">
            <a href="{{ route('article', $article->id) }}">
              <img src="{{ asset($article->image_url) }}" alt="" />
              <div class="text-content">
                <div class="date-content">
                  <div class="date">{{ $article->date_mask->format('F d,Y') }}</div>
                </div>
                <p class="title">{{ $article->{'title_' . app()->getLocale()} }}</p>
                <p class="description">
                  {!! $article->{'sub_content_' . app()->getLocale()} !!}
                </p>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    {{ $articles->links("vendor.pagination.pagination")}}

    <!-- News end -->

    @endsection