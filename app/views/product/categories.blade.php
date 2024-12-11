@extends('layout.home')
@section('content')

<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
      <i class="fas fa-tags bg-white text-blue-300 p-2 rounded-full mr-2"></i> Quản lý Loại Hàng
    </h2>

    <button onclick="openModal('addCategoryModal')" class="bg-green-200 px-4 py-2 rounded hover:bg-green-300 text-green-800 transition mb-4">
      Thêm Loại Hàng
    </button>

   
    <table class="w-full bg-white rounded shadow-lg overflow-hidden mb-8">
      <thead>
        <tr class="bg-blue-100 text-left">
          <th class="p-4 text-blue-800">Tên Loại Hàng</th>
          <th class="p-4 text-blue-800">Mô Tả</th>
          <th class="p-4 text-blue-800">Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr class="hover:bg-blue-50 transition">
          <td class="p-4">{{$product->name_category}}</td>
          <td class="p-4 description">{{$product->describe}}</td>
          <td class="p-4">
            <button onclick="openViewModal('{{$product->name_category}}', '{{$product->describe}}')" class="bg-yellow-200 px-4 py-2 rounded hover:bg-yellow-300 text-yellow-800 transition">Xem</button>
            <button onclick="openEditModal('{{$product->name_category}}', '{{$product->describe}},','{{$product->id}}')" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Sửa</button>
            <form action="{{route('delete_cartegory/'.$product->id)}}" method="post">
               <button type="submit" onclick="openModals('deleteCategoryModal')" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
            </form>
           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</main>


<div id="addCategoryModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Thêm Loại Hàng</h2>
      <form action="{{route('add_cartegori')}}" method="post">
        @csrf
        <div class="mb-4">
          <label for="addCategoryName" class="block text-sm font-semibold text-gray-700">Tên Loại Hàng</label>
          <input type="text" name="tenlh" id="addCategoryName" class="w-full px-4 py-2 rounded border border-gray-300" required>
        </div>
        <div class="mb-4">
          <label for="addCategoryDescription" class="block text-sm font-semibold text-gray-700">Mô Tả</label>
          <textarea id="addCategoryDescription" name="mt" class="w-full px-4 py-2 rounded border border-gray-300" required></textarea>
        </div>
        <div class="flex justify-end space-x-4">
          <button onclick="closeModal('addCategoryModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
          <button type="submit" name="add" class="bg-green-200 px-4 py-2 rounded hover:bg-green-300 text-green-800 transition">Lưu</button>
        </div>
      </form>
    </div>
</div>


<div id="viewCategoryModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Xem Chi Tiết Loại Hàng</h2>
      <div>
        <p id="viewCategoryName" class="text-lg"></p>
        <p id="viewCategoryDescription" class="mt-4 text-lg"></p>
      </div>
      <button onclick="closeModal('viewCategoryModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 mt-4">Đóng</button>
    </div>
</div>


<div id="editCategoryModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Chỉnh Sửa Loại Hàng</h2>
      <form action="{{route('update-cartegori')}}" method="post">
        <div class="mb-4">
          <label for="editCategoryName" class="block text-sm font-semibold text-gray-700">Tên Loại Hàng</label>
          <input type="text" name="tenlh" id="editCategoryName" class="w-full px-4 py-2 rounded border border-gray-300">
        </div>
        <div class="mb-4">
          <label for="editCategoryDescription" class="block text-sm font-semibold text-gray-700">Mô Tả</label>
          <textarea id="editCategoryDescription" name="mt" class="w-full px-4 py-2 rounded border border-gray-300"></textarea>
        </div>
        <input type="hidden" name="id" id="id_crategory">
        <div class="flex justify-end space-x-4">
          <button onclick="closeModal('editCategoryModal')" type="button" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
          <button type="submit" name="add" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Lưu</button>
        </div>
      </form>
    </div>
</div>

<script>
   
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove("hidden");
       
    }
    function openModals(modalId) {
        document.getElementById(modalId).classList.remove("hidden");
        confirm("Ban co chac muon xoa no khong");
    }


    function closeModal(modalId) {
        document.getElementById(modalId).classList.add("hidden");
    }

  
    function openViewModal(name, description) {
        document.getElementById('viewCategoryName').innerText = `Tên Loại Hàng: ${name}`;
        document.getElementById('viewCategoryDescription').innerText = `Mô Tả: ${description}`;
        openModal('viewCategoryModal');
    }


    function openEditModal(name, description,id) {
        document.getElementById('editCategoryName').value = name;
        document.getElementById('editCategoryDescription').value = description;
        document.getElementById('id_crategory').value=id;
        openModal('editCategoryModal');
    }
</script>
@endsection
