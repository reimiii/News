@extends('admin.layout.app')

@section('heading', 'Create Post')

@section('button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary">
  <i class="fas fa-eye"></i></a>
@endsection

@section('main_content')
<div class="section-body">
  <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <div class="form-group mb-3">
              <label>Post Photo</label>
              <div>
                <input type="file" name="post_photo">
              </div>
            </div>


            <div class="form-group mb-3">
              <label>Post Title</label>
              <input type="text" class="form-control @error('post_title') is-invalid  @enderror" name="post_title"
                value="">
            </div>

            <div class="form-group mb-3">
              <label>Post Category</label>
              <select class="form-control" name="sub_category_id">
                <option value="">Sub |=>| Category</option>
                @foreach($sub_category as $row)
                <option value="{{ $row->id }}">{{ $row->sub_category_name }} => {{ $row->rCategory->category_name }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group mb-3">
              <label>Tags</label>
              <input type="text" class="form-control" name="tags" value="">
            </div>

            <div class="form-group mb-3">
              <label>Post Detail</label>
              <textarea name="post_detail" class="form-control snote" cols="30" rows="10"></textarea>
            </div>


            <div class="form-group mb-3">
              <label>Is Shareable?</label>
              <select name="is_share" class="form-control">
                <option value="">Select</option>
                <option value="1">Share</option>
                <option value="0">Not Share</option>
              </select>
            </div>

            <div class="form-group mb-3">
              <label>Is Comment?</label>
              <select name="is_comment" class="form-control">
                <option value="">Select</option>
                <option value="1">Open Comment</option>
                <option value="0">Close Comment</option>
              </select>
            </div>


          </div>
        </div>
      </div>
      {{-- ads --}}
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection
