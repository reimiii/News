@extends('admin.layout.app')

@section('heading', 'Side Ads Update')

@section('button')
<a href="{{ route('admin_ads_side') }}" class="btn btn-primary">
  <i class="fas fa-eye"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
  <form action="{{ route('admin_ads_side_update',$side_ads->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-3">
              <label>Existing Photo Ads</label>
              <div>
                <img class="form-control" src="{{ asset('uploads/'.$side_ads->side_ad) }}" alt="" width="300px">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>Change Photo</label>
              <div>
                <input type="file" name="side_ad">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>URL</label>
              <input type="text" class="form-control" name="side_ad_url" value="{{ $side_ads->side_ad_url }}">
            </div>
            <div class="form-group mb-3">
              <label>Location</label>
              <select name="side_ad_location" class="form-control">
                <option value="Top" @if($side_ads->side_ad_location == 'Top') selected @endif>Top</option>

                <option value="Bottom" @if($side_ads->side_ad_location == 'Bottom') selected @endif>Bottom</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      {{-- ads --}}
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
@endsection
