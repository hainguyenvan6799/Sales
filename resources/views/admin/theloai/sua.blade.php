@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>

                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif

                        @if(session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif

                        <form action="admin/theloai/sua/{{$theloai->id}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input class="form-control" name="txtTen" placeholder="Nhập tên thể loại muốn sửa..." value="{{$theloai->tentheloai}}" />
                            </div>

                            <div class="form-group">
                                <label>Tên không dấu</label>
                                <input class="form-control" name="txtTen" placeholder="Nhập tên thể loại muốn sửa..." value="{{$theloai->tenkhongdau}}" />
                            </div>

                            <div class="form-group">
                                <label>Hình đại diện</label>
                                <input type="file" class="form-control" name="filehinh" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection