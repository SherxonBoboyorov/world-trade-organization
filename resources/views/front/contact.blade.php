@extends('layouts.front')

@section('content')
      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">@lang('front.contacts')</p>
          <p class="text"><a href="{{ route('/') }}">@lang('front.main')</a> - @lang('front.contacts')</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Contacts start -->

    @include('alert')

      <div class="contacts">
        <div class="text-content">
          <div class="title">@lang('front.our_contacts')</div>
          <div class="row">
            <div class="col col-1">
              <p>
                <a href="tel:{{ $options->where('key', 'phone')->first()->value }}"
                  ><span>@lang('front.phone_number'):</span> {{ $options->where('key', 'phone')->first()->value }}
                </a>
              </p>
              <p>
                <a href="tel:{{ $options->where('key', 'fax')->first()->value }}"><span>@lang('front.fax'):</span> {{ $options->where('key', 'fax')->first()->value }} </a>
              </p>
              <p>
                <a href="mailto:{{ $options->where('key', 'email')->first()->value }}"><span>@lang('front.email'):</span>{{ $options->where('key', 'email')->first()->value }}</a>
              </p>
            </div>
            <div class="col col-2">
              <p>
                <a><span>@lang('front.address'): </span>{{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}
                </a>
              </p>
              <p>
                <a><span>@lang('front.landmarks'): </span>{{ $options->where('key', 'lanrdmarks_' . app()->getLocale())->first()->value }}
                </a>
              </p>
            </div>
          </div>


          <div class="title" style="margin-top: 40px !important">
            @lang('front.contact_us')
          </div>

          <div class="form">
            <form action="{{ route('saveCallback') }}" method="POST">
              @csrf
              <div class="col">
                <input type="text" name="fullname" placeholder="Name" required/>
              </div>

              <div class="row">
                <div class="col">
                  <input type="text" name="email" placeholder="Email" required/>
                </div>
                <div class="col">
                  <input type="text" name="phone_number" placeholder="Phone number" required/>
                </div>
              </div>
              <div class="col">
                <textarea cols="30" rows="10" name="content" placeholder="Comment" required></textarea>
              </div>

              <button type="submit">@lang('front.send')</button>
            </form>
          </div>

          <div class="title" style="margin-top: 60px !important">@lang('front.map')</div>
        </div>
      </div>

      <div class="map">
        {!! $options->where('key', 'map')->first()->value !!}
      </div>

      <!-- Contacts end -->

  @endsection