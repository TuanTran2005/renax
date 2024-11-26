@extends('layout.home')
@section('content')
<!-- Main Content -->
<main class="flex-1 p-6">
  <h2 class="text-2xl font-bold mb-6 text-yellow-400">
    <i class="fas fa-tags mr-2"></i> Quản lý loại hàng
  </h2>

  <!-- Search and Filter -->
  <div class="flex justify-between items-center mb-6">
    <div>
      <input type="text" placeholder="Tìm kiếm loại hàng..." 
        class="bg-gray-700 text-white p-2 rounded shadow focus:outline-none focus:ring focus:ring-blue-500">
    </div>
    <div>
    <button onclick="openAddModal()" class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-700 transition">
          <i class="fas fa-plus mr-2"></i> Thêm mới loại hàng
        </button>
    </div>
  </div>

  <!-- Categories Table -->
  <table class="w-full bg-gray-700 rounded shadow-lg overflow-hidden mb-8">
    <thead>
      <tr class="bg-gray-800 text-left">
        <th class="p-4 text-yellow-300">Tên loại hàng</th>
        <th class="p-4 text-yellow-300">Loại xe</th>
        <th class="p-4 text-yellow-300">Sản xuất</th>
        <th class="p-4 text-yellow-300">Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr class="bg-gray-600 hover:bg-gray-500 transition">
        <td class="p-4">{{$product->name_category}}</td>
        <td class="p-4">{{$product->describe}}</td>
        <td class="p-4">{{$product->created_at}}</td>
        <td class="p-4 flex space-x-4">
          <!-- Nút Chỉnh sửa -->
          <button 
            onclick="openEditModal('{{ $product->id }}', '{{ $product->name_category }}', '{{ $product->describe }}')" 
            class="bg-yellow-600 px-4 py-2 rounded text-white hover:bg-yellow-700 transition">
            Chỉnh sửa
          </button>
          <!-- Nút Xóa -->
          <form action="{{ route('delete_cartegory/'.$product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không?')">
            @csrf
            @method('DELETE')
            <button type="submit" 
              class="bg-red-600 px-4 py-2 rounded text-white hover:bg-red-700 transition">
              Xóa
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</main>

<!-- Add Modal -->
<div id="addModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form action="{{route('add_cartegori')}}" method="post"  class="space-y-4">
      <div class="modal-header flex justify-between items-center mb-4">
        <span class="text-xl font-semibold text-gray-800">Thêm loại hàng mới</span>
      </div>
      <div class="modal-body space-y-4">
        <div>
          <label for="addCategoryName" class="text-sm font-semibold text-yellow-300">Tên loại hàng</label>
          <input type="text" id="addCategoryName" name="tenlh" class="input-field w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Nhập tên loại hàng" required>
        </div>
        <div>
          <label for="addCategoryDescription" class="text-sm font-semibold text-yellow-300">Mô tả</label>
          <textarea id="addCategoryDescription" name="mt" class="input-field w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Nhập mô tả loại hàng" rows="4" required></textarea>
        </div>
      </div>
      <div class="modal-footer flex justify-between items-center space-x-4">
        <button type="submit" name="add" class="button button-add px-6 py-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition-colors">Lưu</button>
        <button type="button" class="button button-cancel px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition-colors" onclick="closeModal('addModal')">Hủy</button>
      </div>
    </form>
  </div>
</div>
<!-- Edit Modal -->
<div id="editModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form action="{{route('update-cartegori')}}" method="post" class="space-y-4">
      <div class="modal-header flex justify-between items-center mb-4">
        <span class="text-xl font-semibold text-gray-800">Chỉnh sửa loại hàng</span>
      </div>
      <div class="modal-body space-y-4">
        <input type="hidden" id="editCategoryId" name="id">
        <div>
          <label for="editCategoryName" class="text-sm font-semibold text-yellow-300">Tên loại hàng</label>
          <input type="text" id="editCategoryName" name="tenlh" class="input-field w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
        </div>
        <div>
          <label for="editCategoryDescription" class="text-sm font-semibold text-yellow-300">Mô tả</label>
          <textarea id="editCategoryDescription" name="mt" class="input-field w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" rows="4" required></textarea>
        </div>
      </div>
      <div class="modal-footer flex justify-between items-center space-x-4">
        <button type="submit" class="button button-save px-6 py-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition-colors">Lưu</button>
        <button type="button" class="button button-cancel px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition-colors" onclick="closeModal('editModal')">Hủy</button>
      </div>
    </form>
  </div>
</div>

<script>
 function openAddModal() {
    const modal = document.getElementById('addModal');
    modal.style.display = 'block';
  }
  function openEditModal(id, name, description) {
    const modal = document.getElementById('editModal');
    document.getElementById('editCategoryId').value = id;
    document.getElementById('editCategoryName').value = name;
    document.getElementById('editCategoryDescription').value = description;
    modal.classList.remove('hidden');
    modal.style.display = 'block';
  }

  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';
    }
</script>
@endsection
