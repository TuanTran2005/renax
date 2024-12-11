@extends("layout.home")
@section('content')
<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
      <i class="fas fa-users bg-white text-blue-300 p-2 rounded-full mr-2"></i> Quản lý người dùng
    </h2>

    <!-- User Table -->
    <table class="w-full bg-white rounded shadow-lg overflow-hidden mb-8">
      <thead>
        <tr class="bg-blue-100 text-left">
          <th class="p-4 text-blue-800">Tên</th>
          <th class="p-4 text-blue-800">Email</th>
          <th class="p-4 text-blue-800">Vai trò</th>
          <th class="p-4 text-blue-800">Trạng thái</th>
          <th class="p-4 text-blue-800">Hành động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $products as $product )
        <tr class="hover:bg-blue-50 transition">
          <td class="p-4">{{$product->name}}</td>
          <td class="p-4">{{$product->email}}</td>
          <td class="p-4">
            @if ($product->role == 1)
             Admin
           @else
            user
             @endif
          </td>
          @if ($product->status == 0 )
          <td class="p-4 text-green-700"> 
            <i class="fas fa-check-circle bg-green-200 text-green-700 p-1 rounded-full"></i> Hoạt động
          </td>
          @else
          <td class="p-4 text-red-700"> 
            <i class="fas fa-times-circle bg-red-200 text-red-700 p-1 rounded-full"></i> Không còn hoạt động
          </td>
          @endif
          <td class="p-4">
       
          <button onclick="openViewUserModal({{ $product->id }}, '{{ $product->name }}', '{{ $product->email }}', {{ $product->role }}, {{ $product->status }},{{$product->id}})" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Xem</button>
         @if ($_SESSION['auth']['id']!=$product->id) 
         <button onclick="openEditUserModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->images }}','{{$product->password}}','{{$product->addpress}}','{{$product->phone}}', '{{ $product->email }}','{{$product->date}}',  '{{ $product->status }}','{{$product->gender}}','{{ $product->role }}')" class="bg-yellow-200 px-4 py-2 rounded hover:bg-yellow-300 text-yellow-800 transition">Sửa</button>
       
        <button onclick="openDeleteUserModal({{ $product->id }}, '{{ $product->name }}')" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
        @endif    
    </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</main>

<!-- View User Modal -->
<div id="viewUserModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Thông tin người dùng</h2>
        <ul id="userDetails" class="space-y-2">
            <!-- Dữ liệu sẽ được tải động ở đây -->
        </ul>
        <div class="flex justify-end mt-6">
            <button onclick="closeModal('viewUserModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Đóng</button>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div id="deleteUserModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Xóa người dùng</h2>
        <p>Bạn có chắc chắn muốn xóa người dùng <strong id="deleteUserName"></strong> không?</p>
        <div class="flex justify-end mt-6 space-x-4">
            <button onclick="closeModal('deleteUserModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
           
            <form  action="{{route('delete_user')}}" method="POST" style="display: inline-block;">
                <button type="submit" id="deleteUserForm" name="delete_user" class="bg-red-200 px-4 py-2 rounded hover:bg-red-300 text-red-800 transition">Xóa</button>
            </form>
            
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white text-gray-800 w-1/3 max-h-full p-6 rounded-lg shadow-lg overflow-auto">
        <h2 class="text-2xl font-bold text-blue-800 mb-4">Sửa thông tin người dùng</h2>
        <form action="{{route('update_user')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="editid" name="editid">
            <div class="space-y-4">
                <!-- Tên -->
                <div>
                    <label for="editName" class="block">Tên:</label>
                    <input type="text" id="editName" name="editName" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <!-- Email -->
                <div>
                    <label for="editEmail" class="block">Email:</label>
                    <input type="email" id="editEmail" name="editEmail" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="editPhone" class="block">Phone:</label>
                    <input type="text" id="editPhone" name="editPhone" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <!-- Vai trò -->
                <div>
                    <label for="editRole" class="block">Vai trò:</label>
                    <select id="editRole" name="role" class="w-full p-2 border border-gray-300 rounded">
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <!-- Trạng thái -->
                <div>
                    <label for="editStatus" class="block">Trạng thái:</label>
                    <select id="editStatus" name="status" class="w-full p-2 border border-gray-300 rounded">
                        <option value="0">Hoạt động</option>
                        <option value="1">Không còn hoạt động</option>
                    </select>
                </div>
                <!-- Hiển thị ảnh hiện tại -->
                <div>
                    <label class="block">Ảnh hiện tại:</label>
                    <img id="currentImage" src="path_to_current_image.jpg" alt="Current Image" class="w-32 h-32 object-cover mb-4 rounded">
                </div>
                <!-- Chọn ảnh mới -->
                <div>
                    <label for="editImage" class="block">Chọn ảnh mới:</label>
                    <input type="file" id="editImage" name="image" class="w-full p-2 border border-gray-300 rounded">
                </div>
            </div>
               <div>
                    <label for="editPassword" class="block">Mật khẩu:</label>
                    <input type="password" id="editPassword" name="pass" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                  <div>
                    <label for="editAddpress" class="block">Đia chỉ:</label>
                    <input type="text" id="editAddpress" name="address" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                   <div>
                    <label for="editDate" class="block">Ngày sinh:</label>
                    <input type="date" id="editDate" name="date" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                  <div>
                    <label for="editGender" class="block">Giới tính:</label>
                    <select id="editGender" name="gender" class="w-full p-2 border border-gray-300 rounded">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            <!-- Nút hành động -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal('editUserModal')" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-gray-800 transition">Hủy bỏ</button>
                <button type="submit" name="add" class="bg-blue-200 px-4 py-2 rounded hover:bg-blue-300 text-blue-800 transition">Lưu</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openViewUserModal(id, name, email, role, status) {
        const modal = document.getElementById('viewUserModal');
        const userDetails = document.getElementById('userDetails');
        
        // Hiển thị thông tin người dùng trong modal
        userDetails.innerHTML = `
            <li><strong>Tên:</strong> ${name}</li>
            <li><strong>Email:</strong> ${email}</li>
            <li><strong>Vai trò:</strong> ${role === 1 ? 'Admin' : 'User'}</li>
            <li><strong>Trạng thái:</strong> ${status === 0 ? 'Hoạt động' : 'Không còn hoạt động'}</li>
        `;
        
        modal.classList.remove('hidden');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
    }
    function openEditUserModal(id, name,images,pass,address, phone, email,   date, status, gender, role) {
    const modal = document.getElementById('editUserModal');

    // Điền thông tin vào các trường
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('currentImage').src = images;
   document.getElementById('editRole').value=role;
   document.getElementById('editStatus').value=status;
 document.getElementById('editAddpress').value=address;
 document.getElementById('editDate').value=date;
 document.getElementById('editGender').value=gender;
 document.getElementById('editPassword').value=pass;
 document.getElementById('editid').value=id;
 document.getElementById('editPhone').value=phone;
    
   
  

    modal.classList.remove('hidden');
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}

function openDeleteUserModal(id, name) {
  
    document.getElementById('deleteUserName').textContent = name;
    
    
    document.getElementById('deleteUserForm').value = id ;
    
   
    document.getElementById('deleteUserModal').classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
</script>
@endsection
