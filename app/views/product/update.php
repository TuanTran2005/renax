@extends('layout.main')

@section('content')

<div class="container mt-4">
    <h2 >Sửa Sản Phẩm</h2>
    @if (isset($_SESSION['errors']) && isset($_GET['msg']))
        <div class="alert alert-danger">
            <ul>
                @foreach ($_SESSION['errors'] as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <div class="alert alert-success">
            {{ $_SESSION['success'] }}
        </div>
    @endif

    <form action="{{ route('post-product/'.$sql->id) }}" method="post">
        <div class="form-group mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="ten" id="ten" value="{{$sql->ten}}" class="form-control" placeholder="nhập tên sản phẩm" >
        </div>
        <div class="form-group mb-3">
            <label for="">Giá</label>
            <input type="number" name="gia" id="gia" value="{{$sql->gia}}" class="form-control" placeholder="nhập giá sản phẩm" >
        </div>
        <button type="submit" name="gui" class="btn btn-primary">Gửi</button>
    </form>
</div>
@endsection