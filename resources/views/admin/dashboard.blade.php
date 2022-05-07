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
                'color'=> 'red'
            ],
            [
                'name'=>'Số lần trả sách',
                'count'=>$count3
            ]
        
        ]
    ])
    @include('component.crud',[
        'title'=>'Danh mục sản phẩm',
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
                'name' => 'ID người dùng',
                'attr' => 'user_id',
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
            ]
            
        ]
    ])
@endsection
