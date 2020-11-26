@extends('client.layouts.master')
@section('content')
<!--================Single-blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="public/img/{{$datasingle->images}}" alt="">
                  </div>

                  <div class="blog_details">
                     <h2>{{$datasingle->title}}</h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-tag"></i> {{$datasingle->name}}</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i> {{$datasingle->views}}</a></li>
                        <li><a href="#"><i class="far fa-clock"></i> {{date("d/m/Y h:s:i", strtotime($datasingle->created_at))}}</a></li>
                     </ul>
                     <div class="excert" style="max-width: 800px;overflow-x:scroll;">
                        {!!$datasingle->content!!}
                     </div>
                  </div>
               </div>

               <div class="navigation-top" style="margin-top: 1em;">
                  <div class="d-sm-flex justify-content-between text-center">
                     <h1 class="like-info">
                        <span class="align-middle"><i class="fas fa-share-square"></i></span> 
                        <b>Bài viết liên quan</b>
                     </h1>
                  </div>
               </div>
               <div class="related-posts" style="background: #ebe7e740;padding: 10px;">
                  <ul>
                     <li>
                         @foreach($relatedpost as $row)
                          <a href="{{Route('single-blog',$row->slug)}}" title="{{$row->title}}" style="display: block; padding: 10px;font-size: 0.8em;"><i class="fas fa-angle-double-right"></i> {{$row->title}}</a>
                         @endforeach
                     </li>
                  </ul>
               </div> 
               
               <div class="comments-area">
                  <h4 >{{count($comment)}} {{__('user.comment')}}</h4>
                  @foreach($comment as $row)
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="public/img/cmt.png" style="width: 70px" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 {{$row->content}}
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="" >{{$row->name}}</a>
                                    </h5>
                                    <p class="date">{{date("d/m/Y h:s:i", strtotime($row->created_at))}}</p>
                                    
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  
               </div>
               <div class="comment-form">
                  <h4>{{__('user.Leave a Reply')}}</h4>
                  <form class="form-contact comment_form" action="{{Route('cmt-blog')}}" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="id_news" value="{{$datasingle->id}}">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9" placeholder="{{__('user.Write Comment')}}" required></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="{{__('user.Enter Name')}}" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="{{__('user.Enter Email')}}" required>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">{{__('user.Send Message')}}</button>
                     </div>
                  </form>
               </div>
            </div>
         
            <div class="col-lg-4">
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
   <!--================ Single-blog Area end =================-->
   @endsection