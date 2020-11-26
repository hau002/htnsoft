@extends('admin.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-plus"></i> Thêm mới sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tạo sản phẩm <i class="fa fa-plus"></i></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{Route('admin.save-project')}}" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }} 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm(<span style="color: red;">*</span>)</label>
                    <input type="name" name="project_name" class="form-control"  placeholder="Nhập tên sản phẩm">
                  </div>

                  <div class="form-group">
                    <label>Danh mục (<span style="color: red;">*</span>)</label>
                    <select name="id_type" class="custom-select"  required="true">
                      @foreach($pro_type as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                 
                  
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mô tả ngắn(<span style="color: red;">*</span>)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Nhập mô ngắn..." required="true"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <textarea  name="content" class="form-control" id="noidung" rows="10" placeholder="Nhập nội dung">
                    </textarea>
                    <script>
                      CKEDITOR.replace( 'noidung',
                    {
                        filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
                        filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
                        filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
                        filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                        filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                        filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
                        
                    }
                    );
                    </script>
                  </div>                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh đại diện sản phẩm</label>
                    <br>
                    <input type="file" accept="image/png,image/jpg" name="images">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh chi tiết sản phẩm</label>
                    <br>
                    <input type="file" accept="image/png,image/jpg" multiple name="img_detail[]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link dùng thử</label>
                    <input type="url" name="link_demo" class="form-control" style="width: 35%;" placeholder="Nhập link dùng thử">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Trạng thái</label>
                    
                    <select class="custom-select" name="status" style="width: 15%;">
                      <option value="">--Chọn trạng thái--</option>
                      <option value="1">Xuất bản</option>
                      <option value="2">Không xuất bản</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tạo mới</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection