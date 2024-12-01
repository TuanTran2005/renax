@extends('layout.main')
@section('content')

    <!-- Banner Start -->
    <div class="container-fluid px-0 mb-4">
        <img src="img/banner.jpg" alt="CarServ Banner" class="banner-img">
    </div>
    <!-- Banner End -->

    <!-- Invoice Start -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center mb-4">Hóa Đơn Ô Tô</h2>

                <!-- User Information -->
                <div class="mb-4 d-flex align-items-center">
                    <img src="img/user-avatar.jpg" alt="User Avatar" class="rounded-circle me-3" width="80" height="80">
                    <div>
                        <h4>Thông Tin Người Dùng</h4>
                        <p><strong>Tên Người Dùng:</strong> John Doe</p>
                        <p><strong>Số Điện Thoại:</strong> +012 345 6789</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                        <p><strong>Địa Chỉ:</strong> 123 Phố, New York, Mỹ</p>
                    </div>
                </div>

                <!-- Invoice Table -->
                <h4 class="mb-3">Thông Tin Hóa Đơn</h4>
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
                        <!-- Example Item 1 -->
                        <tr>
                            <td>Xe Ô Tô A</td>
                            <td>2</td>
                            <td>500,000</td>
                            <td>1,000,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô A', 2, 500000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                        <!-- Example Item 2 -->
                        <tr>
                            <td>Xe Ô Tô B</td>
                            <td>1</td>
                            <td>700,000</td>
                            <td>700,000</td>
                            <td><button class="btn btn-primary" onclick="viewDetail('Xe Ô Tô B', 1, 700000)"><i class="fa fa-eye me-2"></i>Xem Chi Tiết Hóa Đơn</button></td>
                        </tr>
                    </tbody>
                </table>

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
    <!-- Footer Start -->
    @endsection