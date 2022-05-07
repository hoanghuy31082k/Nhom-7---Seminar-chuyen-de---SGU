@extends('app',[
    'title' => 'Trang chủ'
])
@section('content')
    <section class="container-fluid" id="banner">
        <div class="row">
            <div class="col-lg-6">
                <h1>Dịch vụ cho mượn sách chất lượng tại Việt Nam</h1>
                @livewire('index-search')
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('img/banner.svg') }}" alt="">
            </div>
        </div>
    </section>
    <section id="book-list" class="container">
        <h2 class="title">Sách phổ biến</h2>
        <div class="row">
            @foreach ($books as $book)
                <div class="col-lg-4">
                    <div class="item ">
                        <div class="img">
                            @if ($book->status==0)
                                @livewire('addto-cart',[
                                    'item'=>$book
                                ])
                            @endif
                            <img src="{{ asset('img')."/".$book->img }}" alt="">    
                        </div>
                        
                        <div class="content">
                            <h4>{{ $book->title }}</h4>
                            <p><strong>Tác giả:</strong> {{ $book->author }}</p>
                            <strong>Tình trạng: {!! $book->status==0 ? '<span style="color:green">Còn</span>' : '<span style="color:red">Đã được mượn</span>' !!}</strong>
                        </div>
                    </div>    
                </div>
                
            @endforeach
        </div>
    </section>
@endsection