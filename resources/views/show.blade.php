@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">回答ページ
                @auth
                    <a href="/" class="btn btn-sm btn-primary float-right">トップへ移動</a>
                @endauth
                </div>

                <div class="card-body">
                    <h3 class="card-title">
                    {{$question->title}}
                    </h3>

                    <div class="card-body table-responsive detail-body">
                        <div class="template_hide">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">設問<span class="q_number">1</span></h3>
                                    <form action="/answer" method="post">
                                        @csrf
                                        <input type="hidden" name="question_id" value="{{$question->id}}">
                                        <input type="hidden" name="created_id" value="{{$question->created_id}}">
                                        @foreach($details as $key => $item)
                                            <h5>{{$item->question}}</h5>
                                            <input type="hidden" name="detail_id" value="{{$item->id}}">
                                            @if($item->type === 'radio')
                                                @foreach(explode("\n", $item->option) as $i => $option)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="answer{{$key}}[]" id="radio{{$key}}{{$i}}" value="{{$option}}">
                                                        <label class="form-check-label" for="radio{{$key}}{{$i}}">{{$option}}</label>
                                                    </div>
                                                @endforeach
                                            @elseif($item->type === 'check')
                                                @foreach(explode("\n", $item->option) as $i => $option)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="answer{{$key}}[]" id="check{{$key}}{{$i}}" value="{{$option}}">
                                                        <label class="form-check-label" for="check{{$key}}{{$i}}">{{$option}}</label>
                                                    </div>
                                                @endforeach
                                            @elseif($item->type === 'text')
                                                <div class="form-check">
                                                    <input class="form-control" type="text" name="answer{{$key}}[]" id="text{{$key}}" value="">
                                                </div>
                                            @else
                                                <div>エラーです</div>
                                            @endif
                                        @endforeach
                                        <br>
                                        <input type="submit" value="送信">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
