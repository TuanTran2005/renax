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
    @foreach ($_SESSION['cart'] as $product_id => $images)
     @foreach ($images as $image=>$nameProduct )
      @foreach ($nameProduct as $name=>$color )
      @foreach ($color as $colors=>$priceProduct )
       @foreach ( $priceProduct as $price=>$quantity)
       
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 cart-item">
        <!-- Sản phẩm -->
        <div class="product-info">
            <!-- ID sản phẩm -->
            <div class="product-id">ID: <span id="product-id">{{ $product_id }}</span></div>
            
            <!-- Ảnh sản phẩm -->
            <img src="{{ $image}}" alt="product" class="img-fluid">
            
            <!-- Tên sản phẩm -->
            <div class="product-name">{{ $name}}</div>
            
            <!-- Giá sản phẩm -->
            <div class="price">{{ $price}} VND</div>
            <div class="price">Color: {{ $colors ? $colors : 'White' }}</div>
            <!-- Số lượng và thao tác xóa -->
            <div class="d-flex justify-content-between align-items-center">
                <input type="number" class="quantity-input" value="{{ $quantity }}" min="1" id="quantity-input-{{ $product_id }}">
                <button class="delete-btn" title="Xóa sản phẩm" onclick="removeProduct({{ $product_id }})">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
 
        <!-- Nút mua sản phẩm -->
        <button class="btn-custom mt-3 w-100" onclick="buyNow({{ $product_id }})">Mua ngay</button>
    </div>
    @endforeach 
     @endforeach
    @endforeach
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