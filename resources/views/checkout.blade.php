@extends('app',[
    'title'=>'Đăng ký mượn sách'
])
@section('content')
    <section id="checkout" class="container">
        <h1>Đăng ký mượn sách</h1>
        <div class="row">
            @livewire('check-out')
        </div>
    </section>

@endsection