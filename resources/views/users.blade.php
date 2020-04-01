@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">アンケートページ
                @auth
                    <a href="/" class="btn btn-sm btn-primary float-right">トップへ移動</a>
                @endauth
                </div>

                <div class="card-body">
                    <h3 class="card-title">
                    アンケート登録
                    </h3>

                    <div class="card-body table-responsive p-0 detail-body">
                        <div class="template_hide">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">設問<span class="q_number">1</span>
                                        <div class="icheck-success d-inline mr-3">
                                            <input type="checkbox" name="" id="q_required">
                                            <label class="small" id="label_q_required" for="q_required">
                                                必須項目
                                            </label>
                                        </div>
                                    </h3>
                                    <form action="/question" method="post">
                                        @csrf
                                        <div class="form-group clearfix input-type">
                                            <div class="icheck-success d-inline ml-2">
                                                <input class="" name="type" type="radio" id="type1" value="radio" data-check="1" checked>
                                                <label id="type1" for="type1">単一選択</label>
                                            </div>
                                            <div class="icheck-success d-inline ml-2">
                                                <input class="" name="type" type="radio" id="type2" value="check" data-check="1" >
                                                <label id="type2" for="type2">複数選択</label>
                                            </div>
                                            <div class="icheck-success d-inline ml-2">
                                                <input class="" name="type" type="radio" id="type3" value="text" data-check="1" >
                                                <label id="type3" for="type3">文章回答</label>
                                            </div>
                                            <div class="form-group" id="">
                                                <div>アンケート</div>
                                                <input class="form-control" name="questionTitle" type="text" id="question" data-check="1" >
                                            </div>
                                            <div class="form-group" id="">
                                                <div>設問名</div>
                                                <input class="form-control" name="questionName" type="text" id="question" data-check="1" >
                                            </div>
                                            <div class="form-group" id="">
                                                <label for="questionOption">選択肢</label>

                                                <textarea class="form-control" name="questionOption" rows="3" id="questionOption" placeholder="選択肢1&#13;&#10;選択肢2&#13;&#10;選択肢3 ..."></textarea>
                                            </div>
                                        </div>
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
