@extends('app',[
    'title' => 'Đăng ký'
])

@section('content')
<section class="authform">
    <form action="{{ route('store') }}">
        <h1>Đăng ký</h1>
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name">
        <label for="username">Tài khoản:</label>
        <input type="text" id="username" name="username">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password">
        <label for="repassword">Nhập lại mật khẩu:</label>
        <input type="password" id="repassword" name="re-password">
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone">
        <input type="submit" value="Đăng ký">
    </form>
</section>
@endsection