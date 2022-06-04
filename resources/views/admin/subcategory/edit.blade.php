@extends('admin.layout.app')

@section('heading', 'Update Sub-Category')

@section('button')
<a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary">
  <i class="fas fa-eye"></i></a>
@endsection

@section('main_content')
<div class="section-body">
  <form action="{{ route('admin_sub_category_update',$subcategory->id) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-3">
              <label>Selec Category Name*</label>
              <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Please select...</option>
                @foreach($category as $row)
                <option value="{{ $row->id }}" @if($subcategory->category_id == $row->id)
                  selected
                  @endif>
                  {{ $row->category_name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label>Sub-Category Name*</label>
              <input type="text" class="form-control @error('sub_category_name') is-invalid  @enderror"
                name="sub_category_name" value="{{ $subcategory->sub_category_name }}">
            </div>


            <div class="form-group mb-3">
              <label>Show on Menu?</label>
              <select name="show_on_menu" class="form-control @error('show_on_menu') is-invalid @enderror">
                <option value="">Please select...</option>
                <option value="Show" @if ($subcategory->show_on_menu == 'Show') selected @endif>Show</option>
                <option value="Hide" @if ($subcategory->show_on_menu == 'Hide') selected @endif>Hide</option>
              </select>
            </div>

            <div class="form-group mb-3">
              <label>Show on Home?</label>
              <select name="show_on_home" class="form-control @error('show_on_home') is-invalid @enderror">
                <option value="">Please select...</option>
                <option value="Show" @if ($subcategory->show_on_home == 'Show') selected @endif>Show</option>
                <option value="Hide" @if ($subcategory->show_on_home == 'Hide') selected @endif>Hide</option>
              </select>
            </div>



            <div class="form-group mb-3">
              <label>Sub-Category Order*</label>
              <input type="text" class="form-control @error('sub_category_order') is-invalid @enderror"
                name="sub_category_order" value="{{ $subcategory->sub_category_order }}">
            </div>
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
