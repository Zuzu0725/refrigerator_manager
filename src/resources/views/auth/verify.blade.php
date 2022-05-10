@extends('layouts.master_bootstrap')
@section('title', 'パスワード通知')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">パスワード再設定</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('パスワード再設定用URLをメールアドレスにお送りしました') }}
                        </div>
                    @endif

                    {{ __('続行する前に、確認用リンクが記載されたメールをご確認ください。') }}
                    {{ __('メールが届きませんか？') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('再通知') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
