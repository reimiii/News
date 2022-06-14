@extends('front.layout.app')

@section('main_content')
    
    @if($setting->news_ticker_status == 'Show')
        <div class="news-ticker-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acme-news-ticker">
                            <div class="acme-news-ticker-label">Latest News</div>
                            <div class="acme-news-ticker-box">
                                <ul class="my-news-ticker">
                                    @php $i=0; @endphp
                                    @foreach($post as $p)
                                        @php $i++; @endphp
                                        @if($i > $setting->news_ticker_total)
                                            @break
                                        @endif
                                        <li>
                                            <a href="{{ route('news_detail',$p->id) }}">{{ $p->post_title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <div class="home-main">
        <div class="container">
            <div class="row g-2">
                <div class="col-lg-8 col-md-12 left">
                    @php $i=0; @endphp
                    @foreach($post as $key)
                        @php $i++; @endphp
                        @if ($i > 1)
                            @break
                        @endif
                        <div class="inner">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{ asset('uploads/'.$key->post_photo) }}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span class="badge bg-success badge-sm">{{ $key->rSubCategory->sub_category_name }}</span>
                                        </div>
                                        <h2><a href="{{ route('news_detail',$key->id) }}">{{ $key->post_title }}</a>
                                        </h2>
                                        <div class="date-user">
                                            <div class="user">
                                                @if($key->author_id == 0)
                                                    @php
                                                        $user_data = App\Models\Admin::where('id', $key->admin_id)->first();
                                                    @endphp
                                                    
                                                    {{-- // dd($user_data->name); --}}
                                                @else
                                                    {
                                                    {{-- // Nanti dulu --}}
                                                    }
                                                @endif
                                                {{ $user_data->name }}
                                            </div>
                                            <div class="date">
                                                @php
                                                    
                                                    $time = strtotime($key->updated_at);
                                                    $final_time = date('d F Y', $time);
                                                
                                                @endphp
                                                {{ $final_time }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-12">
                    @php $i=0; @endphp
                    @foreach($post as $key)
                        @php $i++; @endphp
                        @if ($i == 1)
                            @continue
                        @endif
                        @if ($i > 3)
                            @break
                        @endif
                        <div class="inner inner-right">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{ asset('uploads/'.$key->post_photo) }}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                          <span class="badge bg-success badge-sm">
                                            {{ $key->rSubCategory->sub_category_name }}
                                          </span>
                                        </div>
                                        <h2>
                                            <a href="{{ route('news_detail',$key->id) }}">
                                                {{ $key->post_title }}
                                            </a>
                                        </h2>
                                        <div class="date-user">
                                            <div class="user">
                                                @if($key->author_id == 0)
                                                    @php
                                                        $user_data = App\Models\Admin::where('id', $key->admin_id)->first();
                                                    @endphp
                                                    
                                                    {{-- // dd($user_data->name); --}}
                                                @else
                                                    {
                                                    {{-- // Nanti dulu --}}
                                                    }
                                                @endif
                                                {{ $user_data->name }}
                                            </div>
                                            <div class="date">
                                                @php
                                                    
                                                    $time = strtotime($key->updated_at);
                                                    $final_time = date('d F Y', $time);
                                                
                                                @endphp
                                                {{ $final_time }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                
                </div>
            </div>
        </div>
    </div>
    
    @if ($home_ads->above_search_ad_status == 'Show')
        <div class="ad-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($home_ads->above_search_ad_url == '')
                            <img src="{{ asset('uploads/'.$home_ads->above_search_ad) }}" alt=""></a>
                        @else
                            <a href="{{ $home_ads->above_search_ad_url }}">
                                <img src="{{ asset('uploads/'.$home_ads->above_search_ad) }}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    
    <div class="search-section">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="" class="form-control" placeholder="Title or Description">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="" class="form-select">
                                <option value="">Select Category</option>
                                <option value="">Sports</option>
                                <option value="">National</option>
                                <option value="">Lifestyle</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="" class="form-select">
                                <option value="">Select SubCategory</option>
                                <option value="">Football</option>
                                <option value="">Cricket</option>
                                <option value="">Baseball</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="home-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 left-col">
                    <div class="left">
                    
                    @foreach($subcategory as $key)
                        
                        @if(count($key->rPost) == 0)
                            @continue
                        @endif
                        <!-- News Of Category -->
                            
                            <div class="news-total-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h2>{{ $key->sub_category_name }}</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-12 see-all">
                                        <a href="{{ route('category',$key->id) }}" class="btn btn-primary btn-sm">See
                                            All News</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($key->rPost as $key2)
                                        @if($loop->iteration == 2)
                                            @break
                                        @endif
                                        <div class="col-lg-6 col-md-12">
                                            <div class="left-side">
                                                <div class="photo">
                                                    <img src="{{ asset('uploads/'.$key2->post_photo) }}" alt="">
                                                </div>
                                                <div class="category">
                                                    <span class="badge bg-success">{{ $key->sub_category_name }}</span>
                                                </div>
                                                <h3>
                                                    <a href="{{ route('news_detail',$key2->id) }}">{{ $key2->post_title }}</a>
                                                </h3>
                                                <div class="date-user">
                                                    <div class="user">
                                                        @if($key2->author_id == 0)
                                                            @php
                                                                $user_data = App\Models\Admin::where('id', $key2->admin_id)->first();
                                                            @endphp
                                                            {{-- // dd($user_data->name); --}}
                                                        @else
                                                            {
                                                            {{-- // Nanti dulu --}}
                                                            }
                                                        @endif
                                                        {{ $user_data->name }}
                                                    </div>
                                                    <div class="date">
                                                        @php
                                                            
                                                            $time = strtotime($key2->updated_at);
                                                            $final_time = date('d F Y', $time);
                                                        
                                                        @endphp
                                                        {{ $final_time }}
                                                    </div>
                                                </div>
                                                <div class="post-text-pendek">
                                                    {!! $key2->post_detail !!}
                                                </div>
                                            </div>
                                        </div>
                                    
                                    @endforeach
                                    
                                    <div class="col-lg-6 col-md-12">
                                        <div class="right-side">
                                            
                                            @foreach($key->rPost as $key2)
                                                @if($loop->iteration == 1)
                                                    @continue
                                                @endif
                                                @if($loop->iteration == 6)
                                                    @break
                                                @endif
                                                <div class="right-side-item">
                                                    <div class="left">
                                                        <img src="{{ asset('uploads/'.$key2->post_photo) }}" alt="">
                                                    </div>
                                                    <div class="right">
                                                        <div class="category">
                                                            <span class="badge bg-success">{{ $key->sub_category_name }}</span>
                                                        </div>
                                                        <h2>
                                                            <a href="{{ route('news_detail',$key2->id) }}">{{ $key2->post_title }}</a>
                                                        </h2>
                                                        <div class="date-user">
                                                            <div class="user">
                                                                @if($key2->author_id == 0)
                                                                    @php
                                                                        $user_data = App\Models\Admin::where('id', $key2->admin_id)->first();
                                                                    @endphp
                                                                    
                                                                    {{-- // dd($user_data->name); --}}
                                                                @else
                                                                    {
                                                                    {{-- // Nanti dulu --}}
                                                                    }
                                                                @endif
                                                                {{ $user_data->name }}
                                                            </div>
                                                            <div class="date">
                                                                @php
                                                                    
                                                                    $time = strtotime($key2->updated_at);
                                                                    $final_time = date('d F Y', $time);
                                                                
                                                                @endphp
                                                                {{ $final_time }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // News Of Category -->
                        
                        @endforeach
                    
                    
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 sidebar-col">
                    @include('front.ads.side')
                </div>
            </div>
        </div>
    </div>
    
    @if($setting->video_status == 'Show')
        <div class="video-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-heading">
                            <h2>Videos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-carousel owl-carousel">
                            @foreach($video as $v)
                                @if($loop->iteration > $setting->video_total)
                                    @break
                                @endif
                                <div class="item">
                                    <div class="video-thumb">
                                        <img src="http://img.youtube.com/vi/{{ $v->video_id }}/0.jpg" alt="">
                                        <div class="bg"></div>
                                        <div class="icon">
                                            <a href="http://www.youtube.com/watch?v={{ $v->video_id }}"
                                               class="video-button"><i
                                                        class="fas fa-play"></i></a>
                                        </div>
                                    </div>
                                    <div class="video-caption">
                                        <a href="javascript:void;">{{ $v->caption }}</a>
                                    </div>
                                    <div class="video-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        @php
                                            
                                            $time = strtotime($v->updated_at);
                                            $final_time = date('d F Y', $time);
                                        
                                        @endphp
                                        {{ $final_time }}
                                    
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    
    @if ($home_ads->above_footer_ad_status == 'Show')
        <div class="ad-section-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($home_ads->above_footer_ad_url == '')
                            <img src="{{ asset('uploads/'.$home_ads->above_footer_ad) }}" alt="">
                        @else
                            <a href="{{ $home_ads->above_footer_ad_url }}"><img
                                        src="{{ asset('uploads/'.$home_ads->above_footer_ad) }}"
                                        alt=""></a>
                        @endif
                    
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
