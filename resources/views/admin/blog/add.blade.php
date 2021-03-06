@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Blog</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('container-fluid')
            <div class="container-fluid">
               <!-- hien thi thong bao -->
               @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('success')}}
                                </div>
                            @endif
                            <!-- hien thi loi request -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                <form action="" enctype="multipart/form-data" method="post">
                   @csrf
                   <div class="form-group">
                        <label class="col-md-12">Title</label>
                        <div class="col-md-12">
                            <input type="text"  name="title" placeholder="vui long nhap title" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Image</label>
                        <div class="col-md-12">
                            <input type="file"  name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">des</label>
                        <div class="col-md-12">
                            <Textarea name="des" placeholder="vui long nhap des" class="form-control form-control-line"></Textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Content</label>
                        <div class="col-md-12">
                            <textarea name="content" id="demockeditor" cols="30" rows="10" class="form-control form-control-line"></textarea>
                        </div>
                    </div>
                   <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Add blog</button>
                        </div>
                    </div>
                </form>
            </div>
@endsection
@section('footer')
<footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
@endsection