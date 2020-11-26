@extends('admin.layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-bars"></i> Sửa danh mục tin tức</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh mục tin tức</li>
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
          <h3 class="card-title">Sửa danh mục tin tức  <i class="fas fa-bars"></i></h3>
        </div>
        <!-- /.card-header -->
        @if(Session::has('edit-success'))
        <div class="alert alert-success" style="margin: 1em 1em;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>{{Session::get('edit-success')}}</strong>
        </div>
        @endif
        <!-- form start -->
        <form role="form" action="{{Route('admin.update-news-cate')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }} 
          <input type="hidden" name="id" value="{{$newstype->id}}"> 
          <div class="card-body">
            <div class="form-group">
              <label>Tên danh mục (<span style="color: red;">*</span>)</label>

              <input type="text"  id="title" onkeyup="return ChangeToSlug();" value="{{isset($newstype->name) ? $newstype->name : ''}}" class="form-control" name="name" placeholder="Nhập tên ..." required="">
               <input type="hidden" id="slug" value="" class="form-control" name="slug"  required="">
            </div>

            <div class="form-group">
              <label>Trạng Thái (<span style="color: red;">*</span>)</label>
              <br>
              <select name="status" class="custom-select" style="width:15%">
                
                @if(isset($newstype->status) && $newstype->status == 1 )
                    <option value="1" selected>--Kích hoạt --</option>
                    <option value="0">--Vô hiệu hóa--</option>
                  @else
                    <option value="1" >--Kích hoạt --</option>
                    <option value="0" selected>--Vô hiệu hóa--</option>
                @endif
              </select>
            </div>
          
          </div>
          <!-- /.card-body -->
          <div class="d-flex">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-pencial"></i>Cập nhật</button>
            </div>
            <div class="card-footer">

              <a href="{{ route('admin.all-news-cate') }}" class="btn btn-warning">Quay lại</a>
            </div>
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
<script>
  function ChangeToSlug()
  {
    var title, slug;
    //Lấy text từ thẻ input title 
    title = document.getElementById("title").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
  }
</script>

@endsection