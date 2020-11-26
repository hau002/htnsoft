@extends('admin.layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Danh mục tin tức</h1>
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fa fa-list"></i>  Tất Cả Danh Mục (<span style="color: red;">{{$total}}</span>)</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 250px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm...">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          @if(Session::has('suc-edit'))
          <div class="alert alert-success" style="margin: 1em 1em;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('suc-edit')}}</strong>
          </div>
          @endif
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th colspan="1" style="text-align: center;">STT</th>
                  <th colspan="1" style="text-align: center;">Tên danh mục</th>
                  <th colspan="1" style="text-align: center;">Trạng thái</th>
                  <th colspan="2" style="text-align: center;">Thao tác</th>
                </tr>
             </thead>
             <tbody>
                <?php $stt = 0; ?>
                @foreach($news as $row)
                <tr>
                  <td style="text-align: center;">{{ $stt+=1 }}</td>
                  <td style="text-align: center;">{{ $row->name }}</td>
                  <td style="text-align: center;">
                    @if($row->status == 1)
                     <label class="switch">
                      <input type="checkbox" value="{{$row->id}}" class="switch-label" checked>
                      <span class="slider round"></span>
                    </label>
                    @else
                    <label class="switch">
                      <input type="checkbox" value="{{$row->id}}" class="switch-label">
                      <span class="slider round"></span>
                    </label>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    <div class="d-flex justify-content-center">
                      <div>
                        <a class="btn btn-primary mr-2" href="{{ route('admin.edit-news-cate', $row->id) }}"><i class="fa fa-edit"></i> Sửa</a>
                      </div>
                      <div class="">
                       <a class="btn btn-danger mr-2" href="{{ route('admin.delete-news-cate', $row->id) }}"><i class="fas fa-trash-alt"></i> Xóa</a>
                     </div>
                   </div>
                 </td>
               </tr>
               @endforeach
             </tbody>
           </table>
         </div>
         <!-- /.card-body -->
       </div>
       <!-- /.card -->
        {{$news->links()}}
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->
</section>
<!-- /.content -->


<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>

@endsection