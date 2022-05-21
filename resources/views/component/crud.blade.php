<section class="crud d-flex">
    <div class="fl-pc-12 fl-vt-12 fl-mb-12" style="overflow: inherit">
        <div class="table">
            <h2 style="margin-bottom: 10px">Quản lý {{ Str::lower($title) }}</h2>
            {{-- <div class="toolbar d-flex">
                <div class="fl-pc-6 fl-vt-6 fl-mb-12"></div>
                <input class="fl-pc-6 fl-vt-6 fl-mb-12" type="text" placeholder="Nhập giá trị cần tìm">
            </div> --}}
            <table>
                @php
                    $count = count($data);

                @endphp
                <thead>
                    
                    <tr>
                        
                        @foreach ($data as $x)
                            <th class="{{ $x['onmobile'] ? '' : 'hidden-mb' }}">{{ $x['name'] }}</th>
                        @endforeach
                        @if ($prefix=='borrow')
                            <td></td>    
                        @endif
                        
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @if (!count($model)==0)
                        @foreach ($model as $row)
                            <tr>
                                
                                @foreach ($data as $column)
                                    @if (isset($column['type']) &&  $column['type'] == 'statusborrow')
                                        <td class="{{ $column['onmobile'] ? '' : 'hidden-mb' }}">{{ $row->{$column['attr']}==null ? "Chưa trả" : $row->{$column['attr']} }}</td>
                                    @elseif (isset($column['type']) &&  $column['type'] == 'statusbook')
                                        <td class="{{ $column['onmobile'] ? '' : 'hidden-mb' }}">
                                            @if ($row->{$column['attr']} == '0')
                                                <span style="color: green">Còn sách</span>
                                            @endif
                                            @if ($row->{$column['attr']} == '1')
                                                <span style="color: rgb(124, 124, 0)">Đang xử lí</span>
                                            @endif
                                            @if ($row->{$column['attr']} == '2')
                                                <span style="color: red">Đã được mượn</span>
                                            @endif
                                        </td>
                                    @else
                                        <td class="{{ $column['onmobile'] ? '' : 'hidden-mb' }}">{{ isset($column['attr2']) ? $row->{$column['attr']}->{$column['attr2']} : $row->{$column['attr']} }}</td>
                                    @endif
                                @endforeach
                                @if ($prefix=='borrow')
                                    <td width="20px"><ion-icon name="eye-sharp" style="cursor: pointer;" onclick="toggle('{{ $row->id }}')"></ion-icon></td>    
                                @endif
                                
                            </tr>
                            <script>
                                function toggle(id){
                                    let detail = document.getElementById(id);
                                    if (detail.style.display == 'none') {
                                        detail.style.display = 'contents';
                                    } else {
                                        detail.style.display = 'none';
                                    }
                                }
                            </script>
                            @if ($prefix=="borrow")
                                <tr style="display:none" id="{{ $row->id }}">
                                    <td colspan="{{ count($data)+1 }}">
                                        <h3>Chi tiết</h3>
                                        <table style="width:90%;margin:auto">
                                            <thead>
                                                <tr>
                                                    <td>Ảnh</td>
                                                    <td>Tên sách</td>
                                                    <td>Tình trạng</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($row->book()->get() as $book)
                                                <tr>
                                                    <td><img style="width:100px" src="{{ asset('img')."/".$book->img }}" alt=""></td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->status == '0' ? "Chưa được mượn" : "" }}{{ $book->status == '1' ? "Chưa xác thực" : "" }}{{ $book->status == '2' ? "Đã xác thực" : "" }}</td>
                                                </tr>    
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endif   
                        @endforeach    
                    @else
                        <tr>
                            <td colspan="{{ count($data) + 1 }}" style="padding-block: 50px">
                                <img src="{{ URL::asset('system/wallet.png') }}" alt="Empty" style="display: block;margin: auto; max-width: 10%; margin-bottom: 14px;">
                                {{ $title }} trống <br>
                                <a class="button green middle" href="" style="margin-top: 20px">Thêm {{ Str::lower($title) }}</a>
                            </td>
                        </tr>
                    @endif
                    
                    

                </tbody>
            </table>    
        </div>
        
    </div>
</section>