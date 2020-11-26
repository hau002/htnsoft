@extends('admin.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-edit"></i> Cập nhật sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                <h3 class="card-title">Cập nhật sản phẩm <i class="fa fa-edit"></i></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{Route('admin.update-project')}}" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }} 
                <input type="hidden" name="id" value="{{$project->id}}"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm(<span style="color: red;">*</span>)</label>
                    <input type="name" name="project_name" value="{{isset($project->project_name) ? $project->project_name : ''}}" class="form-control"  placeholder="Nhập tên sản phẩm">
                  </div>
                  
                   <div class="form-group">
                      <label>Danh mục (<span style="color: red;">*</span>)</label>
                      <select name="id_type" class="custom-select"  required="true">
                        @foreach($pro_type as $value)
                          @if($project->id_type == $value->id )
                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                          @else 
                            <option value="{{$value->id}}" >{{$value->name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mô tả ngắn(<span style="color: red;">*</span>)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Nhập mô ngắn..." >{!!isset($project->description) ? $project->description : ''!!}
                    </textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <textarea  name="content" class="form-control" id="noidung" rows="10" placeholder="Nhập nội dung">{!!isset($project->content) ? $project->content : ''!!}
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
                    <label for="exampleInputEmail1">
                      Chọn ảnh đại diện cho sẩn phẩm (<span style="color: red;">*</span>)
                    </label>
                    <input type="file" name="images" id="imgThumb" class="form-control" accept="image/*" id="customFile"> <br>
                    <img src="public/img/{{isset($project->images) ? $project->images : ''}}" id="image-preview" style="margin: 0.5em 0;width: 30%;height: auto;">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh chi tiết sản phẩm (<span style="color: red;">*</span>)</label>
                    <input type="file" name="images-detail[]" class="form-control" accept="image/*" id="imgDetail" multiple> 
                    <br>
                    <div class="img-thumb">
                      @if($project->img_detail != null)
                        @foreach(explode(',',$project->img_detail) as $img)
                          <img src="public/img/{{$img}}" style=";width: 150px;height: auto;margin: 2px;">
                        @endforeach
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Link dùng thử</label>
                    <input type="url" name="link_demo" value="{{isset($project->link_demo) ? $project->link_demo : ''}}" class="form-control" style="width: 35%;" placeholder="Nhập link dùng thử">
                  </div>

                  <div class="form-group">
                    <label>Trạng Thái (<span style="color: red;">*</span>)</label>
                    <select name="status" class="custom-select">
                      @if(isset($project->status) && $project->status == 1 )
                        <option value="">--Chọn trạng thái--</option>
                        <option value="1" selected>--Kích hoạt --</option>
                        <option value="0">--Vô hiệu hóa--</option>
                      @else
                        <option value="">--Chọn trạng thái--</option>
                        <option value="1" >--Kích hoạt --</option>
                        <option value="0" selected>--Vô hiệu hóa--</option>
                      @endif
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="d-flex" style="margin: 1em;">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Cập nhật
                  </button>
                  <a href="{{ route('admin.all-project') }}" class="btn btn-warning" style="margin-left: 10px;"><i class="fas fa-backward"></i> Quay lại
                  </a>
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

<script type="text/javascript">

  $(document).ready(function(){

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); 
      }
    }

    function previewImages() {

      var $preview = $('.img-thumb').empty();
      if (this.files) $.each(this.files, readAndPreview);

      function readAndPreview(i, file) {

        if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
          return alert(file.name +" không hợp lệ");
        }

        var reader = new FileReader();

        $(reader).on("load", function() {
          $preview.append($("<img/>", {src:this.result, height:100}));
        });

        reader.readAsDataURL(file);
        
      }

    }


    $("#imgThumb").change(function() {
      readURL(this);
    });
    
    $('#imgDetail').on("change", previewImages);

  });
</script>


@endsection