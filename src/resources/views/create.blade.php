@extends('layouts.master_bootstrap')
@section('title', '新規登録画面')
@section('content')
<h2 class="mb-4">食材の登録</h2>
<form action="{{ route('store') }}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <div class="form-group">
        <label for="food_name">食品名</label>
        <input type="text" class="form-control" id="food_name" name="food_name" value="{{ old('food_name') }}">
        @error('food_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="amount">個数</label>
        <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
        @error('amount')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="expiry">賞味期限</label>
        <input type="date" class="form-control" id="expiry" name="expiry" value="{{ old('expiry') }}">
        @error('expiry')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="storage">収納場所</label>
        <select class="form-control" id="storage" name="storage" value="">
            <option value="">選択してください</option>
            <option
                value="冷蔵庫"
                @if(old('storage') === '冷蔵庫') selected @endif
            >冷蔵庫</option>
            <option
                value="冷凍庫"
                @if(old('storage') === '冷凍庫') selected @endif
            >冷凍庫</option>
            <option
                value="野菜室"
                @if(old('storage') === '野菜室') selected @endif
            >野菜室</option>
        </select>
        @error('storage')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-5">
        <label for="memo">備考</label>
        <textarea class="form-control" name="memo" id="memo" cols="30" rows="10">{{ old('memo') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">登録する</button>
    <a href="{{ route('refrigerator') }}" class="btn btn-light">キャンセル</button>
</form>
@endsection
