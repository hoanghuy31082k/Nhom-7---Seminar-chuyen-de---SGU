@extends('admin',[
    'title' => 'Dashboard'
])
@section('content')
    @include('component.stats-card',[
        'data'=> [
            [
                'name'=>'Sách đang mượn',
                'count'=>$count1
            ],
            [
                'name'=>'Sách còn lại',
                'count'=>$count2,
                'color'=> 'green'
            ],
            [
                'name'=>'Số lần trả sách',
                'count'=>$count3
            ]
        
        ]
    ])
    {{-- {{ dd($borrow[0]->returndate) }} --}}
    @include('component.crud',[
        'title'=>'Mượn',
        'model' => $borrow,
        'prefix' => 'borrow',
        'data' => [
            [
                'primary' => true, // Gán màu
                'name' => 'ID',
                'attr' => 'id',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'Tên người mượn',
                'attr' => 'user',
                'attr2' => 'name',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'Ngày mượn',
                'attr' => 'begindate',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'Hạn mượn',
                'attr' => 'enddate',
                'onmobile' => false
            ],
            [
                'type' => 'statusborrow',
                'primary' => true, // Gán màu
                'name' => 'Tình trạng',
                'attr' => 'returndate',
                'onmobile' => false
            ]
            
        ]
    ])
@endsection
