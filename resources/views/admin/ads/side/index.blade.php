@extends('admin.layout.app')

@section('heading', 'Side Ads')
@section('button')
<a href="{{ route('admin_ads_side_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Ads</a>
@endsection

@section('main_content')
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Photo</th>
                  <th>Url</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($side_ads as $ad)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    <img src="{{ asset('uploads/'.$ad->side_ad) }}" alt="{{ $ad->side_ad }}" width="200px">
                  </td>
                  @if($ad->side_ad_url == '')
                  <td>Url Empty</td>
                  @else
                  <td>{{ $ad->side_ad_url }}</td>
                  @endif
                  <td>{{ $ad->side_ad_location }}</td>
                  <td class="pt_10 pb_10">
                    <a href="{{ route('admin_ads_side_edit',$ad->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin_ads_side_delete',$ad->id) }}" class="btn btn-danger"
                      onClick="return confirm('Are you sure?');">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
