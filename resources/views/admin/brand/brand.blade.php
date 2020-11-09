@extends('admin.layouts.master')

@section('page-breadcrum')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Brand</h4>
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
                    <div class="table-responsive">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                            {{session('success')}}
                        </div>
                    @endif
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
                    
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand as $value)
                            <tr>
                                <th scope="row">{{ $value['id'] }}</th>
                                <td>{{$value['brand']}}</td>
                                <td>
                                <a href="{{ route('admin.brand.remove', ['id' => $value['id']]) }}" onclick="return confirm('muon xoa chu?')">
                                <i class="fa fa-trash"></i> delete
                                </a>
                                    <a href="{{ route('admin.brand.edit', ['id' => $value['id']]) }}">sua</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success"><a href="{{ url('/admin/brand/add')}}">Add Brand</a></button>
                </div>
            </div>
            {{ $brand->links() }}
    </div>
@endsection
@section('footer')
<footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
@endsection