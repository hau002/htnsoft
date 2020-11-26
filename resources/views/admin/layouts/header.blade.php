<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: rgba(0, 149, 255, 0.68);">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" style="width: 250px;" type="search" placeholder="Tìm kiếm" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!--- ----------Config ----------------->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-cogs"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Cài đặt hệ thống</span>
        <div class="dropdown-divider"></div>
        <a href="{{route('logout')}}" class="dropdown-item" style="text-align: center;">
          <i class="fa fa-sign-out-alt"></i> Đăng xuất
        </a>
        <div class="dropdown-divider"></div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{Route('admin.home')}}" class="brand-link">
    <img src="public/frontend/images/htn-logo.png" alt="HTN Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">QUẢN TRỊ HTNCORP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{Route('admin.home')}}" class="d-block">
          @if(Auth::check())
          {{Auth::user()->name}}
          @endif
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="{{Route('admin.home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bảng điều khiển
              </p>
            </a>
          </li>
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-table"></i>
             <p>
              Danh mục tin tức
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.news-cate')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới danh mục tin tức</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.all-news-cate')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả danh mục tin tức</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="far fa-newspaper"></i>
            <p>
              Quản lý tin tức
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.news')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới tin tức</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.all-news')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách tin tức</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Danh mục sản phẩm
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.all-project-cate')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả danh mục sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.project-cate')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới danh mục sản phẩm</p>
              </a>
            </li>
            
          </ul>
        </li>
       
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fab fa-product-hunt"></i>
            <p>
              Quản lý sản phẩm
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.project')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.all-project')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách sản phẩm</p>
              </a>
            </li>
            
          </ul>
        </li>


        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Quản lý slide
            </p>
          </a>
        </li>
       
       <li class="nav-item">
        <a href="{{route('admin.all-contact')}}" class="nav-link">
         <i class="fas fa-phone-square-alt"></i>
          <p>
            Liên hệ
          </p>
        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Quản lý người dùng
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.manage-users')}}" class="nav-link item-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách tài khoản</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.create-users')}}" class="nav-link item-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới tài khoản</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="{{Route('admin.setting-website')}}" class="nav-link">
          <i class="fas fa-cog"></i>
          <p>
            Cài đặt website
          </p>
        </a>
      </li>
      
      <li class="nav-header"></li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>