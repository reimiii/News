@extends('admin.layout.app')

@section('heading', 'Edit Category')

@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary">
  <i class="fas fa-eye"></i></a>
@endsection

@section('main_content')
<div class="section-body">
  <form action="{{ route('admin_category_update',$category->id) }}" method="post">
    @csrf
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-3">
              <label>Category Name*</label>
              <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name"
                value="{{ $category->category_name }}">
            </div>
            <div class="form-group mb-3">
              <label>Show on Menu?</label>
              <select name="show_on_menu" class="form-control">
                <option value="Show" @if ($category->show_on_menu == 'Show') selected @endif>Show</option>
                <option value="Hide" @if ($category->show_on_menu == 'Hide') selected @endif>Hide</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label>Category Order*</label>
              <input type="text" class="form-control @error('category_order') is-invalid @enderror"
                name="category_order" value="{{ $category->category_order }}">
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
