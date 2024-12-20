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
        <button onclick="openModal('add')" class="bg-blue-600 px-4 py-2 rounded text-white hover:bg-blue-700 transition">
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
        @foreach ($products as $product )
        
        
        <tr class="bg-gray-600 hover:bg-gray-500 transition">
          <td class="p-4">{{$product->name}}</td>
          <td class="p-4">{{$product->describe}}</td>
          <td class="p-4">{{$product->created_at}}</td>
          <td class="p-4">
            <button onclick="openModal('edit', 'Xe hơi', 'Các loại xe hơi hiện đại và cổ điển.')" 
              class="bg-yellow-600 px-4 py-2 rounded text-white hover:bg-yellow-700 transition">Chỉnh sửa</button>
            <button 
              class="bg-red-600 px-4 py-2 rounded text-white hover:bg-red-700 transition">Xóa</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
  <div id="modal" class="modal">
    <div class="modal-content">
      <form action="{{route('update-product')}}" method="post">
      <div class="modal-header">
        <span id="modalTitle" class="text-xl">Thêm loại hàng mới</span>
      </div>
      <div class="modal-body">
        <label for="categoryName" class="text-sm font-semibold text-yellow-300">Tên loại hàng</label>
        <input type="text" id="categoryName" name="tenlh" class="input-field">

        <label for="categoryDescription" class="text-sm font-semibold text-yellow-300">Mô tả</label>
        <textarea id="categoryDescription" name="mt" class="input-field"></textarea>
      </div>
      <div class="modal-footer">
        <button class="button button-cancel" onclick="closeModal()">Hủy</button>
        <button class="button button-reset" onclick="resetModal()">Reset</button>
        <button class="button button-add" name="add">Lưu</button>
      </div>
      </form>
    </div>
  </div>
</main>
  <script>
   function openModal(type) {
  const modal = document.getElementById('modal');
  const modalTitle = document.getElementById('modalTitle');
  const confirmButton = document.querySelector('.button-add');
  const cancelButton = document.querySelector('.button-cancel');

  // Hiển thị modal
  modal.style.display = 'block';

  // Cập nhật nội dung modal dựa vào loại
  if (type === 'add') {
    modalTitle.innerText = 'Thêm loại hàng mới';
    confirmButton.innerText = 'Lưu';
    cancelButton.innerText = 'Hủy';
  }
}

function closeModal() {
  const modal = document.getElementById('modal');
  modal.style.display = 'none';
}

function resetModal() {
  const modalInputs = document.querySelectorAll('#modal input, #modal textarea, #modal select');

  // Reset tất cả input trong modal
  modalInputs.forEach(input => {if (input.type === 'checkbox' || input.type === 'radio') {
      input.checked = false;
    } else {
      input.value = '';
    }
  });

  console.log('Modal has been reset');
}

function saveCategory() {
  console.log('Category saved');
}


    function closeModal() {
      const modal = document.getElementById('modal');
      modal.style.display = 'none';
    }

    function saveCategory() {
      // Here, you can add functionality to save the category data
      alert('Thêm loại hàng mới thành công!');
      closeModal();
    }
  </script>
  @endsection
