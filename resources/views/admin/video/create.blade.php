@extends('admin.layout.app')

@section('heading', 'Create Video Gallery')

@section('button')
    <a href="{{ route('admin_video_show') }}" class="btn btn-primary">
        <i class="fas fa-eye"></i></a>
@endsection

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin_video_store') }}" method="post">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Video Id</label>
                                <input type="text" class="form-control" name="video_id" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Caption</label>
                                <input type="text" class="form-control" name="caption" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
