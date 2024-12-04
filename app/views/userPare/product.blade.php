@extends('layout.main')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(https://inanaz.com.vn/wp-content/uploads/2024/02/banner-catalogue-xe-hoi.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Sản Phẩm</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
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

<!-- Order Now Start -->
<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Sản Phẩm Được Chứng Nhận và Giải Thưởng</h1>
                    <p class="text-white mb-0">Chúng tôi cung cấp các sản phẩm chất lượng cao được thiết kế để đáp ứng nhu cầu của bạn. Khám phá bộ sưu tập sản phẩm cao cấp của chúng tôi và đặt hàng ngay.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Đặt Hàng Sản Phẩm</h1>
                    <form>
                        <div class="row g-3">
                            <!-- Tên người dùng -->
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Họ và Tên" style="height: 55px;">
                            </div>
                            <!-- Email -->
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Email của Bạn" style="height: 55px;">
                            </div>
                            <!-- Số điện thoại -->
                            <div class="col-12 col-sm-6">
                                <input type="tel" class="form-control border-0" placeholder="Số điện thoại" style="height: 55px;">
                            </div>
                            <!-- Chọn Sản Phẩm -->
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" style="height: 55px;">
                                    <option selected>Chọn Sản Phẩm</option>
                                    <option value="1">Sản phẩm 1</option>
                                    <option value="2">Sản phẩm 2</option>
                                    <option value="3">Sản phẩm 3</option>
                                </select>
                            </div>
                            <!-- Số lượng -->
                            <div class="col-12 col-sm-6">
                                <input type="number" class="form-control border-0" placeholder="Số Lượng" style="height: 55px;" min="1">
                            </div>
                            <!-- Màu sắc -->
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" style="height: 55px;">
                                    <option selected>Chọn Màu</option>
                                    <option value="red">Đỏ</option>
                                    <option value="blue">Xanh Dương</option>
                                    <option value="green">Xanh Lá</option>
                                    <option value="black">Đen</option>
                                </select>
                            </div>
                            <!-- Yêu cầu đặc biệt -->
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Yêu Cầu Đặc Biệt" rows="4" style="height: 150px;"></textarea>
                            </div>
                            <!-- Nút Đặt Hàng -->
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Đặt Hàng Ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Order Now End -->

@endsection
