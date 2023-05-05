{{-- layouts/admin.profile.phpを読み込む --}}
@extends('layouts.profile')


{{-- admin.blade.phpの@yield('title')に'クリエイト新規作成'を埋め込む --}}
@section('title', '課題プロフィールの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>課題プロフィールの新規作成</h2>
            </div>
        </div>
    </div>
@endsection