@extends('app',[
    'title' => 'Đăng nhập'
])

@section('content')
    <section class="authform">
        <form action="{{ route('check') }}">
            <h1>Đăng nhập</h1>
            <label for="username">Tài khoản:</label>
            <input type="text" id="username" name="username">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Đăng nhập">
        </form>
    </section>
@endsection