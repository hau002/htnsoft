@extends('client.layouts.master')
@section('content')

<section class="blog_area single-post-area section-padding">
  <div class="container">
    <hr>
    <div class="row">

        <div class="col-lg-5 col-md-5 col-xs-12 left-content" >
          <div class="show" href="public/img/{{$data->images}}">
            <img src="public/img/{{$data->images}}" id="show-img">
          </div>
          <div class="small-img" style="z-index: 999;">
            <img src="public/frontend/images/online_icon_right@2x.png" class="icon-left" alt="" id="prev-img">
            <div class="small-container">
              <div id="small-img-roll">
                @foreach(explode(',',$data->img_detail) as $img)
                <img src="public/img/{{$img}}" class="show-small-img" alt="">
                @endforeach
              </div>
            </div>
            <img src="public/frontend/images/online_icon_right@2x.png" class="icon-right" alt="" id="next-img">
          </div>
       </div>

       <div class="col-lg-7 col-md-7 col-xs-12 right-content" style="z-index: -99;">
            <h2 style="text-align: center;">
             
              {{$data->project_name}}
            </h2>
            <hr>
            <div class="block d-flex justify-content-around">
               <a href="{{$data->link_demo}}" target="_blank" class="btn btn-success"><i class="fas fa-desktop"></i> {{__('user.View Demo')}}</a>
               <a class="btn btn-primary">
                <i class="fa fa-tag"></i> {{$data->name}}
              </a> 
               <a href="" class="btn btn-primary"><i class="fas fa-phone"></i> {{__('user.contact')}}</a>
             </div>
             <p class="line"></p>
             <hr />
             <p> <span style="color: orange;"><b>HTNCORP</b></span> sẽ hướng dẫn và hỗ trợ bạn sử dụng mà không tính thêm bất cứ chi phí nào. Bạn còn thắc mắc, vui lòng liên hệ <i class="fa fa-2 fa-phone color2"></i> <span style="color: #2990ea;">{{$settings->phone}}</span> hoặc <b class="color3">chat </b>ngay để được tư vấn hỗ trợ miễn phí. </p>

            <div class="title-line" style="padding: 1em;background: #ff8401;display: inline-block;border-radius: 4px 4px 0px 0px;margin-top: 1em;">
                <b style="color: #fff;">{{__('user.Purpose')}}</b>
             </div>
            <div class="description" style="border: 1px solid #eee;padding: 30px 15px;border-radius: 0px 4px 4px 4px;">
             {!! $data->description !!}
           </div>
            
           <div class="title-line" style="padding: 1em;background: #ff8401;display: inline-block;border-radius: 4px 4px 0px 0px;margin-top: 1em;">
              <b style="color: #fff;">{{__('user.Detail Description')}}</b>
            </div>
           <div class="description" style="border: 1px solid #eee;padding: 30px 15px;border-radius: 0px 4px 4px 4px;">
               {!! $data->content !!}
          </div>
       </div>

    </div>
  </div>
  <hr>
 </section>

<style type="text/css">
 .left-content .show{
  width: 400px;
  height: 400px;
  border:1px solid #eee;
}
#show-img { width: 400px; height: 400px; }
.small-img{
  width: 370px;
  height: 70px;
  margin-top: 10px;
  position: relative;
  left: 25px;
}
.small-img .icon-left, .small-img .icon-right{
  width: 12px;
  height: 24px;
  cursor: pointer;
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto 0;
}
.small-img .icon-left{
  transform: rotate(180deg)
}
.small-img .icon-right{
  right: 0;
}
.small-img .icon-left:hover, .small-img .icon-right:hover{
  opacity: .5;
}
.small-container{
  width: 310px;
  height: 70px;
  overflow: hidden;
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
}
.small-container div{
  width: 800%;
  position: relative;
}

.small-container .show-small-img{
  width: 70px;
  height: 70px;
  margin-right: 6px;
  cursor: pointer;
  float: left;
}
.small-container .show-small-img:last-of-type{
  margin-right: 0;
}

</style>
 @endsection