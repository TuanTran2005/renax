@extends('layout.main')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(https://inanaz.com.vn/wp-content/uploads/2024/02/banner-catalogue-xe-hoi.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Sản Phẩm</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{route('/')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Sản Phẩm</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Product List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp"  data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Sản Phẩm Của Chúng Tôi //</h6>
            <h1 class="mb-5">Khám Phá Sản Phẩm</h1>
        </div>
        <div class="row g-4">
            @foreach ( $product as $index )
            
           
            <!-- Product Item 1 -->
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="card product-item">
                    <img src="{{json_decode($index->images)[3] }}" width="406px" height="230px"  alt="Sản phẩm 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$index->name_product}}</h5>
                        <p class="card-text">{{$index->title}}</p>
                        <h6 class="text-primary mb-3">{{$index->price}}</h6>
                        <a href="{{route('detailProduct')}}?id={{$index->id}}" class="btn btn-primary">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
             @endforeach
           
        </div>

        <!-- Pagination Start -->
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <!-- Trang đầu -->
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="First">
                            <span aria-hidden="true">&laquo;&laquo;</span>
                        </a>
                    </li>
                    <!-- Trang trước -->
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <!-- Các số trang -->
                     @for ($i=1;$i<=$productx;$i++)
                    <li class="page-item active mr-2">
                        <a class="page-link" href="{{route('product_page')}}?id={{$i}}">{{$i}}</a>
                    </li>
                     @endfor
                    <!-- Trang tiếp theo -->
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <!-- Trang cuối -->
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Last">
                            <span aria-hidden="true">&raquo;&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Pagination End -->
    </div>
</div>
<!-- Product List End -->



@endsection
