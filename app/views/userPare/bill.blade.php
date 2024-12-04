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
    }

    /* Tùy chỉnh bảng hóa đơn */
    .table {
        border-collapse: collapse; /* Gộp các ô lại với nhau */
        width: 100%; /* Chiều rộng 100% cho bảng */
    }

    .table th, .table td {
        padding: 12px; /* Khoảng cách trong các ô */
        text-align: center; /* Canh giữa văn bản trong các ô */
        vertical-align: middle; /* Căn giữa nội dung theo chiều dọc */
    }

    .table-bordered {
        border: 1px solid #ddd; /* Đường viền cho bảng */
    }

    .table th {
        background-color: #f8f9fa; /* Màu nền cho tiêu đề bảng */
        font-weight: bold;
    }

    /* Cải thiện hiển thị của thông tin người dùng */
    .user-info {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
    }

    .user-info img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .user-info h4 {
        margin-bottom: 15px;
    }

    .user-info p {
        margin: 5px 0;
    }

    .user-info button {
        margin-top: 15px;
    }

    /* Tạo khoảng cách cho nút đăng xuất */
    .user-info form {
        margin-top: 20px;
    }
</style>

<!-- Banner Start -->
<div class="container-fluid px-0 mb-4">
    <img src="https://vietabank.com.vn/uploads/files/khach-hang-ca-nhan/cho-vay/cho-vay-mua-xe-oto/banner-inner-m.jpg" alt="CarServ Banner" height="400px" class="banner-img w-100">
</div>
<!-- Banner End -->

<!-- Invoice Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
           

            <!-- User Information -->
            <div class="user-info">
                <div class="d-flex align-items-center">
                    <img src="{{$user->images}}" alt="User Avatar" class="rounded-circle me-3">
                    <div>
                        <h4>Thông Tin Người Dùng</h4>
                        <p><strong>Tên Người Dùng:</strong> {{$user->name}}</p>
                        <p><strong>Số Điện Thoại:</strong> {{$user->phone}}</p>
                        <p><strong>Email:</strong>{{$user->email}}</p>
                        <p><strong>Địa Chỉ:</strong> {{$user->addpress}}</p>
                        
                        <!-- Nút Đăng Xuất -->
                       
                            <a href="{{route('dangxuat')}}"><button type="submit" class="btn btn-danger mt-3"><i class="fa fa-sign-out-alt me-2"></i>Đăng Xuất</button></a>
                    
                    </div>
                </div>
            </div>

            <!-- Invoice Table -->
            <h4 class="mb-3">Thông Tin Hóa Đơn</h4>
            <div class="invoice-table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá (VND)</th>
                            <th>Tổng Giá (VND)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $bill as $router )
                        
                        
                        <tr>
                            <th>{{$router->name_product}}</th>
                            <th>{{$router->quantity}}</th>
                            <th>Đơn Giá (VND)</th>
                            <th>Tổng Giá (VND)</th>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô A', 2, 500000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Xe Ô Tô B</td>
                            <td>1</td>
                            <td>700,000</td>
                            <td>700,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô B', 1, 700000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <!-- Các sản phẩm khác -->
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>

                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <tr>
                            <td>Xe Ô Tô C</td>
                            <td>3</td>
                            <td>600,000</td>
                            <td>1,800,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô C', 3, 600000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Total Price -->
            <div class="mb-3">
                <label for="total_price" class="form-label"><i class="fa fa-calculator me-2"></i>Tổng Giá Hóa Đơn (VND)</label>
                <input type="text" class="form-control" id="total_price" value="1,700,000" disabled>
            </div>
        </div>
    </div>
</div>
<!-- Invoice End -->

<script>
    function viewDetail(productName, quantity, unitPrice) {
        let totalPrice = quantity * unitPrice;
        alert(`Chi tiết sản phẩm: ${productName}\nSố Lượng: ${quantity}\nĐơn Giá: ${unitPrice.toLocaleString()} VND\nTổng Giá: ${totalPrice.toLocaleString()} VND`);
    }
</script>

@endsection
