@extends('layout.main')
@section('content')

    <style>
       
        .page-header {
            background-image: url('https://inanaz.com.vn/wp-content/uploads/2024/02/banner-catalogue-xe-hoi.jpg');
            background-size: cover;
            background-position: center;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .page-header h1 {
            font-size: 40px;
            font-weight: bold;
        }

        .page-header .breadcrumb {
            background: none;
        }

      
        .blog-header {
            text-align: center;
            margin-top: -80px;
            z-index: 1;
        }

        .blog-header h1 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        .blog-header h6 {
            color:#ff0000;
            text-transform: uppercase;
        }
a{
    text-decoration: none;
}
        .blog-header p {
            font-size: 18px;
            color: #555;
        }

        
        .blog-posts {
            margin-top: 30px;
        }

        .blog-posts .blog-post-item {
            display: flex;
            flex-direction: row;
            
            overflow: hidden;
            background-color: #f4f7fc;
           
            transition: transform 0.3s ease;
            margin-bottom: 15px;
            padding: 15px;
        }

        .blog-posts .blog-post-item:hover {
            transform: scale(1.05);
            
        }

        
        .blog-posts .blog-post-item img {
            width: 80px; /* Hình ảnh chiều rộng 80px */
            height: 80px; /* Chiều cao 80px */
            object-fit: cover; /* Giữ tỷ lệ hình ảnh */
            margin-right: 20px;
        }

        .blog-posts .blog-post-item .content {
            display: flex;
            flex-direction: column;
          
        }

        /* Giảm kích thước chữ và không vượt quá hình ảnh */
        .blog-posts .blog-post-item h5 {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            white-space: nowrap;  /* Ngăn không cho văn bản xuống dòng */
            overflow: hidden;     /* Ẩn phần văn bản bị thừa */
            text-overflow: ellipsis;  /* Hiển thị dấu "..." khi văn bản bị cắt */
            max-width: calc(100% - 90px);  /* Giới hạn độ rộng của tiêu đề, tránh vượt qua hình ảnh */
        }

        .blog-posts .blog-post-item p {
            font-size: 12px;
            color: #777;
            margin-bottom: 0;
            white-space: nowrap;  /* Ngăn không cho văn bản xuống dòng */
               /* Ẩn phần văn bản bị thừa */
            text-overflow: ellipsis;  /* Hiển thị dấu "..." khi văn bản bị cắt */
            max-width: calc(100% - 90px);  /* Giới hạn độ rộng của mô tả, tránh vượt qua hình ảnh */
        }

        /* Flexbox Row */
        .blog-posts .row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Giảm khoảng cách giữa các bài viết */
        }

        .blog-posts .col-md-4 {
            flex: 0 0 32%;
            max-width: 32%;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            color: #007bff;
            border: 1px solid #ddd;
            padding: 8px 16px;
            border-radius: 5px;
        }

        .pagination .page-link:hover {
            background-color: #f8f9fa;
        }

        /* Footer */
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Bài Viết</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Bài Viết</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Section Start -->
<div class="container py-5">
    <div class="blog-header">
        <h6>// Bài Viết Của Chúng Tôi //</h6>
        <h1 class="mb-4">Khám Phá Những Bài Viết Mới</h1>
        <p>Đọc những bài viết thú vị về các sản phẩm, công nghệ và các xu hướng mới nhất trong ngành xe hơi.</p>
    </div>

    <div class="blog-posts">
        <div class="row">
            @foreach ( $post as $index )
            
            
            <div class="col-md-4 mb-4">
                <a href="{{route('post_detail')}}?id={{$index->id}}">
                <div class="blog-post-item">
                    <img src="{{$index->images}}" alt="">
                    <div class="content">
                        <h5>{{$index->title}}</h5>
                        <p>{{$index->content}}</p>
                    </div>
                </div>
            </a>
            </div>
@endforeach
            <!-- Add more posts here... -->
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
</div>
<!-- Blog Section End -->
@endsection

