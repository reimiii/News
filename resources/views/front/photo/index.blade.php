@extends('front.layout.app')

@section('main_content')
<div class="page-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Photo gallery</h2>
        <nav class="breadcrumb-container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Photo gallery</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="page-content">
  <div class="container">
    <div class="photo-gallery">
      <div class="row">
        @foreach($photos as $photo)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="photo-thumb">
            <img src="{{ asset('uploads/'.$photo->photo) }}" alt="">
            <div class="bg"></div>
            <div class="icon">
              <a href="{{ asset('uploads/'.$photo->photo) }}" class="magnific"><i class="fas fa-plus"></i></a>
            </div>
          </div>
          <div class="photo-caption">
            <a href="">{{ $photo->caption }}</a>
          </div>
          <div class="photo-date">
            <i class="fas fa-calendar-alt"></i>@php

            $time = strtotime($photo->updated_at);
            $final_time = date('d F Y', $time);

            @endphp
            {{ $final_time }}
          </div>
        </div>
        @endforeach


        <div class="col-md-12">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              {{ $photos->links() }}
            </ul>
          </nav>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
