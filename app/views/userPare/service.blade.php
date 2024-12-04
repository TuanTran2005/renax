@extends('layout.main')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 0;
        }
h1{
    color: white;
}
        .navbar {
            background-color: #333;
            padding: 20px 0;
        }

        .navbar-brand {
            color: #fff;
            font-size: 2em;
            text-transform: uppercase;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 1.1em;
        }

        .navbar-nav .nav-link:hover {
            color: #f39c12;
        }

        /* Banner */
        .banner {
            background-image: url('https://via.placeholder.com/1920x600.png?text=Car+Repair+Service');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 50px 20px;
            height: 350px;
            position: relative;
        }

        .banner h1 {
            font-size: 2.5em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .banner p {
            font-size: 1.2em;
            font-weight: 300;
            margin-top: 15px;
        }

        /* Services Section */
        .service-section {
            padding: 30px 0;
            text-align: center;
        }

        /* Service Item */
        .service-item {
            background-color: #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .service-item:hover {
            transform: scale(1.05);
        }

        .service-item .service-info {
            padding: 15px;
        }

        .service-item h4,
        .service-item p {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: center;
        }

        .service-item h4 {
            font-size: 1.6em;
            margin-bottom: 10px;
        }

        .service-item p {
            font-size: 1em;
            margin-bottom: 15px;
        }

        .service-item a {
            color: #f39c12;
            font-weight: bold;
            text-decoration: none;
            font-size: 1.1em;
        }

        .service-item a:hover {
            text-decoration: underline;
        }

        /* Contact Section */
        .contact-section {
            background-color: #333;
            padding: 40px 0;
            text-align: center;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 1em;
        }

        .contact-form button {
            background-color: #f39c12;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #e67e22;
        }

        footer {
            background-color: #111;
            color: #777;
            text-align: center;
            padding: 20px 0;
        }
    </style>
    <!-- Banner -->
    <section class="banner" style="background-image: url(https://akcarcare.vn/thumbs/1366x350x1/upload/photo/hinhsl-57830.png);">
        <div class="container" >
            <h1>Dịch Vụ Sửa Chữa Ô Tô Chuyên Nghiệp</h1>
            <p>Cải thiện hiệu suất xe của bạn với dịch vụ sửa chữa ô tô hàng đầu từ CarSev.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="service-section">
        <div class="container">
            <h2 class="text-white mb-5">Dịch Vụ Của Chúng Tôi</h2>
            <div class="row">
                <!-- Service 1 -->
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="service-info">
                            <h4>Sửa Chữa Động Cơ Động Lực Cao Cấp Với Đảm Bảo</h4>
                            <p>Đảm bảo động cơ của bạn luôn hoạt động mượt mà với các dịch vụ sửa chữa động cơ chuyên nghiệp. Chúng tôi luôn cung cấp các giải pháp hiệu quả và nhanh chóng.</p>
                            <a href="#">Tìm hiểu thêm</a>
                        </div>
                    </div>
                </div>
                <!-- Service 2 -->
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="service-info">
                            <h4>Sửa Chữa Hệ Thống Treo</h4>
                            <p>Chúng tôi cung cấp dịch vụ sửa chữa hệ thống treo giúp chiếc xe của bạn chạy êm ái hơn.</p>
                            <a href="#">Tìm hiểu thêm</a>
                        </div>
                    </div>
                </div>
                <!-- Service 3 -->
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="service-info">
                            <h4>Sửa Chữa Hệ Thống Phanh</h4>
                            <p>Chúng tôi sửa chữa và thay thế các bộ phận của hệ thống phanh để đảm bảo an toàn khi lái xe.</p>
                            <a href="#">Tìm hiểu thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection


