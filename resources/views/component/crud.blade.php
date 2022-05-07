<section class="crud d-flex">
    <div class="fl-pc-12 fl-vt-12 fl-mb-12" style="overflow: inherit">
        <div class="table">
            <h2>Quản lý {{ Str::lower($title) }}</h2>
            <div class="toolbar d-flex">
                <div class="fl-pc-6 fl-vt-6 fl-mb-12"></div>
                <input class="fl-pc-6 fl-vt-6 fl-mb-12" type="text" placeholder="Nhập giá trị cần tìm">
            </div>
            <table>
                @php
                    $count = count($data);

                @endphp
                <thead>
                    
                    <tr>
                        <th>
                            <input type="checkbox" name="" id="">
                        </th>
                        @foreach ($data as $x)
                            <th class="{{ $x['onmobile'] ? '' : 'hidden-mb' }}">{{ $x['name'] }}</th>
                        @endforeach
                        
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @if (!count($model)==0)
                        @foreach ($model as $row)
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                @foreach ($data as $column)
                                    <td class="{{ $column['onmobile'] ? '' : 'hidden-mb' }}">{{ $row->{$column['attr']} }}</td>
                                @endforeach
                            </tr>        
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