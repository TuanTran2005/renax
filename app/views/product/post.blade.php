<style>
    /* Giới hạn chiều cao cho nội dung và sử dụng ellipsis */
    .td-content {
        max-width: 200px; /* Giới hạn chiều rộng của ô */
        overflow: hidden; /* Ẩn phần nội dung vượt quá */
        text-overflow: ellipsis; /* Hiển thị dấu ... nếu nội dung quá dài */
        white-space: nowrap; /* Ngăn văn bản xuống dòng */
    }

    /* Giới hạn kích thước ảnh trong bảng */
    .td-image img {
        max-width: 100px; /* Giới hạn chiều rộng tối đa của ảnh */
        max-height: 100px; /* Giới hạn chiều cao tối đa của ảnh */
        object-fit: cover; /* Cắt ảnh sao cho phù hợp */
    }

    /* Đảm bảo các ô có chiều cao đồng đều */
    td {
        vertical-align: middle;
    }

    /* CSS cho Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        width: 50%;
        border-radius: 10px;
    }
</style>

@extends("layout.home")
@section('content')
<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
        <i class="fas fa-newspaper bg-white text-blue-300 p-2 rounded-full mr-2"></i> Quản lý bài viết
    </h2>

    <!-- Nút thêm bài viết -->
    <button onclick="openCreateArticleModal()" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition mb-4">
        <i class="fas fa-plus mr-2"></i> Thêm bài viết
    </button>

    <!-- Article Table -->
    <table class="w-full bg-white rounded shadow-lg overflow-hidden mb-8">
      <thead>
        <tr class="bg-blue-100 text-left">
          <th class="p-4 text-blue-800">ID</th>
          <th class="p-4 text-blue-800">Tiêu đề</th>
          <th class="p-4 text-blue-800">Ảnh</th>
          <th class="p-4 text-blue-800">Nội dung</th>
          <th class="p-4 text-blue-800">Ngày tạo</th>
          <th class="p-4 text-blue-800">Ngày cập nhật</th>
          <th class="p-4 text-blue-800">Hành động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $post as $index )
        
       
        <!-- Ví dụ bài viết -->
        <tr class="hover:bg-blue-50 transition">
          <td class="p-4">{{$index->id}}</td>
          <td class="p-4">{{$index->title}}</td>
          <td class="p-4 td-image">
            <img src="{{$index->images}}" alt="Article Image">
          </td>
          <td class="p-4 td-content">{{$index->content}}</td>
          <td class="p-4">{{$index->created_at	}}</td>
          <td class="p-4">{{$index->updated_at}}</td>
          <td class="p-4">
            <button onclick="openViewArticleModal()" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Xem</button>
            <button onclick="openEditArticleModal(`{{$index->id}}`, `{{$index->title}}`, `{{$index->content}}`)" class="bg-yellow-200 px-4 py-2 rounded hover:bg-yellow-300 text-yellow-800 transition">Sửa</button>
            <button onclick="openDeleteArticleModal({{$index->id}})" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
          </td>
        </tr>
         @endforeach
      </tbody>
    </table>
</main>

<!-- Modal Thêm bài viết -->
<div id="createArticleModal" class="modal">
  <div class="modal-content">
    <h3 class="text-xl font-bold">Thêm bài viết mới</h3>
    <form action="{{route('addpost')}}" method="post" enctype="multipart/form-data">
    <div>
        <label for="articleTitle">Tiêu đề</label>
        <input type="text" id="articleTitle" name="title" class="w-full px-4 py-2 rounded border border-gray-300" required>
      </div>
      <div>
        <label for="articleTitle">Images</label>
        <input type="file" id="articleTitle" name="images" class="w-full px-4 py-2 rounded border border-gray-300" required>
      </div>
      <div class="mt-4">
        <label for="articleContent">Nội dung</label>
        <textarea id="articleContent" name="content" class="w-full px-4 py-2 rounded border border-gray-300" rows="4" required></textarea>
      </div>
      <div class="mt-4">
        <button type="submit" name="luu" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Lưu</button>
        <button type="button" class="bg-gray-200 text-black px-6 py-2 rounded hover:bg-gray-300" onclick="closeModal('createArticleModal')">Hủy</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal xem bài viết -->
<div id="viewArticleModal" class="modal">
  <div class="modal-content">
    <h3 class="text-xl font-bold">Chi tiết bài viết</h3>
    <p id="viewArticleContent">Nội dung bài viết...</p>
    <button onclick="closeModal('viewArticleModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Đóng</button>
  </div>
</div>

<!-- Modal sửa bài viết -->
<div id="editArticleModal" class="modal">
  <div class="modal-content">
    <h3 class="text-xl font-bold">Sửa bài viết</h3>
    <form id="editArticleForm" method="post" action="{{route('update_post')}}">
      @csrf
      <input type="hidden" id="editArticleId" name="id">
      <div>
        <label for="editArticleTitle">Tiêu đề</label>
        <input type="text" id="editArticleTitle" name="title" class="w-full px-4 py-2 rounded border border-gray-300">
      </div>
      <div class="mt-4">
        <label for="editArticleContent">Nội dung</label>
        <textarea id="editArticleContent" name="content" class="w-full px-4 py-2 rounded border border-gray-300" rows="4"></textarea>
      </div>
      <div class="mt-4">
        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Cập nhật</button>
        <button type="button" class="bg-gray-200 text-black px-6 py-2 rounded hover:bg-gray-300" onclick="closeModal('editArticleModal')">Hủy</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal xóa bài viết -->
<div id="deleteArticleModal" class="modal">
  <div class="modal-content">
    <h3 class="text-xl font-bold">Xóa bài viết</h3>
    <p>Bạn có chắc chắn muốn xóa bài viết này?</p>
    <div class="mt-4">
      <form action="{{route('delete_post')}}" method="post">
        @csrf
        <input type="hidden" id="delete_post" name="delete_post">
        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">Xóa</button>
      </form>
      <button class="bg-gray-200 text-black px-6 py-2 rounded hover:bg-gray-300" onclick="closeModal('deleteArticleModal')">Hủy</button>
    </div>
  </div>
</div>

<script>
  // Mở và đóng modal
  function openCreateArticleModal() {
    document.getElementById("createArticleModal").style.display = 'block';
  }

  function openViewArticleModal() {
    document.getElementById("viewArticleModal").style.display = 'block';
  }

  function openEditArticleModal(id, title, content) {
    // Đổ dữ liệu vào các ô chỉnh sửa
    document.getElementById("editArticleId").value = id;
    document.getElementById("editArticleTitle").value = title;
    document.getElementById("editArticleContent").value = content;
    document.getElementById("editArticleModal").style.display = 'block';
  }

  function openDeleteArticleModal($id) {
    document.getElementById("delete_post").value = $id;
    document.getElementById("deleteArticleModal").style.display = 'block';
  }

  function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
  }

  document.getElementById("createArticleForm").addEventListener("submit", function(event) {
    event.preventDefault();
    closeModal('createArticleModal');
  });
</script>

@endsection
