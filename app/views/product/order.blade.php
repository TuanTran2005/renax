@extends("layout.home")
@section('content')
<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
        <i class="fas fa-file-invoice bg-white text-blue-300 p-2 rounded-full mr-2"></i> Quản lý Hóa Đơn
    </h2>

    <!-- Order Table -->
    <table class="w-full bg-white rounded shadow-lg overflow-hidden mb-8">
        <thead>
            <tr class="bg-blue-100 text-left">
                <th class="p-4 text-blue-800">Mã Hóa Đơn</th>
                <th class="p-4 text-blue-800">Tên Người Dùng</th>
                <th class="p-4 text-blue-800">Số Lượng</th>
                <th class="p-4 text-blue-800">Đơn Giá (VND)</th>
                <th class="p-4 text-blue-800">Tổng Giá (VND)</th>
                <th class="p-4 text-blue-800">Ngày Đặt</th>
                <th class="p-4 text-blue-800">Ngày Nhận</th>
                <th class="p-4 text-blue-800">Phương Thức Thanh Toán</th>
                <th class="p-4 text-blue-800">Trạng Thái</th>
                <th class="p-4 text-blue-800">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $order as $index )
            <tr class="hover:bg-blue-50 transition">
                <td class="p-4">{{$index->id}}</td>
                <td class="p-4">{{$index->name_user}}</td>
                <td class="p-4">{{$index->quantity}}</td>
                <td class="p-4">{{$index->unit_price}}</td>
                <td class="p-4">{{$index->total_price}}</td>
                <td class="p-4">{{$index->order_date}}</td>
                <td class="p-4">{{$index->pickup_date}}</td>
                <td class="p-4">{{$index->payment_method}}</td>
                <td class="p-4 text-green-700">{{$index->status}}</td>
                <td class="p-4">
                    <button onclick="viewOrderDetails({{$index->id}}, '{{$index->name_user}}', '{{$index->phone}}', '{{$index->address}}', '{{$index->quantity}}', '{{$index->unit_price}}', '{{$index->total_price}}', '{{$index->order_date}}', '{{$index->pickup_date}}', '{{$index->payment_method}}', '{{$index->status}}')" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Xem</button>
                    <button onclick="openEditOrderModal(`{{$index->id}}`, `{{$index->name_user}}`, `{{$index->unit_price}}`, `{{$index->quantity}}`)" class="bg-yellow-200 px-4 py-2 rounded hover:bg-yellow-300 text-yellow-800 transition">Sửa</button>
                    <button onclick="openDeleteOrderModal({{$index->id}}, '{{$index->name_user}}')" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

<!-- View Order Modal -->
<div id="viewOrderModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Thông tin Hóa Đơn</h2>
        <ul id="orderDetails" class="space-y-2">
            <!-- Details will be populated dynamically -->
        </ul>
        <div class="flex justify-end mt-6">
            <button onclick="closeModal('viewOrderModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Đóng</button>
        </div>
    </div>
</div>

<!-- Delete Order Modal -->
<div id="deleteOrderModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Xóa Hóa Đơn</h2>
        <p>Bạn có chắc chắn muốn xóa hóa đơn của <strong id="deleteOrderName">Nguyễn Văn A</strong> không?</p>
        <div class="flex justify-end mt-6 space-x-4">
            <button onclick="closeModal('deleteOrderModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
            <button onclick="deleteOrder()" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
        </div>
    </div>
</div>

<!-- Edit Order Modal -->
<div id="editOrderModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Sửa Thông Tin Hóa Đơn</h2>
        <form>
            <div class="space-y-4">
                <div>
                    <label for="editNameUser" class="block">Tên Người Dùng:</label>
                    <input type="text" id="editNameUser" name="editNameUser" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="editPhone" class="block">Số Điện Thoại:</label>
                    <input type="text" id="editPhone" name="editPhone" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="editAddress" class="block">Địa Chỉ:</label>
                    <input type="text" id="editAddress" name="editAddress" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="editPaymentMethod" class="block">Phương Thức Thanh Toán:</label>
                    <select id="editPaymentMethod" name="editPaymentMethod" class="w-full p-2 border border-gray-300 rounded">
                        <option value="cash">Thanh toán khi nhận</option>
                        <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                    </select>
                </div>
                <div>
                    <label for="editStatus" class="block">Trạng Thái:</label>
                    <select id="editStatus" name="editStatus" class="w-full p-2 border border-gray-300 rounded">
                        <option value="1">Đã thanh toán</option>
                        <option value="0">Chưa thanh toán</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal('editOrderModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
                <button type="submit" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Lưu</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Close Modal Function
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
    }

    // View Order Details (display dynamically)
    function viewOrderDetails(id, name, phone, address, quantity, unitPrice, totalPrice, orderDate, pickupDate, paymentMethod, status) {
        document.getElementById('orderDetails').innerHTML = `
            <li><strong>Mã Hóa Đơn:</strong> ${id}</li>
            <li><strong>Tên Người Dùng:</strong> ${name}</li>
            <li><strong>Số Điện Thoại:</strong> ${phone}</li>
            <li><strong>Địa Chỉ:</strong> ${address}</li>
              <li><strong>Số Lượng:</strong> ${quantity}</li>
            <li><strong>Đơn Giá (VND):</strong> ${unitPrice}</li>
            <li><strong>Tổng Giá (VND):</strong> ${totalPrice}</li>
            <li><strong>Ngày Đặt:</strong> ${orderDate}</li>
            <li><strong>Ngày Nhận:</strong> ${pickupDate}</li>
            <li><strong>Phương Thức Thanh Toán:</strong> ${paymentMethod}</li>
            <li><strong>Trạng Thái:</strong> ${status === '1' ? 'Đã thanh toán' : 'Chưa thanh toán'}</li>
        `;
        // Hiển thị modal
        document.getElementById('viewOrderModal').classList.remove('hidden');
    }

    // Delete Order (delete order logic)
    function deleteOrder() {
        // Logic to delete the order (you can call an API or trigger a form submission)
        alert("Đã xóa hóa đơn.");
        closeModal('deleteOrderModal');  // Close the modal after deletion
    }

    // Open Edit Order Modal (populate modal with order data)
    function openEditOrderModal(id, name, unitPrice, quantity) {
        // Populate edit form fields with the current order data
        document.getElementById('editNameUser').value = name;
        document.getElementById('editQuantity').value = quantity;
        document.getElementById('editUnitPrice').value = unitPrice;
        // Show the modal
        document.getElementById('editOrderModal').classList.remove('hidden');
    }

    // Open Delete Order Modal (populate modal with order name for confirmation)
    function openDeleteOrderModal(id, name) {
        document.getElementById('deleteOrderName').innerText = name;
        // Show the modal
        document.getElementById('deleteOrderModal').classList.remove('hidden');
    }
</script>

@endsection
