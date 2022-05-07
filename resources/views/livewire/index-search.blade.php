<div>
    <div class="search">
        <input type="text" name="search" id="search" wire:model="kw" placeholder="Nhập tên sách bạn muốn tìm kiếm">
        <ion-icon name="search"></ion-icon>
        <div class="result">
            @if ($kw!='')
                @foreach($results as $result)
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="{{ asset('img')."/".$result->img }}" alt="">
                            </div>
                            <div class="col-lg-8">
                                <h4>{{ $result->title }}</h4>
                                <p><strong>Tác giả:</strong> {{ $result->author }}</p>
                            </div>
                            <div class="col-lg-2">
                                @if ($result->status==0)
                                    Còn sách
                                @else
                                    Đã mượn
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach    
            @endif
            
        </div>
    </div>
    
</div>
