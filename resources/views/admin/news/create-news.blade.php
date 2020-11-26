@extends('admin.layouts.master')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-newspaper"></i> Thêm mới bài viết</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thêm mới bài viết</li>
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
            <h3 class="card-title">Tạo bài viết <i class="fas fa-newspaper"></i></h3>
          </div>
          <!-- /.card-header -->
          @if(Session::has('success'))
          <div class="alert alert-success" style="margin: 1em 1em;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('success')}}</strong>
          </div>
          @endif
          <!-- form start -->
          <form role="form" action="{{Route('admin.save-news')}}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }} 

          <div class="card-body">
            <div class="form-group">
              <label>Tiêu đề (<span style="color: red;">*</span>)</label>
              <input type="name"  class="form-control" name="title" placeholder="Nhập tiêu đề ..." required="true">
            </div>

            <div class="form-group">
              <label>Danh mục (<span style="color: red;">*</span>)</label>
              <select name="id_type" class="custom-select"  required="true">
                <option value="">--Chọn danh mục--</option>
                @foreach($danhmuc as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Mô tả ngắn(<span style="color: red;">*</span>)</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="summary" rows="3" placeholder="Nhập mô tả ngắn ..." required="true"></textarea>
            </div>
            
            <div class="form-group">
              <label >Nội dung (<span style="color: red;">*</span>)</label>
              <textarea class="form-control" name="content" rows="3" id="editor1" required="true"></textarea>
            </div>
            <script>
             CKEDITOR.replace( 'editor1', {
              filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
              filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
              filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
              filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
              filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
              filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
            } );
          </script>

          <div class="form-group">
            <label for="exampleInputEmail1">Chọn ảnh đại diện cho bài viết (<span style="color: red;">*</span>)</label>
            <form>
              <div class="custom-file">
                <input type="file" name="images" accept="image/*" id="imgThumb" required="">
              </div>
              <br>
              <img id="image-preview" src="" style="margin: 0.5em 0;width: 30%;height: auto;">
            </form>
          </div>

          <div class="form-group">
            <label>Trạng Thái (<span style="color: red;">*</span>)</label>
            <select name="status" class="custom-select">
              <option value="1">--Kích hoạt --</option>
              <option value="0">--Vô hiệu hóa--</option>

            </select>
          </div>
        

        <div class="form-group">
         <div class="form-check">
          <input type="checkbox" value="1" class="form-check-input" id="exampleCheck1" name="highlight">
          <label class="form-check-label" for="exampleCheck1">Tin nổi bật</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Xuất bản</label>
        </div>

        

        <div>
          <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tạo mới</button>
        </div>

      </div>
      <!-- /.card-body -->

    </form>
  </div>
  <!-- /.card -->
</div>
</div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
<script type="text/javascript">

  $(document).ready(function(){
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#image-preview').attr('src', e.target.result);
        }

              reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
          }

          $("#imgThumb").change(function() {
            readURL(this);
          });
        });
</script>

@endsection