@extends('admin.layout.app')

@section('heading', 'Edit Video Gallery')

@section('button')
    <a href="{{ route('admin_video_show') }}" class="btn btn-primary">
        <i class="fas fa-eye"></i></a>
@endsection

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin_video_update',$video->id) }}" method="post">
            @csrf
            <div class="row">
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Video Id</label>
                                <input type="text" class="form-control" name="video_id" value="{{ $video->video_id }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Caption</label>
                                <input type="text" class="form-control" name="caption" value="{{ $video->caption }}">
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
