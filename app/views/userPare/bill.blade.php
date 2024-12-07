@extends('layout.main')

@section('content')

<style>
    /* Điều chỉnh không gian hai bên để giảm khoảng trống */
    .container {
        max-width: 90%; /* Giảm bớt khoảng cách hai bên */
    }

    /* Thêm phần cuộn cho bảng hóa đơn */
    .invoice-table-container {
        max-height: 400px; /* Chiều cao tối đa */
        overflow-y: auto;  /* Cho phép cuộn dọc khi nội dung vượt quá chiều cao */
        border: 1px solid #ddd; /* Đường viền nhẹ cho bảng */
        padding: 10px; /* Khoảng cách giữa bảng và viền */
        border-radius: 8px; /* Bo góc cho bảng */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Thêm bóng mờ cho bảng */
    }

    /* Tùy chỉnh bảng hóa đơn */
    .table {
        border-collapse: collapse; /* Gộp các ô lại với nhau */
        width: 100%; /* Chiều rộng 100% cho bảng */
    }

    .table th, .table td {
        padding: 15px; /* Khoảng cách trong các ô */
        text-align: center; /* Canh giữa văn bản trong các ô */
        vertical-align: middle; /* Căn giữa nội dung theo chiều dọc */
    }

    .table-bordered {
        border: 1px solid #ddd; /* Đường viền cho bảng */
    }

    .table th {
        background-color: #f8f9fa; /* Màu nền cho tiêu đề bảng */
        font-weight: bold;
        color: #495057; /* Màu chữ tối cho tiêu đề */
    }

    /* Cải thiện hiển thị của thông tin người dùng */
    .user-info {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        background-color: #ffffff; /* Nền trắng cho khung thông tin người dùng */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Thêm bóng mờ cho khung */
        display: flex;
        flex-direction: column; /* Đảm bảo thông tin được xếp theo cột */
        justify-content: flex-start; /* Đảm bảo thông tin bắt đầu từ trên cùng */
    }

    .user-info img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover; /* Đảm bảo ảnh avatar không bị méo */
        margin-bottom: 15px; /* Khoảng cách giữa ảnh và các thông tin người dùng */
    }

    .user-info h4 {
        margin-bottom: 15px;
        font-size: 1.2em;
        color: #007bff; /* Màu chữ tiêu đề */
    }

    .user-info p {
        margin: 5px 0;
        font-size: 1em;
    }

    .user-info button {
        margin-top: 15px;
        font-size: 1em;
    }

    /* Sử dụng flexbox để chia layout */
    .user-info-container {
        display: flex;
        justify-content: space-between; /* Tạo khoảng cách đều giữa thông tin người dùng và thông tin đơn hàng */
        gap: 50px; /* Khoảng cách giữa các phần */
    }

    .user-info-column {
        flex: 1; /* Chiếm phần không gian còn lại */
    }

    .invoice-column {
        flex: 2; /* Chiếm phần không gian lớn hơn */
    }

    /* Điều chỉnh cho phần thông tin người dùng */
    .user-info {
        max-width: 100%;
    }

    /* Cải thiện khoảng cách của input Tổng Giá */
    .total-price-input {
        padding: 10px;
        font-size: 1.2em;
        text-align: center;
        background-color: #f1f3f5;
        border: none;
        border-radius: 8px;
        width: 100%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .btn-primary {
        background-color: #007bff; /* Màu sắc đẹp mắt cho nút */
        border: none;
        transition: background-color 0.3s ease;
        padding: 12px 25px; /* Tăng kích thước nút */
        font-size: 1.1em; /* Tăng kích thước font chữ */
        border-radius: 50px; /* Bo góc nút thành hình tròn */
        display: inline-flex; /* Giữ nút gọn gàng */
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Thêm bóng mờ cho nút */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Đổi màu khi hover */
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* Thêm hiệu ứng shadow khi hover */
    }

    .btn-primary i {
        margin-right: 10px; /* Khoảng cách giữa icon và văn bản */
    }

    /* Thêm hiệu ứng hover cho bảng */
    .table td:hover, .table th:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    /* Đưa phần ảnh và nút đăng xuất xuống cuối */
    .user-info-avatar {
        margin-top: auto;
        text-align: center; /* Căn giữa ảnh và nút */
    }

    /* Màu sắc trạng thái */
    .status {
       color: green;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .status.pending {
        background-color: #ffc107;
        color: #fff;
    }

    .status.in-progress {
        background-color: #17a2b8;
        color: #fff;
    }

    .status.completed {
        background-color: #28a745;
        color: #fff;
    }

    .status.canceled {
        background-color: #dc3545;
        color: #fff;
    }

    .service-history {
        margin-top: 50px;
        display: none; /* Ẩn lịch sử dịch vụ mặc định */
    }

    .btn-toggle-history {
        margin-top: 20px;
    }
</style>

<!-- Banner Start -->
<div class="container-fluid px-0 mb-4">
    <img src="https://vietabank.com.vn/uploads/files/khach-hang-ca-nhan/cho-vay/cho-vay-mua-xe-oto/banner-inner-m.jpg" alt="CarServ Banner" height="400px" class="banner-img w-100">
</div>
<!-- Banner End -->

<!-- User Profile Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <!-- User Information and Invoice in 2 columns -->
            <div class="user-info-container">
                <!-- User Information Column -->
                <div class="user-info-column">
                    <div class="user-info">
                        <!-- Avatar Section (on top) -->
                        <div class="user-info-avatar">
                            <img src="{{$user->images}}" alt="User Avatar" class="rounded-circle mb-3">
                        </div>
                        <!-- User Info -->
                        <h4>Thông Tin Người Dùng</h4>
                        <p><strong>Tên Người Dùng:</strong> {{$user->name}}</p>
                        <p><strong>Số Điện Thoại:</strong> {{$user->phone}}</p>
                        <p><strong>Email:</strong>{{$user->email}}</p>
                        <p><strong>Địa Chỉ:</strong> {{$user->addpress}}</p>
                    </div>

                    <!-- Nút Đăng Xuất -->
                    <div class="user-info-avatar">
                        <a href="{{route('dangxuat')}}"><button type="submit" class="btn btn-danger"><i class="fa fa-sign-out-alt me-2"></i>Đăng Xuất</button></a>
                    </div>

                    <!-- Nút Xem Lịch Sử Dịch Vụ -->
                    <button class="btn btn-primary btn-toggle-history" id="toggleHistoryBtn">
                        <i class="fa fa-history"></i> Xem Lịch Sử Dịch Vụ
                    </button>
                </div>

                <!-- Invoice Table Column -->
                <div class="invoice-column">
    <h4 class="mb-3">Thông Tin Hóa Đơn</h4>
    <div class="invoice-table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá (VND)</th>
                    <th>Tổng Giá (VND)</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th> <!-- Cột Hành động -->
                </tr>
            </thead>
            <tbody>
            @foreach ($bill as $router)
                <tr>
                    <td>{{ $router->name_product }}</td>
                    <td>{{ $router->quantity }}</td>
                    <td>{{ $router->unit_price }}$</td>
                    <td>{{ $router->total_price }}$</td>
                    <td><span class="status ">{{ $router->status }}</span></td>
                    <td>
                        @if ($router->status !='Thành công')
                         <a href="{{route('hoanthanh')}}?id={{$router->order_details_id}}"><button class="btn btn-danger complete-btn" >Hoàn Thành</button> </a> 
                         @else
                     
    <button class="btn btn-secondary complete-btn">Đã Hoàn Thành</button>
                        @endif
                      
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

            </div>

            <!-- Lịch sử Dịch vụ -->

            <div class="service-history">
                <h4>Lịch Sử Dịch Vụ</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên Dịch Vụ</th>
                                <th>Ngày Sử Dụng</th>
                                <th>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->car_name }}</td>
                                    <td>{{$service->time}}</td>
                                    <td>
                                        <span class="status ">{{ $service->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- User Profile End -->

<script>
    
    // Toggle service history visibility
    document.getElementById('toggleHistoryBtn').addEventListener('click', function() {
        var historySection = document.querySelector('.service-history');
        historySection.style.display = (historySection.style.display === 'none' || historySection.style.display === '') ? 'block' : 'none';
    });
</script>

@endsection
