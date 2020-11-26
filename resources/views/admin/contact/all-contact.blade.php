@extends('admin.layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Liên hệ</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Liên hệ</li>
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
            <h3 class="card-title"><i class="fa fa-list"></i>  Tất Cả liên hệ(<span style="color: red;">*</span>)</h3>

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
          @if(Session::has('success'))
          <div class="alert alert-success" style="margin: 1em 1em;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('success')}}</strong>
          </div>
          @endif
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th colspan="1" style="text-align: center;">STT</th>
                  <th colspan="1" style="text-align: center;">Tên </th>
                  <th colspan="1" style="text-align: center;">Số điện thoại</th>
                  <th colspan="1" style="text-align: center;">Email</th>
                  <th colspan="1" style="text-align: center;">Tin Nhắn</th>
                  <th colspan="1" style="text-align: center;">Ngày Gửi</th>
                  <th colspan="1" style="text-align: center;">Trạng thái</th>
                  <th colspan="1" style="text-align: center;">Thao tác</th>
                </tr>
                <?php
                  $stt = 0;
                ?> 
                @foreach($contact1 as $row)
                <tr>
                  <td>{{ $stt+=1 }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->question }}</td>
                  <td>{{$row->created_at}}</td>
                  @if($row->status == 0)
                  <td> <i class="fa fa-times" style="color:red;"></i> Chưa trả lời</td>
                  <td>
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-reply"></i> Trả lời</button>
                  </td>
                  @else 
                    <td><i class="fa fa-check" style="color:green;"></i> Đã trả lời</td>
                    <td></td>
                  @endif
               </tr>
               @endforeach
             </thead>
             <tbody>


             </tbody>
           </table>

         </div>
         <!-- /.card-body -->
       </div>
       <!-- /.card -->
        {{$contact1->links()}}
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;"><i class="fa fa-reply"></i> Trả lời</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
        <label for="email">Trả lời:</label>
        <input type="email" class="form-control" placeholder="Nhập câu trả lời...">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Trả lời</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>

  </div>
</div>

@endsection