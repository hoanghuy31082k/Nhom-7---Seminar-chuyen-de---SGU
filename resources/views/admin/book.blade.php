@extends('admin',[
    'title' => 'Sách'
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
                'color'=> 'red'
            ],
            [
                'name'=>'Sách đang xử lí',
                'count'=>$count3
            ]
        
        ]
    ])
    {{-- {{ dd($borrow[0]->returndate) }} --}}
    @include('component.crud',[
        'title'=>'Sách',
        'model' => $book,
        'prefix' => 'book',
        'data' => [
            [
                'primary' => true, // Gán màu
                'name' => 'RFID',
                'attr' => 'rfid',
                'attr2' => 'rfid',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'Tên sách',
                'attr' => 'title',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'Tên tác giả',
                'attr' => 'author',
                'onmobile' => true
],
            [
                'type' => 'statusbook',
                'primary' => true, // Gán màu
                'name' => 'Tình trạng',
                'attr' => 'status',
                'onmobile' => false
            ]
            
        ]
    ])
@endsection
