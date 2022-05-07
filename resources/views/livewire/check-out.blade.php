<div>
    @foreach ($carts as $cart)
        <div class="col-12">
            <div class="row">
                @php
                    $result=App\Models\Book::find($cart->id);
                @endphp
                <div class="col-lg-2">
                    <img src="{{ asset('img')."/".$result->img }}" alt="">
                </div>
                <div class="col-lg-8">
                    <h4>{{ $result->title }}</h4>
                    <p><strong>Tác giả:</strong> {{ $result->author }}</p>
                </div>
                <div class="col-lg-2">
                    <a href="javascript:{}" wire:click="delete('{{ $cart->rowId }}')">Xóa</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="total col-12">
        <div>
            <strong>Tổng: </strong>{{ $carts->groupBy('id')->count() }}
        </div>
        <form action="{{ route('order') }}">
            <input type="submit" value="Đăng ký">
        </form>
    </div>
</div>
