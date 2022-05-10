@extends('layouts.master_bootstrap')
@section('title', '食材の更新')
@section('content')
<h2 class="mb-4">食材の</h2>
<form action="{{ route('update', ['id' => $food->id]) }}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ $food->user_id }}">
    <div class="form-group">
        <label for="food_name">食品名</label>
        <input type="text" class="form-control" id="food_name" name="food_name" value="{{ $food->food_name }}">
    </div>

    <div class="form-group">
        <label for="amount">個数</label>
        <input type="text" class="form-control" id="amount" name="amount" value="{{ $food->amount }}">
    </div>

    <div class="form-group">
        <label for="expiry">賞味期限</label>
        <input type="date" class="form-control" id="expiry" name="expiry" value="{{ $food->expiry }}">
    </div>

    <div class="form-group">
        <label for="storage">収納場所</label>
        <select class="form-control" id="storage" name="storage">
            <option value="">選択してください</option>
            <option value="冷蔵庫" @if($food->storage === '冷蔵庫') selected @endif>冷蔵庫</option>
            <option value="冷凍庫" @if($food->storage === '冷凍庫') selected @endif>冷凍庫</option>
            <option value="野菜室" @if($food->storage === '野菜室') selected @endif>野菜室</option>
        </select>
    </div>

    <div class="form-group mb-5">
        <label for="memo">備考</label>
        <textarea class="form-control" name="memo" id="memo" cols="30" rows="10" value="{{ $food->memo }}"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">更新する</button>
    <button type="button" class="btn btn-light" onclick="history.back()">キャンセル</button>
</form>
@endsection
