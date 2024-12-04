@extends('layout.main')

@section('content')
    <style>
        /* Tổng thể trang */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        /* Container chính */
        .container {
            display: flex;
            justify-content: space-between;
            padding: 0;  /* Xóa padding để toàn bộ không gian được sử dụng */
        }

        /* Sidebar bên trái */
        .sidebar {
            width: 25%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-left: 0;  /* Đảm bảo sidebar sát vào góc trái */
        }

        .sidebar h4 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .sidebar ul li img {
            width: 60px; /* Chiều rộng hình ảnh */
            height: 60px; /* Chiều cao hình ảnh */
            border-radius: 5px;
            object-fit: cover;
            margin-right: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: color 0.3s;
        }

        .sidebar ul li a:hover {
            color: #007bff;
        }

        /* Nội dung bài viết */
        .post-content-container {
            width: 70%; /* Chiếm phần còn lại */
            padding: 20px;
            margin: 0 auto; /* Căn giữa phần nội dung */
        }

        /* Tiêu đề bài viết */
        .post-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .post-header h1 {
            font-size: 30px;
            font-weight: bold;
            color: #333;
        }

        .post-header img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 20px;
        }

        /* Thông tin bài viết */
        .post-header p {
            font-size: 16px;
            color: #888;
            margin-top: 10px;
        }

        /* Nội dung bài viết */
        .post-content {
            margin-top: 40px;
            font-size: 18px;
            line-height: 1.8;
            color: #333;
        }

        .post-content p {
            margin-bottom: 20px;
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>

<!-- Trang Bài Viết Chi Tiết -->
<div class="container">
    <!-- Sidebar: Danh sách bài viết -->
    <div class="sidebar">
        <h4>Danh Sách Bài Viết</h4>
        <ul>
            @foreach ( $post as $index )
            
           
            <li>
                <img src="{{$index->image}}" alt="Bài Viết 1">
                <a href="{{route('service_detail')}}?id={{$index->id}}">{{$index->name}}</a>
            </li>
             @endforeach
        </ul>
    </div>

    <!-- Nội dung bài viết -->
    <div class="post-content-container">
        <!-- Tiêu đề bài viết và hình ảnh -->
        <div class="post-header">
            <h1>{{$sql->name}}</h1>
            <img src="{{$sql->image}}" alt="Bài Viết Hình Ảnh">
            
        </div>

        <!-- Nội dung bài viết -->
        <div class="post-content">
        <p>{{$sql->description}}</p>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
