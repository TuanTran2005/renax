@extends('layout.main')
@section('content')

<!-- Payment Start -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center mb-4">Thông Tin Thanh Toán Ô Tô</h2>
            <form action="{{route('paypost')}}?idpr={{$_GET['id']}}" method="POST">
                @csrf
                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="phone" class="form-label"><i class="fa fa-phone-alt me-2"></i>Số Điện Thoại</label>
                    <input type="text" class="form-control" name="sdt" value="{{$products->phone}}" id="phone" placeholder="Nhập số điện thoại" required>
                </div>

                <!-- Pickup Date -->
                <div class="mb-3">
                    <label for="pickup_date" class="form-label"><i class="fa fa-calendar-check me-2"></i>Ngày Lấy Hàng</label>
                    <input type="date" class="form-control" name="date" id="pickup_date" required>
                </div>

                <!-- Payment Method -->
                <div class="mb-3">
                    <label for="payment_method" class="form-label"><i class="fa fa-credit-card me-2"></i>Phương Thức Thanh Toán</label>
                    <select class="form-control" id="payment_method" name="thanhtoan"required>
                        <option value="cash">Tiền Mặt</option>
                        <option value="card">Thẻ Ngân Hàng</option>
                    </select>
                </div>

                <!-- Notes -->
                <div class="mb-3">
                    <label for="notes" class="form-label"><i class="fa fa-sticky-note me-2"></i>Ghi Chú</label>
                    <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Nhập ghi chú nếu có"></textarea>
                </div>

                <!-- Pickup Address -->
                <div class="mb-3">
                    <label for="pickup_address" class="form-label"><i class="fa fa-map-marker-alt me-2"></i>Địa Chỉ Lấy Xe</label>
                    <select class="form-control" name="address" id="pickup_address" required>
                        <option value="">Chọn Địa Chỉ Lấy Xe</option>
                        <option value="address1">Cửa Hàng A - Địa Chỉ 1</option>
                        <option value="address2">Cửa Hàng B - Địa Chỉ 2</option>
                        <option value="address3">Cửa Hàng C - Địa Chỉ 3</option>
                    </select>
                </div>

                <!-- Customer Name -->
                <div class="mb-3">
                    <label for="customer_name" class="form-label"><i class="fa fa-user me-2"></i>Tên Người Dùng</label>
                    <input type="text" class="form-control" name="tenuser" value="{{$products->name}}" id="customer_name" placeholder="Nhập tên người dùng" required>
                </div>
                 
                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label"><i class="fa fa-cogs me-2"></i>Số Lượng</label>
                    <input type="number" class="form-control" name="soluong" value="{{$_GET['sl']}}" id="quantity" placeholder="Nhập số lượng" required>
                </div>

                <!-- Unit Price -->
                <div class="mb-3">
                    <label for="unit_price" class="form-label"><i class="fa fa-dollar-sign me-2"></i>Đơn Vị Giá (VND)</label>
                    <input type="number" class="form-control" name="gia" value="{{$buy->price}}" id="unit_price" placeholder="Nhập đơn vị giá" required readonly> <!-- Chỉ đọc -->
                </div>

                <!-- Total Price -->
                <div class="mb-3">
                    <label for="total_price" class="form-label"><i class="fa fa-calculator me-2"></i>Tổng Giá (VND)</label>
                    <input type="number" class="form-control" id="total_price" name="tong" placeholder="Tính tổng giá" disabled>
                </div>

                <!-- Color Selection -->
                <div class="mb-3">
                    <label for="color" class="form-label"><i class="fa fa-paint-brush me-2"></i>Màu Sắc</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ $_GET['color'] ?? '' }}" required readonly>
                </div>

                <button type="submit" name="buy" class="btn btn-primary"><i class="fa fa-check-circle me-2"></i>Đặt Hàng</button>
            </form>
        </div>
    </div>
</div>
<!-- Payment End -->

<script>
// Tính tổng giá khi người dùng thay đổi số lượng hoặc đơn giá
function updateTotalPrice() {
    const quantity = parseFloat(document.getElementById('quantity').value);
    const unitPrice = parseFloat(document.getElementById('unit_price').value);

    // Kiểm tra nếu giá trị số lượng hoặc đơn giá không phải là NaN
    if (!isNaN(quantity) && !isNaN(unitPrice)) {
        const totalPrice = quantity * unitPrice;
        document.getElementById('total_price').value = totalPrice;
    }
}

document.getElementById('quantity').addEventListener('input', updateTotalPrice);
document.getElementById('unit_price').addEventListener('input', updateTotalPrice);

updateTotalPrice();
</script>
@endsection
