@extends('admin.layout.app')

@section('heading', 'Top Ads')

@section('main_content')
<div class="section-body">
  <form action="{{ route('admin_ads_top_update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5>Ads Top</h5>


            {{-- Center Ads --}}
            <div class="form-group mb-3">
              <label>Existing Photo (1170x100)</label>
              <div>
                <img src="{{ asset('uploads/'.$top_ads->top_ad) }}" alt="" style="width: 100%">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>Chage Photo</label>
              <div>
                <input type="file" name="top_ad">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>URL</label>
              <input type="text" class="form-control" name="top_ad_url" value="{{ $top_ads->top_ad_url }}">
            </div>
            <div class="form-group mb-3">
              <label>Status</label>
              <select name="top_ad_status" class="form-control">
                <option value="Show" @if($top_ads->top_ad_status == 'Show') selected @endif>Show</option>
                <option value="Hide" @if($top_ads->top_ad_status == 'Hide') selected @endif>Hide</option>
              </select>
            </div>

            {{-- End Center Ads --}}



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
