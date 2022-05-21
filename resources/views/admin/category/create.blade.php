@extends('admin.layout.app')

@section('heading', 'Create Category')

@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary">
  <i class="fas fa-eye"></i></a>
@endsection

@section('main_content')
<div class="section-body">
  <form action="{{ route('admin_category_store') }}" method="post">
    @csrf
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-3">
              <label>Category Name*</label>
              <input type="text" class="form-control" name="category_name" value="">
            </div>
            <div class="form-group mb-3">
              <label>Show on Menu?</label>
              <select name="show_on_menu" class="form-control">
                <option value="Show" selected>Show</option>
                <option value="Hide">Hide</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label>Category Order*</label>
              <input type="text" class="form-control" name="category_order" value="">
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