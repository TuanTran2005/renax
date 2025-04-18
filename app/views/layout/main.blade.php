<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CarServ - Car Repair HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="/" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="../../css/style.css" rel="stylesheet">
    <style>
      .bonbon{
        overflow: auto;
        width: 100%;
      }
     
      ::-webkit-scrollbar {

  width: 0px;
}
body {
            font-family: 'Ubuntu', sans-serif;
            background-color: white;
            color: #333;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        /* Cart Item */
        .cart-item {
            border: 1px solid #e4e7f2;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        .cart-item:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .cart-item .product-name {
            font-size: 20px;
            font-weight: bold;
            color: #2d3436;
        }

        .cart-item .price {
            color: #e74c3c;
            font-size: 18px;
            font-weight: bold;
        }

        .cart-item img {
            width: 100px;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .quantity-input {
            width: 80px;
            padding: 5px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
            text-align: center;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border-radius: 50%;
            padding: 12px 14px;
            border: none;
            transition: all 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c0392b;
            transform: scale(1.1);
        }

        .btn-custom {
            background: linear-gradient(to right, #3498db, #8e44ad);
            color: white;
            border-radius: 8px;
            padding: 12px 24px;
            border: none;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .total-price {
            font-size: 28px;
            font-weight: 600;
            color: #2ecc71;
        }

        .total-price-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .checkout-btn {
            background-color: #2ecc71;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #27ae60;
        }

    </style>
</head>

<body>

 <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>123 Street, New York, USA</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                   @if (isset($_SESSION['auth']) && $_SESSION['auth']['role']==1)
                   
                 
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="{{route('useradmin/')}}"><i class="fas fa-sign-in-alt"></i></a> 
                     @endif 
                     @if (isset($_SESSION['auth']) )
                    
                     <a class="btn btn-sm-square bg-white text-primary me-1" href="{{route('bill')}}"><i class="fas fa-user"></i></a>
                @else
                <a class="btn btn-sm-square bg-white text-primary me-1" href="{{route('login')}}"><i class="fas fa-user"></i></a>
                @endif 
               </div>
            </div>
        </div>
    </div>

<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
  <a href="{{route('/')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <h2 class="m-0 text-primary"><img src="https://png.pngtree.com/png-vector/20230221/ourmid/pngtree-red-dragon-logo-with-flaming-fire-color-3d-png-image_6611905.png" width="70px" alt="">Renax</h2>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
      <a href="{{route('/')}}" class="nav-item nav-link active">Trang chủ</a>
      <a href="{{route('aubost')}}" class="nav-item nav-link">Về chúng tôi</a>

      <a href="{{ route('product_page') }}?id=1" class="nav-item nav-link">Sản phẩm</a>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Loại hàng</a>
        <div class="dropdown-menu fade-up m-0">
          <a href="{{route('product_page')}}?id_loaihang=1" class="dropdown-item">Senda3</a>
          <a href="{{route('product_page')}}?id_loaihang=3" class="dropdown-item">Mazda3</a>
          <a href="{{route('product_page')}}?id_loaihang=5" class="dropdown-item">Xe Hatchback</a>
        </div>
      </div>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Thư mục</a>
        <div class="dropdown-menu fade-up m-0">
          <a href="{{route('mainPost')}}" class="dropdown-item">Bài viết</a>
          <a href="{{route('service')}}" class="dropdown-item">Dịch vụ</a>
          <a href="{{route('cart')}}" class="dropdown-item">Giỏ hàng</a>
        </div>
      </div>

     
    </div>


    <form class="d-flex ms-3" action="{{route('product_page')}}" method="GET">
      <input class="form-control me-2"  type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="dulieu">
      <button name="timkiem" class="btn btn-outline-primary" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </form>

  </div>
</nav>

@yield('content')
<div
    class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn"
    data-wow-delay="0.1s"
    >
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Địa Chỉ</h4>
          <p class="mb-2">
            <i class="fa fa-map-marker-alt me-3"></i>123 Phố, New York, Mỹ
          </p>
          <p class="mb-2">
            <i class="fa fa-phone-alt me-3"></i>+012 345 67890
          </p>
          <p class="mb-2">
            <i class="fa fa-envelope me-3"></i>info@example.com
          </p>
          <div class="d-flex pt-2">
            <a class="btn btn-outline-light btn-social" href=""
              ><i class="fab fa-twitter"></i
            ></a>
            <a class="btn btn-outline-light btn-social" href=""
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="btn btn-outline-light btn-social" href=""
              ><i class="fab fa-youtube"></i
            ></a>
            <a class="btn btn-outline-light btn-social" href=""
              ><i class="fab fa-linkedin-in"></i
            ></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Giờ Mở Cửa</h4>
          <h6 class="text-light">Thứ Hai - Thứ Sáu:</h6>
          <p class="mb-4">09:00 AM - 09:00 PM</p>
          <h6 class="text-light">Thứ Bảy - Chủ Nhật:</h6>
          <p class="mb-0">09:00 AM - 12:00 PM</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Dịch Vụ</h4>
          <a class="btn btn-link" href="">Kiểm Tra Chẩn Đoán</a>
          <a class="btn btn-link" href="">Bảo Dưỡng Động Cơ</a>
          <a class="btn btn-link" href="">Thay Lốp</a>
          <a class="btn btn-link" href="">Thay Dầu</a>
          <a class="btn btn-link" href="">Dọn Dẹp Hút Bụi</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-light mb-4">Bản Tin</h4>
          <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
          <div class="position-relative mx-auto" style="max-width: 400px">
            <input
              class="form-control border-0 w-100 py-3 ps-4 pe-5"
              type="text"
              placeholder="Email của bạn"
            />
            <button
              type="button"
              class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
            >
              Đăng Ký
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a class="border-bottom" href="#">Tên Trang Web Của Bạn</a>, Tất Cả Quyền Được Bảo Lưu.
            Thiết Kế Bởi
            <a class="border-bottom" href="https://htmlcodex.com"
              >HTML Codex</a
            >
            <br />Phân Phối Bởi:
            <a
              class="border-bottom"
              href="https://themewagon.com"
              target="_blank"
              >ThemeWagon</a
            >
          </div>
          <div class="col-md-6 text-center text-md-end">
            <div class="footer-menu">
              <a href="">Trang Chủ</a>
              <a href="">Cookies</a>
              <a href="">Trợ Giúp</a>
              <a href="">Câu Hỏi Thường Gặp</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
          ><i class="bi bi-arrow-up"></i
        ></a>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
        <script src="js/main.js"></script>
      </body>
    </html>
    
