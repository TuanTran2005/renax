@extends('layout.home')
@section('content')


<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-yellow-400">
      <i class="fas fa-box mr-2"></i> Quản lý sản phẩm
    </h2>

    <!-- Search and Filter -->
    <div class="flex justify-between items-center mb-6">
      <div>
        <input type="text" placeholder="Tìm kiếm sản phẩm..." 
          class="bg-gray-700 text-white p-2 rounded shadow focus:outline-none focus:ring focus:ring-blue-500">
      </div>
      <div>
        <select class="bg-gray-700 text-white p-2 rounded shadow">
          <option value="all">Tất cả trạng thái</option>
          <option value="available">Còn hàng</option>
          <option value="outofstock">Hết hàng</option>
        </select>
      </div>
      <div>
        <button onclick="openModal('addProductModal')" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
          <i class="fas fa-plus-circle mr-2"></i> Thêm mới sản phẩm
        </button>
      </div>
    </div>

    <!-- Product Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      <div class="product-card">
        <img src="https://via.placeholder.com/300" alt="Toyota Camry" class="w-full h-48 object-cover rounded mb-4">
        <h3 class="text-xl font-bold text-yellow-400">Toyota Camry</h3>
        <p class="text-gray-400">Màu: Đỏ</p>
        <p class="text-gray-400">Năm sản xuất: 2022</p>
        <p class="text-gray-400">Hãng xe: Toyota</p>
        <p class="text-gray-400">Số ghế: 5</p>
        <p class="text-gray-400">Nhiên liệu: Xăng</p>
        <p class="text-gray-400">Tiêu thụ: 8L/100km</p>
        <p class="text-green-400">Còn hàng</p>
        <div class="flex space-x-2">
          <button onclick="openModal('editProductModal')" class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-700 transition">Sửa</button>
          <button onclick="openModal('deleteProductModal')" class="bg-red-600 px-4 py-2 rounded text-white hover:bg-red-700 transition">Xóa</button>
        </div>
      </div>
      <!-- Add more product cards as needed -->
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
      <span>Hiển thị 1-10 của 50 kết quả</span>
      <div class="flex space-x-2">
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">&lt;</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">1</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">2</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">3</button>
        <button class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 transition">&gt;</button>
      </div>
    </div>
  </main>

<!-- Add Product Modal -->
<div id="addProductModal" class="modal flex">
  <div class="modal-content">
    <h2 class="text-2xl font-bold text-green-400 mb-4">Thêm Sản phẩm</h2>
    <form action="#" method="POST" class="space-y-6">
      <!-- Product Name -->
      <div class="flex flex-col space-y-2">
        <label for="product_name" class="text-yellow-300">Tên sản phẩm</label>
        <input type="text" id="product_name" name="product_name" class="bg-gray-700 text-white p-2 rounded shadow w-full" required>
      </div>
      <!-- Product Image -->
      <div class="flex flex-col space-y-2">
        <label for="product_image" class="text-yellow-300">Ảnh sản phẩm</label>
        <input type="file" id="product_image" name="product_image" class="bg-gray-700 text-white p-2 rounded shadow w-full" accept="image/*" required>
      </div>
      <!-- Product Color -->
      <div class="flex flex-col space-y-2">
        <label for="product_color" class="text-yellow-300">Màu sắc</label>
        <input type="text" id="product_color" name="product_color" class="bg-gray-700 text-white p-2 rounded shadow w-full" required>
      </div>
      <!-- Year of Manufacture -->
      <div class="flex flex-col space-y-2">
        <label for="product_year" class="text-yellow-300">Năm sản xuất</label>
        <input type="number" id="product_year" name="product_year" class="bg-gray-700 text-white p-2 rounded shadow w-full" required>
      </div>
      <!-- Car Manufacturer -->
      <div class="flex flex-col space-y-2">
        <label for="product_manufacturer" class="text-yellow-300">Hãng xe</label>
        <input type="text" id="product_manufacturer" name="product_manufacturer" class="bg-gray-700 text-white p-2 rounded shadow w-full" required>
      </div>
      <!-- Seat Count -->
      <div class="flex flex-col space-y-2">
        <label for="product_seat_count" class="text-yellow-300">Số ghế</label>
        <input type="number" id="product_seat_count" name="product_seat_count" class="bg-gray-700 text-white p-2 rounded shadow w-full" required>
      </div>
      <!-- Fuel Type -->
      <div class="flex flex-col space-y-2">
        <label for="product_fuel" class="text-yellow-300">Nhiên liệu</label>
        <input type="text" id="product_fuel" name="product_fuel" class="bg-gray-700 text-white p-2 rounded shadow w-full" required>
      </div>
      <!-- Fuel Consumption -->
      <div class="flex flex-col space-y-2">
        <label for="product_consumption" class="text-yellow-300">Tiêu thụ</label>
        <input type="text" id="product_consumption" name="product_consumption" class="bg-gray-700 text-white p-2 rounded shadow w-full" required>
      </div>
      <!-- Additional Fields -->
      <div class="flex justify-between">
        <button type="button" onclick="closeModal('addProductModal')" class="bg-gray-600 px-4 py-2 rounded hover:bg-gray-500">Đóng</button>
        <button type="submit" class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-700 transition">Lưu sản phẩm</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Product Modal -->
