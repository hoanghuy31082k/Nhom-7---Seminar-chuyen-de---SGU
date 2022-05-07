@extends('admin',[
    'title' => 'Danh mục sản phẩm'
])
@section('content')
    @include('component.crud',[
        'title'=>'Danh mục sản phẩm',
        'model' => $users,
        'prefix' => 'user',
        'data' => [
            [
                'primary' => true, // Gán màu
                'name' => 'ID',
                'attr' => 'id',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'Tên',
                'attr' => 'name',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'SĐT',
                'attr' => 'phone',
                'onmobile' => true
            ],
            [
                'primary' => true, // Gán màu
                'name' => 'Email',
                'attr' => 'email',
                'onmobile' => false
            ]
            
        ]
    ])
@endsection