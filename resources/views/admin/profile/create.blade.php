{{-- layouts/admin.profile.phpを読み込む --}}
@extends('layouts.profile')

{{-- admin.blade.phpの@yield('title')に'クリエイト新規作成'を埋め込む --}}
@section('title', 'プロフィールの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの新規作成</h2>

                {{-- エラーメッセージの表示 --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- プロフィール作成フォーム --}}
                <form action="{{ route('admin.profile.create') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">性別</label>
                        <input type="text" id="gender" name="gender" class="form-control" value="{{ old('gender') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="hobby">趣味</label>
                        <input type="text" id="hobby" name="hobby" class="form-control" value="{{ old('hobby') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="introduction">自己紹介欄</label>
                        <textarea id="introduction" name="introduction" class="form-control" rows="5" required>{{ old('introduction') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">作成</button>
                </form>
            </div>
        </div>
    </div>
@endsection