<div id="editProductModal" class="modal flex">
  <div class="modal-content">
    <h2 class="text-2xl font-bold text-yellow-400 mb-4">Sửa Sản phẩm</h2>
    <form action="#" method="POST" class="space-y-6">
      <!-- Product Name -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_name" class="text-yellow-300">Tên sản phẩm</label>
        <input type="text" id="edit_product_name" name="edit_product_name" class="bg-gray-700 text-white p-2 rounded shadow w-full" value="Toyota Camry" required>
      </div>
      <!-- Product Image -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_image" class="text-yellow-300">Ảnh sản phẩm</label>
        <input type="file" id="edit_product_image" name="edit_product_image" class="bg-gray-700 text-white p-2 rounded shadow w-full" accept="image/*" required>
      </div>
      <!-- Product Color -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_color" class="text-yellow-300">Màu sắc</label>
        <input type="text" id="edit_product_color" name="edit_product_color" class="bg-gray-700 text-white p-2 rounded shadow w-full" value="Đỏ" required>
      </div>
      <!-- Year of Manufacture -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_year" class="text-yellow-300">Năm sản xuất</label>
        <input type="number" id="edit_product_year" name="edit_product_year" class="bg-gray-700 text-white p-2 rounded shadow w-full" value="2022" required>
      </div>
      <!-- Car Manufacturer -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_manufacturer" class="text-yellow-300">Hãng xe</label>
        <input type="text" id="edit_product_manufacturer" name="edit_product_manufacturer" class="bg-gray-700 text-white p-2 rounded shadow w-full" value="Toyota" required>
      </div>
      <!-- Seat Count -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_seat_count" class="text-yellow-300">Số ghế</label>
        <input type="number" id="edit_product_seat_count" name="edit_product_seat_count" class="bg-gray-700 text-white p-2 rounded shadow w-full" value="5" required>
      </div>
      <!-- Fuel Type -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_fuel" class="text-yellow-300">Nhiên liệu</label>
        <input type="text" id="edit_product_fuel" name="edit_product_fuel" class="bg-gray-700 text-white p-2 rounded shadow w-full" value="Xăng" required>
      </div>
      <!-- Fuel Consumption -->
      <div class="flex flex-col space-y-2">
        <label for="edit_product_consumption" class="text-yellow-300">Tiêu thụ</label>
        <input type="text" id="edit_product_consumption" name="edit_product_consumption" class="bg-gray-700 text-white p-2 rounded shadow w-full" value="8L/100km" required>
      </div>
      <!-- Additional Fields -->
      <div class="flex justify-between">
        <button type="button" onclick="closeModal('editProductModal')" class="bg-gray-600 px-4 py-2 rounded hover:bg-gray-500">Đóng</button>
        <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-700 transition">Lưu thay đổi</button>
      </div>
    </form>
  </div>
</div>


  <!-- Delete Product Modal -->
  <div id="deleteProductModal" class="modal flex">
    <div class="modal-content">
      <h2 class="text-2xl font-bold text-red-400 mb-4">Xóa sản phẩm</h2>
      <p>Bạn có chắc chắn muốn xóa sản phẩm này không?</p>
      <div class="flex justify-between mt-6">
        <button type="button" onclick="closeModal('deleteProductModal')" class="bg-gray-600 px-4 py-2 rounded hover:bg-gray-500">Hủy</button>
        <button type="button" class="bg-red-600 px-4 py-2 rounded text-white hover:bg-red-700 transition">Xóa</button>
      </div>
    </div>
  </div>

  <script>
    function openModal(modalId) {
      document.getElementById(modalId).style.display = "flex";
    }

    function closeModal(modalId) {
      document.getElementById(modalId).style.display = "none";
    }
  </script>
  @endsection