@extends('layouts.master')

@section('content')
{{--  {{  dd(request()) }}  --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ساخت پست جدید</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}">بازگشت</a>
            </div>
        </div>
    </div>


    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                @include('layouts.partials.error')

                <div class="form-group">
                    <strong>عنوان:</strong>
                    <input type="text" name="title" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>نویسنده:</strong>
                    <input type="number" name="user_id" class="form-control" placeholder="">

                    {{--  <input type="text" name="employees[0][first_name]" class="form-control" placeholder="">
                    <input type="text" name="employees[0][last_name]" class="form-control" placeholder="">
                    <input type="text" name="employees[1][first_name]" class="form-control" placeholder="">
                    <input type="text" name="employees[1][last_name]" class="form-control" placeholder="">  --}}

                </div>

                {{--  <div class="form-group">
                    <strong>عکس:</strong>
                    <input type="file" name="image" class="form-control mb-3" placeholder="">
                    
                </div>  --}}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">ثبت</button>
            </div>
        </div>

    </form>

@endsection
