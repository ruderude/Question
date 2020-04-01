@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">トップページ
                @auth
                    <a href="/users/{{Auth::id()}}" class="btn btn-sm btn-primary float-right">アンケート登録</a>
                @endauth
                </div>

                <div class="card-body">
                    {{ $message }}
                    <br>
                    @foreach($items as $key => $item)
                    <a href="/show/{{$item->id}}">{{$item->title}}[{{$item->created_id}}]</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
