
@extends('client.layouts.master')
@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(public/frontend/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
        <div class="row justify-content-center mb-4">
          <div class="col-md-8 text-center">
            <h1>Xây dựng sản phẩm chất lượng với <span class="typed-words"></span></h1>
            <p class="lead mb-5">Tận Tâm Phục Vụ Khách Hàng</p>
            <div><a data-fancybox data-ratio="2" href="https://www.youtube.com/watch?v=15NzkVVTHRw" class="btn btn-primary btn-md">{{__('user.watch-video')}}</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<section class="site-section" id="product-section">
  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-md-8 text-center">
        <h2 class="text-black pt-4 h1 site-section-heading text-center">{{__('user.our products')}} (<span style="color: red;">{{$total}}</span>)</h2>
        <p class="lead">Phát triển bám sát theo đúng yêu cầu thực tế từ phía khách hàng, giao diện đơn giản, linh hoạt trong quá trình sử dụng, tối ưu hóa quản lý, tiết kiệm chi phí.</p>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      @foreach($new_product as $new)
      <div class="col-md-6 col-lg-4">
        <a href="{{Route('product-detail',$new->slug)}}" target="_blank" class="media-1 ribbon-wrapper" style="border: 1px solid #eee;box-shadow: 1px 2px 7px 5px #aebbd3;">
          <img style="height: 420px;width: 100%;" src="public/img/{{ $new->images!= null && isset($new->images) ? $new->images : 'default.png' }}" alt="Image" class="img-fluid">
          <div class="media-1-content">
            <h2></h2>
            <span class="category">Xem chi tiết</span>
          </div>
          <div class="content-products" style="background: rgba(65, 106, 122, 0.8);position: absolute;bottom: 0;left: 0;right: 0;padding: 2em;text-align: center;">
            <h4 style="color: #fff;text-align: center;">
              <b><i class="fa fa-pager"></i></b> {{$new->project_name}}
            </h4>
            <div class="btn btn-primary"><b><i class="fa fa-tag"></i></b> {{$new->name}}</div>
          </div>
          <div class="ribbon bg-primary">
           <i class="fa fa-tag"></i> {{__('user.product')}}
          </div>
        </a>
      </div>
      @endforeach
    </div>
    <nav class="blog-pagination justify-content-center d-flex">
       {{$new_product->links()}}
    </nav>
  </div>
</section>

</style>  
<section class="site-section testimonial-wrap" style="margin-top: 2em;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h2 class="text-black h1 site-section-heading text-center">{{__('user.our team')}}</h2>
      </div>
    </div>
  </div>
  <div class="slide-one-item home-slider owl-carousel" id="team-section">
    <div>
      <div class="testimonial">
        <blockquote class="mb-5">
         <p>&ldquo;Chúng tôi khuyến khích mỗi đội nhóm và từng thành viên tự thách thức bản thân để phát huy tất cả những tiềm năng của bản thân thông kỹ năng của một lập trình viên và coi đó là một thế mạnh để phát triển công ty.&rdquo;</p>
        </blockquote>
        <figure class="mb-4 align-items-center justify-content-center">
          <div><img src="{{('public/frontend/images/team1.jpg')}}" alt="Image" class="img-fluid mb-3"></div>
          <p>Tuyên Nguyễn</p>
        </figure>
      </div>
    </div>
    <div>
      <div class="testimonial">
        <blockquote class="mb-5">
          <p>&ldquo;Khi bạn tin bạn làm được hay không làm được thì bạn đều đúng.&rdquo;</p>
        </blockquote>
        <figure class="mb-4 align-items-center justify-content-center">
          <div><img src="{{('public/frontend/images/team2.jpg')}}" alt="Image" class="img-fluid mb-3"></div>
          <p>Thiện Warren</p>
        </figure>
      </div>
    </div>

    <div>
      <div class="testimonial">

        <blockquote class="mb-5">
          <p>&ldquo;Khách hàng của chúng tôi là người duy nhất quyết định giá trị của hàng hóa và dịch vụ của chúng tôi. Chúng tôi cố gắng đáp ứng những nhu cầu chưa được đáp ứng và những dịch vụ chưa được phục vụ.&rdquo;</p>
        </blockquote>
        <figure class="mb-4 align-items-center justify-content-center">
          <div><img src="{{('public/frontend/images/team3.png')}}" alt="Image" class="img-fluid mb-3"></div>
          <p>Dưỡng Phạm</p>
        </figure>


      </div>
    </div>

  </div>
</section>

<section class="site-section border-bottom" id="services-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8 text-center" data-aos="fade-up">
        <h2 class="text-black h1 site-section-heading text-center">{{__('user.services')}}</h2>
      </div>
    </div>
    <div class="row align-items-stretch">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
        <div class="unit-4 d-flex">
          <div class="unit-4-icon mr-4"><span class="text-primary icon-laptop2"></span></div>
          <div>
            <h3>Phát triển hệ thống web</h3>
            <p>Chúng tôi có kinh nghiệm trong phát triển và vận hành hệ thống Web thi trực tuyến, phần mềm quản lý thuế, quản lý nhân sự,... với quy mô hàng triệu người dùng và có sự hiểu biết sâu rộng về kĩ thuật, sử dụng các ngôn ngữ lập trình: PHP, Java, .NET, Javascript</p>
           
          </div>
        </div>
      </div>
     
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
        <div class="unit-4 d-flex">
          <div class="unit-4-icon mr-4"><span class="text-primary icon-phonelink"></span></div>
          <div>
            <h3>Phát triển mobile</h3>
            <p>Với những dev có kinh nghiệm 4~5 năm trong lĩnh vực phát triển mobile (iOS,Android), chúng tôi đang tiến hành phát triển nhiều app mobile.</p>
          
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="unit-4 d-flex">
          <div class="unit-4-icon mr-4"><span class="text-primary icon-extension"></span></div>
          <div>
            <h3>Phát triển trò chơi</h3>
            <p>Chúng tôi có kinh nghiệm phát triển và vận hành game và có thể linh hoạt theo quy mô dự án mở rộng hay thu nhỏ. (Ngôn ngữ lập trình: Unity, Html5)</p>
         
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="site-section bg-light" id="contact-section">
  <div class="container">
    <div class="row pt-2">
      <div class="col-12 text-center">
        <h2 class="text-black h1 site-section-heading">{{__('user.contact')}}</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 mb-5">
        <form role="form" action="{{Route('save-contact')}}" class="p-5 bg-white" method="post" enctype="multipart/form-data">
           {{ csrf_field() }} 
          <h2 class="h4 text-black mb-5">{{__('user.contact-form')}}</h2> 
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="lname">{{__('user.name')}}</label>
              <input type="text" id="lname" name="name" placeholder="{{__('user.Enter fullname')}}" class="form-control" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="email">{{__('user.email')}}</label> 
              <input type="email" id="email" name="email" placeholder="{{__('user.Enter email')}}" class="form-control" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="subject">{{__('user.phone-number')}}</label> 
              <input type="subject" id="subject" placeholder="{{__('user.Enter phone')}}" name="phone" class="form-control" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="message">{{__('user.message')}}</label> 
              <textarea name="question" id="message" cols="30" rows="7" class="form-control" placeholder="{{__('user.Enter messages')}}" required></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="{{__('user.send-message')}}" class="btn btn-primary btn-md text-white">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5">
        <div class="p-4 mb-3 bg-white">
          <p class="mb-0 font-weight-bold">{{__('user.address')}}</p>
          <p class="mb-4">{{$settings->address}}</p>
          <p class="mb-0 font-weight-bold">{{__('user.phone')}}</p>
          <p class="mb-4"><a href="#">{{$settings->phone}}</a></p>
          <p class="mb-0 font-weight-bold">{{__('user.email-address')}}</p>
          <p class="mb-0"><a href="#">{{$settings->email}}</a></p>
        </div>
        <div class="">{!!$settings->map!!}</div>
      </div>
    </div>
  </div>
</div>
</section>

<div class="bg-primary py-5 d-block">
  <div class="container">
    <div class="justify-content-center">
      <div class="row">
          <div class="column is-narrow col-md-4 col-xs-4" style="text-align: center;">
            <img class="trust-logo" src="public/frontend/images/techgarden.png" alt="Revolut" style="max-width: 160px;max-height: 90px;">
          </div>
          <div class="column is-narrow col-md-4 col-xs-4" style="text-align: center;">
            <img class="trust-logo" src="public/frontend/images/hodi.png" alt="Remitly" style="max-width: 160px;max-height: 90px;">
          </div>
          <div class="column is-narrow col-md-4 col-xs-4" style="text-align: center;">
            <img class="trust-logo" src="public/frontend/images/htn.png" alt="Orange Logo" style="max-width: 160px;max-height: 90px;">
          </div>
          
      </div>
    </div>
  </div>  
</div>

<!-- Information_area  -->
<div class="Information_area overlay">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-8">
        <div class="info_text text-center">
          <h3>{{__('user.Contact Us Now')}}</h3>
          <p>{{__('user.Order the best products with modern technology')}}</p>
          <a class="boxed-btn3" href="tel://#"><i class="fa fa-phone"></i>  {{$settings->phone}}</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Information_area  end -->
@endsection
