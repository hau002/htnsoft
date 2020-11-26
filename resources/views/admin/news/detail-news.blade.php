@extends('admin.layouts.master')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
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
        <h1 class="m-0 text-dark">Chi tiết tin tức</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Chi tiết tin tức</li>
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
            <h3 class="card-title"><i class="fa fa-newspaper"></i>  Chi tiết tin tức </h3>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body table-responsive p-0">
            
            <h3 style="padding: 1em;">{{$data->summary}}</h3>
            <div class="image-title" style="padding: 1em;">
               <img src="public/img/{{$data->images}}" alt="" style="width:70%;max-height: 400px;">
            </div>
            <div class="author" style="display: flex;flex-direction: row;padding: 1em;">
               <img style="height: 50px;width: 50px;border-radius: 50%;" src="public/frontend/images/avatar.png" alt="Colorlib">
               <span style="padding: 1em;"><b>{{$data->author}}</b></span>
             </div>

            <div style="padding: 1em;">
              <span><b><i class="fa fa-clock"></i></b> {{date("d/m/Y h:s:i", strtotime($data->created_at))}}</span>
            </div>

            <div style="padding: 1em;">
              <span><b><i class="fa fa-eye"></i> {{$data->views}}</b></span>
            </div>

            <h2 style="padding: 1em;"><b>{{$data->title}}</b></h2>

            <div style="padding: 1em;margin: 0.5em 0;">
              <label style="padding: 0.5em;background: #6610f2;color: #fff;border-radius: 10px;"><i class="fas fa-tags"></i> {{$data->category}}</label>
            </div>

            <div style="padding: 1em;">
              {!! $data->content !!}
            </div>
            <a href="{{Route('admin.all-news')}}" style="margin: 1em;" class="btn btn-primary"><i class="fas fa-backward"></i> Quay lại</a>
         </div>

         <!-- /.card-body -->
       </div>
       <!-- /.card -->
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->
</section>
<!-- /.content -->



@endsection