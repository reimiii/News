<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                            </li>
                            @foreach($global_categories as $row)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void;" id="navbarDropdown" role="button"
                                       data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        {{ $row->category_name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($row->rSubCategories as $sub_row)
                                            <li><a class="dropdown-item" href="{{ route('category',$sub_row->id) }}">{{ $sub_row->sub_category_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
