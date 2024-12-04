@extends('layout.main')
@section('content')


<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Giỏ Hàng</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Giỏ Hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Giỏ Hàng //</h6>
                <h1 class="mb-5">Các sản phẩm trong giỏ hàng của bạn</h1>
            </div>
            <div class="d-flex flex-wrap">
    <!-- Cart Items -->
    @foreach ($_SESSION['cart'] as $product_id => $product_data)
    @foreach ($product_data as $color => $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 cart-item">
           
            <div class="product-info">
                
                <div class="product-id">ID: <span id="product-id">{{ $product_id }}</span></div>
                
              
                <img src="{{ $product['images'] }}" alt="product" class="img-fluid">
                
             
                <div class="product-name">{{ $product['name'] }}</div>
                
             
                <div class="price">{{ $product['price'] }} VND</div>
                
             
                <div class="price">Color: {{ $color }}</div>
                
        
                <div class="d-flex justify-content-between align-items-center">
                    <input type="number" class="quantity-input" value="{{ $product['quantity'] }}" min="1" id="quantity-input-{{ $product_id }}">
                    <a href="{{ route('removeFromCart') }}?id={{$product_id}}&color={{ urldecode($color) }}">
                        <button class="delete-btn" title="Xóa sản phẩm" onclick="removeProduct({{ $product_id }}, '{{ $color }}')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </a>
                </div>
            </div>
 
            <!-- Nút mua sản phẩm --> 
            <a href="{{ route('pay') }}?id={{ $product_id }}&sl={{ $product['quantity'] }}&color={{ urlencode($color) }}">
                <button class="btn-custom mt-3 w-100" onclick="buyNow({{ $product_id }})">Mua ngay</button>
            </a>
        </div>
    @endforeach
@endforeach

</div>
              

                <!-- Add more products here -->
            </div>


            <!-- Checkout Button -->
            <div class="text-center mt-4">
                <button class="checkout-btn">Thanh toán</button>
            </div>
        </div>
    </div>
    @endsection