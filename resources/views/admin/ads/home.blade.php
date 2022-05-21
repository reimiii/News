@extends('admin.layout.app')

@section('heading', 'Center & Footer Ads')

@section('main_content')
<div class="section-body">
  <form action="{{ route('admin_ads_home_update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <h5>Ads Center</h5>


            {{-- Center Ads --}}
            <div class="form-group mb-3">
              <label>Existing Photo (1170x100)</label>
              <div>
                <img src="{{ asset('uploads/'.$home_ads->above_search_ad) }}" alt="" style="width: 100%">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>Chage Photo</label>
              <div>
                <input type="file" name="above_search_ad">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>URL</label>
              <input type="text" class="form-control" name="above_search_ad_url"
                value="{{ $home_ads->above_search_ad_url }}">
            </div>
            <div class="form-group mb-3">
              <label>Status</label>
              <select name="above_search_ad_status" class="form-control">
                <option value="Show" @if($home_ads->above_search_ad_status == 'Show') selected @endif>Show</option>
                <option value="Hide" @if($home_ads->above_search_ad_status == 'Hide') selected @endif>Hide</option>
              </select>
            </div>

            {{-- End Center Ads --}}



          </div>
        </div>
      </div>

      {{-- ads --}}

      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <h5>Ads Footer</h5>
            {{-- Footer Ads --}}
            <div class="form-group mb-3">
              <label>Existing Photo (1170x100)</label>
              <div>
                <img src="{{ asset('uploads/'.$home_ads->above_footer_ad) }}" alt="" style="width: 100%">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>Chage Photo</label>
              <div>
                <input type="file" name="above_footer_ad">
              </div>
            </div>
            <div class="form-group mb-3">
              <label>URL</label>
              <input type="text" class="form-control" name="above_footer_ad_url"
                value="{{ $home_ads->above_footer_ad_url }}">
            </div>
            <div class="form-group mb-3">
              <label>Status</label>
              <select name="above_footer_ad_status" class="form-control">
                <option value="Show" @if($home_ads->above_footer_ad_status == 'Show') selected @endif>Show</option>
                <option value="Hide" @if($home_ads->above_footer_ad_status == 'Hide') selected @endif>Hide</option>
              </select>
            </div>
            {{-- End Footer Ads --}}





          </div>
        </div>
      </div>

    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
@endsection
