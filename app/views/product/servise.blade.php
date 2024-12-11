@extends("layout.home")
@section('content')
<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
        <i class="fas fa-file-invoice bg-white text-blue-300 p-2 rounded-full mr-2"></i> Quản lý Hóa Đơn Dịch Vụ
    </h2>

   
    <table class="w-full bg-white rounded shadow-lg overflow-hidden mb-8">
        <thead>
            <tr class="bg-blue-100 text-left">
                <th class="p-4 text-blue-800">ID</th>
                <th class="p-4 text-blue-800">Tên</th>
                <th class="p-4 text-blue-800">Ghi chú</th>
                <th class="p-4 text-blue-800">Trạng Thái</th>
                <th class="p-4 text-blue-800">ID Sản Phẩm</th>
                <th class="p-4 text-blue-800">ID Người Dùng</th>
                <th class="p-4 text-blue-800">Tên Dịch Vụ Xe</th>
                <th class="p-4 text-blue-800">Thời Gian</th>
                <th class="p-4 text-blue-800">Số Điện Thoại</th>
                <th class="p-4 text-blue-800">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($serviceInvoices as $invoice)
            <tr class="hover:bg-blue-50 transition">
                <td class="p-4">{{$invoice->service_id}}</td>
                <td class="p-4">{{$invoice->user_name}}</td>
                <td class="p-4">{{$invoice->detail}}</td>
                <td class="p-4">{{$invoice->service_status}}</td>
                <td class="p-4">{{$invoice->product_id}}</td>
                <td class="p-4">{{$invoice->user_id}}</td>
                <td class="p-4">{{$invoice->car_name}}</td>
                <td class="p-4">{{$invoice->time}}</td>
                <td class="p-4">{{$invoice->phone}}</td>
                <td class="p-4">
                    <button onclick="viewServiceInvoice('{{$invoice->service_id}}', '{{$invoice->service_name}}', '{{$invoice->detail}}', '{{$invoice->service_status}}', '{{$invoice->product_id}}', '{{$invoice->user_id}}', '{{$invoice->id_car_services}}', '{{$invoice->time}}', '{{$invoice->phone}}')" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Xem</button>
                    <button onclick="openEditServiceInvoiceModal({{$invoice->service_id}}, '{{$invoice->service_name}}', '{{$invoice->detail}}', '{{$invoice->service_status}}','{{$invoice->id_car_services }}', '{{$invoice->time}}', '{{$invoice->phone}}')" class="bg-yellow-200 px-4 py-2 rounded hover:bg-yellow-300 text-yellow-800 transition">Sửa</button>
                    <button onclick="openDeleteServiceInvoiceModal({{$invoice->service_id}})" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>


<div id="viewServiceInvoiceModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Thông tin Hóa Đơn Dịch Vụ</h2>
        <ul id="serviceInvoiceDetails" class="space-y-2">
            
        </ul>
        <div class="flex justify-end mt-6">
            <button onclick="closeModal('viewServiceInvoiceModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Đóng</button>
        </div>
    </div>
</div>


<div id="editServiceInvoiceModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg max-h-[80vh] overflow-auto">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Sửa Hóa Đơn Dịch Vụ</h2>
        <form action="{{route('update_service_invoice')}}" method="post">
            @csrf
            <div class="space-y-4">
                <input type="hidden" id="editServiceInvoiceId" name="id">
                <div>
                    <label for="editServiceInvoiceName" class="block">Tên:</label>
                    <input type="text" id="editServiceInvoiceName" name="name" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="editServiceInvoiceDetail" class="block">Ghi chú:</label>
                    <textarea id="editServiceInvoiceDetail" name="detail" class="w-full p-2 border border-gray-300 rounded" required></textarea>
                </div>
                <div>
                    <label for="editServiceInvoiceStatus"  class="block">Trạng Thái:</label>
                    <select name="status" id="editServiceInvoiceStatus" class="w-full p-2 border border-gray-300 rounded">
                        <option value="Thành công">Thành công</option>
                        <option value="Đang xử lý">Đang xử lý</option>
                    </select>
                </div>
                <div>
                    <label for="editServiceInvoiceCarServiceId" class="block">Tên Dịch Vụ Xe:</label>

                    <select name="id_car_services" id="editServiceInvoiceCarServiceId" class="w-full p-2 border border-gray-300 rounded" >
                        @foreach ( $dichvu as $index )
                        <option value="{{$index->id}}">{{$index->name}}</option> 
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="editServiceInvoiceTime" class="block">Thời Gian:</label>
                    <input type="text" id="editServiceInvoiceTime" name="time" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="editServiceInvoicePhone" class="block">Số Điện Thoại:</label>
                    <input type="text" id="editServiceInvoicePhone" name="phone" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal('editServiceInvoiceModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
                <button name="luu" type="submit" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Lưu</button>
            </div>
        </form>
    </div>
</div>


<div id="deleteServiceInvoiceModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Xóa Hóa Đơn Dịch Vụ</h2>
        <p>Bạn có chắc chắn muốn xóa hóa đơn này?</p>
        <form id="deleteServiceInvoiceForm" action="{{ route('delete_service_invoice') }}" method="POST">
            @csrf
            <input type="hidden" id="deleteServiceInvoiceId" name="invoice_id">
            <button type="submit" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
        </form>
        <button onclick="closeModal('deleteServiceInvoiceModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
    </div>
</div>

<script>
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function viewServiceInvoice(id, name, detail, status, product_id, user_id, car_service_id, time, phone) {
    
    document.getElementById('serviceInvoiceDetails').innerHTML = `
        <li><strong>ID:</strong> ${id}</li>
        <li><strong>Tên:</strong> ${name}</li>
        <li><strong>Chi Tiết:</strong> ${detail}</li>
        <li><strong>Trạng Thái:</strong> ${status}</li>
        <li><strong>ID Sản Phẩm:</strong> ${product_id}</li>
        <li><strong>ID Người Dùng:</strong> ${user_id}</li>
        <li><strong>ID Dịch Vụ Xe:</strong> ${car_service_id}</li>
        <li><strong>Thời Gian:</strong> ${time}</li>
        <li><strong>Số Điện Thoại:</strong> ${phone}</li>
    `;
    
   
    document.getElementById('viewServiceInvoiceModal').classList.remove('hidden');
}


    function openEditServiceInvoiceModal(id, name, detail, status, car_service_id, time, phone) {
        document.getElementById('editServiceInvoiceId').value = id;
        document.getElementById('editServiceInvoiceName').value = name;
        document.getElementById('editServiceInvoiceDetail').value = detail;
        document.getElementById('editServiceInvoiceStatus').value = status;
        document.getElementById('editServiceInvoiceCarServiceId').value = car_service_id;
        document.getElementById('editServiceInvoiceTime').value = time;
        document.getElementById('editServiceInvoicePhone').value = phone;
        document.getElementById('editServiceInvoiceModal').classList.remove('hidden');
    }

    function openDeleteServiceInvoiceModal(id) {
        document.getElementById('deleteServiceInvoiceId').value = id;
        document.getElementById('deleteServiceInvoiceModal').classList.remove('hidden');
    }
</script>
@endsection
