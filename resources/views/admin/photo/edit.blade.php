@extends('admin.layout.app')

@section('heading', 'Edit Photo Gallery')

@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary">
  <i class="fas fa-eye"></i></a>
@endsection

@section('main_content')
<form action="{{ route('admin_photo_update',$photo->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group mb-3">
            <label>Caption</label>
            <input type="text" class="form-control" name="caption" value="{{ $photo->caption }}">
          </div>
          <div class="form-group mb-3">
            <label>Existing Photo</label>
            <div>
              <img class="form" src="{{ asset('uploads/'.$photo->photo) }}" alt="" width="250px">
            </div>
          </div>
          <div class="form-group mb-3">
            <label>Photo</label>
            <div>
              <input type="file" class="form-control" name="photo" value="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
@endsection
