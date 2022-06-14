@extends('admin.layout.app')

@section('heading', 'Edit Post')

@section('button')
    <a href="{{ route('admin_post_show') }}" class="btn btn-primary">
        <i class="fas fa-eye"></i>
    </a>
@endsection

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin_post_update',$posts->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Existing Post Photo</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$posts->post_photo) }}" alt="" width="200">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Change Post Photo</label>
                                <div>
                                    <input type="file" name="post_photo">
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label>Post Title</label>
                                <input type="text" class="form-control @error('post_title') is-invalid  @enderror"
                                       name="post_title"
                                       value="{{ $posts->post_title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Post Category</label>
                                <select class="form-control select2" name="sub_category_id">
                                    <option value="">Sub ( Category )</option>
                                    @foreach($sub_category as $row)
                                        <option value="{{ $row->id }}"
                                                @if ($row->id == $posts->sub_category_id) selected @endif>
                                            {{$row->sub_category_name }} ( {{$row->rCategory->category_name }} )
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Existing Tags</label>
                                <div>
                                    @foreach($ex_tags as $row)
                                        <span class="badge badge-primary">{{ $row->tag_name }} | <a
                                                    href="{{ route('admin_post_tag_delete',[$row->id,$posts->id]) }}"
                                                    onclick="return confirm('Delete?');" style="color: red">X</a></span>
                                    @endforeach
                                </div>

                            </div>

                            <div class="form-group mb-3">
                                <label>New Tags</label>
                                <input type="text" class="form-control" name="tags" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label>Post Detail</label>
                                <textarea name="post_detail" class="form-control snote" cols="30"
                                          rows="10">{{ $posts->post_detail }}</textarea>
                            </div>


                            <div class="form-group mb-3">
                                <label>Is Shareable?</label>
                                <select name="is_share" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1" @if ($posts->is_share == 1)
                                    selected
                                            @endif>Share
                                    </option>
                                    <option value="0" @if ($posts->is_share == 0)
                                    selected
                                            @endif>Not Share
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Is Comment?</label>
                                <select name="is_comment" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1" @if ($posts->is_comment == 1)
                                    selected
                                            @endif>Open Comment
                                    </option>
                                    <option value="0" @if ($posts->is_comment == 0)
                                    selected
                                            @endif>Close Comment
                                    </option>
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
