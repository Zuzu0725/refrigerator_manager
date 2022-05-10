@extends('layouts.master_bootstrap')
@section('title', '野菜室一覧')
@section('content')

<div class="d-flex bd-highlight mb-5">
    <div class="mr-auto p-2 bd-highlight h2">野菜室の食材</div>
    <div class="p-2 bd-highlight"><a href="{{ route('refrigerator') }}" class="btn btn-outline-primary mr-2">冷蔵庫を確認する</a></div>
    <div class="p-2 bd-highlight"><a href="{{ route('freezer') }}" class="btn btn-outline-info mr-2">冷凍庫を確認する</a></div>
</div>

<!-- 検索フォーム -->
<div class="row" style="padding-bottom: 30px; margin-left: 0px; margin-right: 15px;">
    <div class="col-sm-10" style="padding-left:0;">
        <form method="get" action="{{ route('vegetable') }}" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="検索キーワード">
            </div>
            <div class="form-group">
                <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
            </div>
        </form>
    </div>
    <div class="col-sm-2" style="padding-left: 0;">
        <a href="{{ route('create') }}" class="btn" style="background-color: #f0ad4e; color: white; width: 100px; opacity: 0.8;" onMouseOut="this.style.opacity='0.8';" onMouseOver="this.style.opacity='1'"><i class="fas fa-plus"></i>
            新規登録
        </a>
    </div>
</div>

@if (!isset($vegetable_foods[0]))
    <div class="alert alert-danger" role="alert">
        野菜室に食材がありません
    </div>
@endif

<table class="table mb-3">
    <thead>
        <tr>
            <th scope="col">食品名</th>
            <th scope="col">個数/量</th>
            <th scope="col">賞味期限</th>
            <th scope="col">備考</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vegetable_foods as $food)
            <tr>
                <td>{{ $food->food_name }}</td>
                <td>{{ $food->amount }}</td>
                <td>{{ $food->expiry }}</td>
                <td>{{ $food->memo }}</td>
                <td><a href="{{ route('edit', ['id' => $food->id]) }}" class="btn btn-link">編集する</a></td>
                <td>
                    <form action="{{ route('destroy', ['id' => $food->id]) }}" method="POST" id="delete_{{ $food->id }}">
                        @csrf
                        <button type="submit" class="btn btn-danger" data-id="{{ $food->id }}"  onclick="deletePost(this);">削除</button>
                    </form>
                </td>
            </tr>               
        @endforeach
    </tbody>
</table>
<script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除しますか？')) {
            document.getElementById('delete_' + e.datasete.id).submit();
        }
    }
</script>
@endsection