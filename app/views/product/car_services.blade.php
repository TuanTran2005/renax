@extends('layout.home')
@section('content')
<style>
    .truncate {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .max-w-xs {
        max-width: 150px; 
    }
   
    .modal-content form {
        overflow: auto; 
        max-height: 500px; 
        padding-right: 10px; 
    }

    
    textarea, input {
        overflow: auto;
    }
</style>

<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
        <i class="fas fa-cogs bg-white text-blue-300 p-2 rounded-full mr-2"></i> Quản lý Dịch Vụ
    </h2>

    <button onclick="openModal('addServiceModal')" class="bg-green-200 px-4 py-2 rounded hover:bg-green-300 text-green-800 transition mb-4">
        Thêm Dịch Vụ
    </button>


    <table class="w-full bg-white rounded shadow-lg overflow-hidden mb-8">
        <thead>
            <tr class="bg-blue-100 text-left">
                <th class="p-4 text-blue-800">ID</th>
                <th class="p-4 text-blue-800">Tên Dịch Vụ</th>
                <th class="p-4 text-blue-800">Mô Tả</th>
                <th class="p-4 text-blue-800">Giá</th>
                <th class="p-4 text-blue-800">Trạng Thái</th>
                <th class="p-4 text-blue-800">Ảnh</th>
                <th class="p-4 text-blue-800">Ngày Tạo</th>
                <th class="p-4 text-blue-800">Ngày Cập Nhật</th>
                <th class="p-4 text-blue-800">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr class="hover:bg-blue-50 transition">
                <td class="p-4">{{$service->id}}</td>
                <td class="p-4">{{$service->name}}</td>
                <td class="p-4 truncate max-w-xs">{{$service->description}}</td>
                <td class="p-4">{{number_format($service->price, 2)}} VND</td>
                <td class="p-4">{{$service->status}}</td>
                <td class="p-4"><img src="{{$service->image}}" alt="Service Image" class="w-16 h-16 object-cover"></td>
                <td class="p-4">{{$service->created_at}}</td>
                <td class="p-4">{{$service->updated_at}}</td>
                <td class="p-4">
                    <button onclick="openViewModal('{{$service->name}}', '{{$service->description}}', '{{$service->price}}', '{{$service->status}}', '{{$service->image}}', '{{$service->created_at}}', '{{$service->updated_at}}')" class="bg-yellow-200 px-4 py-2 rounded hover:bg-yellow-300 text-yellow-800 transition">Xem</button>
                    <button onclick="openEditModal('{{$service->id}}', '{{$service->name}}', '{{$service->description}}', '{{$service->price}}', '{{$service->status}}', '{{$service->image}}', '{{$service->created_at}}', '{{$service->updated_at}}', '{{$service->id_services}}')" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Sửa</button>
                 
                        <a href="{{route('delete_service')}}?id={{$service->id}}">
                        <button type="submit" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
                  </a>  
               
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>


<div id="addServiceModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Thêm Dịch Vụ</h2>
        <form action="{{route('add_service')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="addServiceName" class="block text-sm font-semibold text-gray-700">Tên Dịch Vụ</label>
                <input type="text" name="name" id="addServiceName" class="w-full px-4 py-2 rounded border border-gray-300" required>
            </div>
            <div class="mb-4">
                <label for="addServiceDescription" class="block text-sm font-semibold text-gray-700">Mô Tả</label>
                <textarea name="description" id="addServiceDescription" class="w-full px-4 py-2 rounded border border-gray-300" required></textarea>
            </div>
            <div class="mb-4">
                <label for="addServicePrice" class="block text-sm font-semibold text-gray-700">Giá</label>
                <input type="number" name="price" id="addServicePrice" class="w-full px-4 py-2 rounded border border-gray-300" required>
            </div>
            <div class="mb-4">
                <label for="addServiceStatus" class="block text-sm font-semibold text-gray-700">Trạng Thái</label>
                <input type="text" name="status" id="addServiceStatus" class="w-full px-4 py-2 rounded border border-gray-300" required>
            </div>
            <div class="mb-4">
                <label for="addServiceImage" class="block text-sm font-semibold text-gray-700">Ảnh</label>
                <input type="file" name="image" id="addServiceImage" class="w-full px-4 py-2 rounded border border-gray-300" required>
            </div>
            <div class="flex justify-end space-x-4">
                <button onclick="closeModal('addServiceModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
                <button type="submit" class="bg-green-200 px-4 py-2 rounded hover:bg-green-300 text-green-800 transition">Lưu</button>
            </div>
        </form>
    </div>
</div>

<div id="viewServiceModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Chi Tiết Dịch Vụ</h2>
        <div id="viewServiceDetails">
            <p id="viewServiceName" class="mb-2 text-gray-700 font-semibold"></p>
            <p id="viewServiceDescription" class="mb-2 text-gray-700 font-semibold"></p>
            <p id="viewServicePrice" class="mb-2 text-gray-700 font-semibold"></p>
            <p id="viewServiceStatus" class="mb-2 text-gray-700 font-semibold"></p>
            <p id="viewServiceCreated" class="mb-2 text-gray-700 font-semibold"></p>
            <p id="viewServiceUpdated" class="mb-2 text-gray-700 font-semibold"></p>
            <p id="viewServiceRelated" class="mb-2 text-gray-700 font-semibold"></p>
            <img id="images" src="" alt="Service Image" class="w-32 h-32 object-cover mt-4">
        </div>
        <div class="flex justify-end space-x-4 mt-6">
            <button onclick="closeModal('viewServiceModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Đóng</button>
        </div>
    </div>
</div>


<div id="editServiceModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Chỉnh Sửa Dịch Vụ</h2>
        <form action="{{route('updateService')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="editServiceName" class="block text-sm font-semibold text-gray-700">Tên Dịch Vụ</label>
                <input type="text" name="name" id="editServiceName" class="w-full px-4 py-2 rounded border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="editServiceDescription" class="block text-sm font-semibold text-gray-700">Mô Tả</label>
                <textarea name="description" id="editServiceDescription" class="w-full px-4 py-2 rounded border border-gray-300"></textarea>
            </div>
            <div class="mb-4">
                <label for="editServicePrice" class="block text-sm font-semibold text-gray-700">Giá</label>
                <input type="number" name="price" id="editServicePrice" class="w-full px-4 py-2 rounded border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="editServiceStatus" class="block text-sm font-semibold text-gray-700">Trạng Thái</label>
                <input type="text" name="status" id="editServiceStatus" class="w-full px-4 py-2 rounded border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="editServiceImage" class="block text-sm font-semibold text-gray-700">Ảnh</label>
                <input type="file" name="image" id="editServiceImage" class="w-full px-4 py-2 rounded border border-gray-300">
            </div>
            <img src="" style="width: 100px ;" id="images" alt="">
            <input type="hidden" name="images" id="images">
            <input type="hidden" name="id" id="editServiceId">
            <div class="flex justify-end space-x-4">
                <button onclick="closeModal('editServiceModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
                <button type="submit" name="luu" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Lưu</button>
            </div>
        </form>
    </div>
</div>


<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove("hidden");
    }
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }
    function openViewModal(name, description, price, status, image, created_at, updated_at) {
        document.getElementById('viewServiceName').innerText = `Tên Dịch Vụ: ${name}`;
        document.getElementById('viewServiceDescription').innerText = `Mô Tả: ${description}`;
        document.getElementById('viewServicePrice').innerText = `Giá: ${price}`;
        document.getElementById('viewServiceStatus').innerText = `Trạng Thái: ${status}`;
        document.getElementById('viewServiceCreated').innerText = `Ngày Tạo: ${created_at}`;
        document.getElementById('viewServiceUpdated').innerText = `Ngày Cập Nhật: ${updated_at}`;
        document.getElementById('viewServiceRelated').innerText = `Dịch Vụ Liên Quan: ${image}`;
        document.getElementById('images').src=image;
        console.log(image);
        
        openModal('viewServiceModal');
    }
    function openEditModal(id, name, description, price, status, image, created_at, updated_at, id_services) {
        document.getElementById('editServiceId').value = id;
        document.getElementById('editServiceName').value = name;
        document.getElementById('editServiceDescription').value = description;
        document.getElementById('editServicePrice').value = price;
        document.getElementById('editServiceStatus').value = status;
        document.getElementById('images').src=image;
        document.getElementById('images').value=image;
        console.log(image);
        
        openModal('editServiceModal');
    }
</script>
@endsection
