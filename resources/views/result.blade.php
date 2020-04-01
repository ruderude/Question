@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">結果ページ
                @auth
                    <a href="/" class="btn btn-sm btn-primary float-right">トップページへ</a>
                @endauth
                </div>

                <div class="card-body">
                    <h4>{{ $question->title }}のあなたの回答</h4>
                    <br>
                    @foreach($results as $key => $result)
                    {{ $result->question }}
                    <br>
                    {{ $result->question_replie->answer }}
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
