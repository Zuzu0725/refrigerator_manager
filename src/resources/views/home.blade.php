@extends('layouts.master_bootstrap')
@section('title', 'トップページ')
@section('content')
    <h2>賞味期限が近い食材</h2>
    <table class="table mb-3">
        <thead>
            <tr>
                <th scope="col">食品名</th>
                <th scope="col">個数/量</th>
                <th scope="col">賞味期限</th>
                <th scope="col">備考</th>
                <th scope="col">収納場所</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expiry_sevendays_ago_food as $food)
            <tr>
                <td>{{ $food->food_name }}</td>
                <td>{{ $food->amount }}</td>
                <td>{{ $food->expiry }}</td>
                <td>{{ $food->memo }}</td>
                <td>{{ $food->storage }}</td>
            </tr>               
        @endforeach
        </tbody>
    </table>

    <h2 class="mt-5">賞味期限切れの食材</h2>
    <table class="table mb-3">
        <thead>
            <tr>
                <th scope="col">食品名</th>
                <th scope="col">個数/量</th>
                <th scope="col">賞味期限</th>
                <th scope="col">備考</th>
                <th scope="col">収納場所</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expired_foods as $food)
            <tr>
                <td>{{ $food->food_name }}</td>
                <td>{{ $food->amount }}</td>
                <td>{{ $food->expiry }}</td>
                <td>{{ $food->memo }}</td>
                <td>{{ $food->storage }}</td>
            </tr>               
        @endforeach
        </tbody>
    </table>
@endsection
