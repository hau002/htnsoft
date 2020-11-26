 <footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-5">
            <h2 class="footer-heading mb-4">{{__('user.about-us')}}</h2>
            <p><span style="color: red;"><b>HTNSOFT</b></span> là một công ty công nghệ, nhắm đến bất kỳ ai tò mò về công nghệ trong thương mại điện tử. Tham gia với chúng tôi để nói chuyện, thảo luận nhóm, bootcamp và tìm hiểu sâu về các chủ đề công nghệ đầy thách thức!</p>
          </div>
          <div class="col-md-3 ml-auto">
            <h2 class="footer-heading mb-4">{{__('user.feature')}}</h2>
            <ul class="list-unstyled">
              <li><a href="#">{{__('user.product')}}</a></li>
              <li><a href="#">{{__('user.services')}}</a></li>
              <li><a href="#">{{__('user.our-team')}}</a></li>
              <li><a href="#">{{__('user.contact')}}</a></li>
              <li><a href="#">{{__('user.blog')}}</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">{{__('user.follow-us')}}</h2>
            <a href="{{$settings->facebook}}" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="{{$settings->twitter}}" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="{{$settings->instagram}}" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="{{$settings->youtube}}" class="pl-3 pr-3"><span class="icon-youtube"></span></a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <h2 class="footer-heading mb-4">{{__('user.sub')}}</h2>
        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="{{__('user.enter-email')}}" aria-label="Enter Email" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary text-white" type="button" id="button-addon2">{{__('user.send')}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row pt-3 mt-3 text-center">
      <div class="col-md-12">
        <div class="border-top pt-3">
          <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with by <a href="https://htnsoft.com" target="_blank" >HTNCORP<span class="text-danger">.</span> </a></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>