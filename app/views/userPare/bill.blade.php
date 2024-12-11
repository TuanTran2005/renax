@extends('layout.main')

@section('content')

<style>
  
    .container {
        max-width: 90%; 
    }


    .invoice-table-container {
        max-height: 400px; 
        overflow-y: auto;  
        border: 1px solid #ddd; 
        padding: 10px; 
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
    }

 
    .table {
        border-collapse: collapse; 
        width: 100%; 
    }

    .table th, .table td {
        padding: 15px; 
        text-align: center; 
        vertical-align: middle; 
    }

    .table-bordered {
        border: 1px solid #ddd; 
    }

    .table th {
        background-color: #f8f9fa; 
        font-weight: bold;
        color: #495057; 
    }

  
    .user-info {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        background-color: #ffffff; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
        display: flex;
        flex-direction: column; 
        justify-content: flex-start; 
    }

    .user-info img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover; 
        margin-bottom: 15px; 
    }

    .user-info h4 {
        margin-bottom: 15px;
        font-size: 1.2em;
        color: #007bff; 
    }

    .user-info p {
        margin: 5px 0;
        font-size: 1em;
    }

    .user-info button {
        margin-top: 15px;
        font-size: 1em;
    }

    
    .user-info-container {
        display: flex;
        justify-content: space-between; 
        gap: 50px; 
    }

    .user-info-column {
        flex: 1; 
    }

    .invoice-column {
        flex: 2; 
    }

   
    .user-info {
        max-width: 100%;
    }

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
        background-color: #007bff; 
        border: none;
        transition: background-color 0.3s ease;
        padding: 12px 25px; 
        font-size: 1.1em; 
        border-radius: 50px; 
        display: inline-flex; 
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }

    .btn-primary:hover {
        background-color: #0056b3; 
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); 
    }

    .btn-primary i {
        margin-right: 10px; 
    }

   
    .table td:hover, .table th:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

   
    .user-info-avatar {
        margin-top: auto;
        text-align: center; 
    }

   
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
        display: none; 
    }

    .btn-toggle-history {
        margin-top: 20px;
    }
</style>


<div class="container-fluid px-0 mb-4">
    <img src="https://vietabank.com.vn/uploads/files/khach-hang-ca-nhan/cho-vay/cho-vay-mua-xe-oto/banner-inner-m.jpg" alt="CarServ Banner" height="400px" class="banner-img w-100">
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            
            <div class="user-info-container">
               
                <div class="user-info-column">
                    <div class="user-info">
                       
                        <div class="user-info-avatar">
                            <img src="{{$user->images}}" alt="User Avatar" class="rounded-circle mb-3">
                        </div>
                       
                        <h4>Thông Tin Người Dùng</h4>
                        <p><strong>Tên Người Dùng:</strong> {{$user->name}}</p>
                        <p><strong>Số Điện Thoại:</strong> {{$user->phone}}</p>
                        <p><strong>Email:</strong>{{$user->email}}</p>
                        <p><strong>Địa Chỉ:</strong> {{$user->addpress}}</p>
                    </div>

                    
                    <div class="user-info-avatar">
                        <a href="{{route('dangxuat')}}"><button type="submit" class="btn btn-danger"><i class="fa fa-sign-out-alt me-2"></i>Đăng Xuất</button></a>
                    </div>

                    
                    <button class="btn btn-primary btn-toggle-history" id="toggleHistoryBtn">
                        <i class="fa fa-history"></i> Xem Lịch Sử Dịch Vụ
                    </button>
                </div>

                
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
                    <th>Hành Động</th> 
                </tr>
            </thead>
            <tbody>
            @foreach ($bill as $router)
                <tr>
                    <td>{{ $router->name_product }}</td>
                    <td>{{ $router->order_quantity }}</td>
                    <td>{{ $router->unit_price }}VND</td>
                    <td>{{ $router->total_price }}VND</td>
                    <td><span class="status ">{{ $router->billct_status }}</span></td>
                    <td>
                        @if ($router->billct_status !='Thành công')
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

<script>
    
  
    document.getElementById('toggleHistoryBtn').addEventListener('click', function() {
        var historySection = document.querySelector('.service-history');
        historySection.style.display = (historySection.style.display === 'none' || historySection.style.display === '') ? 'block' : 'none';
    });
</script>

@endsection
