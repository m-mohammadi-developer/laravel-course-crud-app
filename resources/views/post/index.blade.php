@extends('layouts.master')

@section('content')
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    {{-- {{ request()->path() }} --}}

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تاپ لرن</h2>
            </div>
            <div style="float:left; ">
                <a class="btn btn-success" href="{{ route('post.create') }}"> پست جدید </a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th>نویسنده</th>
            <th>عملیات</th>
        </tr>

        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td style="width: 60%; overflow: auto;">{{ $post->title }}</td>
                <td>{{ $post->user_id }}</td>
                <td>
                    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('post.show', ['id' => $post->id]) }}">نمایش</a>
                        <a class="btn btn-primary" href="{{ route('post.edit', ['id' => $post->id]) }}">ویرایش</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach


    </table>
@endsection
