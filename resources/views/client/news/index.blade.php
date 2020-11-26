@extends('client.layouts.master')
@section('content')
  <!--================Blog Area =================-->
  <section class="blog_area section-padding" style="margin-top: 1em;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                @if(count($data) > 0)
                    @foreach($data as $value)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" style="width: 100%;max-height: 400px;" src="public/img/{{$value->images}}" alt="">
                            <div class="blog_item_time">
                                <h3><i class="fa fa-tag"></i> {{$value->name}}</h3>
                            </div>
                        </div>
                        <div class="blog_details">
                            <a class="d-inline-block" href="{{Route('single-blog',$value->slug)}}">
                                <h2>{{$value->title}}</h2>
                            </a>
                            <p>{{$value->summary}}</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="far fa-clock"></i>{{date("d/m/Y h:s:i", strtotime($value->created_at))}}</a></li>
                                <li><a href="#"><i class="fa fa-eye"></i>{{$value->views}}</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach                 
                    <nav class="blog-pagination justify-content-center d-flex">
                           {{$data->links()}}
                    </nav>
                 @else 
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Chưa có bài viết nào!</strong>
                    </div>
                @endif
                </div>
               
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{Route('search-news')}}" method="get">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control" placeholder='{{__('user.Search Keyword')}}'
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '{{__('user.Search Keyword')}}'" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">{{__('user.search')}}</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">{{__('user.category')}}</h4>
                        <ul class="list cat-list">
                            @foreach($listcate as $cate)
                            <li>
                                <a href="{{Route('category-news',$cate['slug'])}}" class="d-flex">
                                    <p>{{$cate['name']}} &nbsp;</p>
                                    <p>(<span style="color: red;">{{$cate['total']}}</span>)</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">{{__('user.Recent Post')}}</h3>
                        @foreach($recentpost as $post)
                        <div class="media post_item">
                            <img src="public/img/{{$post->images}}" style="width: 5em;" alt="post">
                            <div class="media-body">
                                <a href="{{Route('single-blog',$post->slug)}}" title="{{$post->title}}">
                                    <h3>{{$post->title}}</h3>
                                </a>
                                <p><i class="far fa-clock"></i> {{date("d/m/Y h:s:i", strtotime($post->created_at))}}</p>
                                <p><i class="fa fa-eye"></i> {{$post->views}}</p>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </aside>
                    
                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">{{__('user.Notifications')}}</h4>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = '{{__('user.enter email')}}'" placeholder='{{__('user.enter email')}}' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">{{__('user.subcribe')}}</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
    <!--================Blog Area =================-->