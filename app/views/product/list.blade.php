@extends('layout.main')

@section('content')
<div class="container mt-4">
    <h1>Chào mừng bạn đến với bình nguyên vô tân!</h1>

    <div class="mb-3">
        <a href="{{ route('add-product')}}" class="btn btn-primary">Thêm sản phẩm</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
            @foreach ($products as $product )
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->ten }}</td>
                <td>{{ number_format($product->gia, 0, ',', '.') }} VND</td>
                <td>
                <a href="{{ route('update-product/'.$product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="{{ route('delete-product/'.$product->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
