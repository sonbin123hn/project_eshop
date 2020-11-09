@extends('frontend.layouts.masterpage')
@section('container')
<div class="container">

    <div>
        <form action="{{ url('/advance_search') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="col-sm-12">Brand</label>
                <div class="col-sm-12">
                    <select name="id_brand" class="form-control form-control-line">
                        <option value=""></option>
                        @foreach($brand as $value)
                            <option value="{{ $value['id'] }}" >{{ $value['brand'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12">Category</label>
                <div class="col-sm-12">
                    <select name="id_category" class="form-control form-control-line">
                        <option value=""></option>
                        @foreach($category as $val_category)
                            <option value="{{ $val_category['id'] }}">{{ $val_category['category'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12">Sale</label>
                <div class="col-sm-12">
                    <select name="trangthaisp" id="trangthaisp" class="form-control form-control-line">
                        <option value=""></option>
                        <option value="1">sale</option>
                        <option value="0">new</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-12">Price</label>
                <div class="col-sm-12">
                    <select name="price" class="form-control form-control-line">
                        <option value=""></option>
                        <option value="1">5-50</option>
                        <option value="2">50-100</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">name</label>
                <div class="col-md-12">
                    <input type="text" name="name" placeholder="name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
