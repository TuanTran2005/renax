@extends('layout.home')

@section('content')
<style>
  .bg-blue-300 {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255);
}
</style>
<main class="flex-1 p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-800">
      <i class="fas fa-chart-line bg-white text-blue-300 p-2 rounded-full mr-2"></i> Dashboard
    </h2>
     
    <!-- Statistics -->
    <div class="grid grid-cols-4 gap-6 mb-10">
      <div class="bg-green-300 p-6 rounded shadow-lg">
        <h3 class="text-lg font-bold text-green-700"><i class="fas fa-users mr-2"></i> Người dùng</h3>
        <p class="text-3xl mt-2">{{$user->total}}</p>
      </div>
      <div class="bg-red-300 p-6 rounded shadow-lg">
        <h3 class="text-lg font-bold text-red-700"><i class="fas fa-comments mr-2"></i> Bình luận</h3>
        <p class="text-3xl mt-2">{{$reviews->total}}</p>
      </div>
      <div class="bg-purple-300 p-6 rounded shadow-lg">
        <h3 class="text-lg font-bold text-purple-700"><i class="fas fa-box mr-2"></i> Sản phẩm</h3>
        <p class="text-3xl mt-2">{{$product->total}}</p>
      </div>
      <div class="bg-yellow-300 p-6 rounded shadow-lg">
        <h3 class="text-lg font-bold text-yellow-700"><i class="fas fa-tags mr-2"></i> Loại hàng</h3>
        <p class="text-3xl mt-2">{{$categories->total}}</p>
      </div>
    </div>

    <!-- New Row for Total Revenue -->
    <div class="grid grid-cols-1 gap-6 mb-10">
      <div class="bg-blue-300 p-6 rounded shadow-lg">
        <h3 class="text-lg font-bold text-blue-700"><i class="fas fa-money-bill-wave mr-2"></i> Tổng Doanh Thu</h3>
        @php
$tongAll = 0; 
@endphp

@foreach ($All as $tong)
    @if ($tong->status == 'Thành công')
        @php
        $tongAll += $tong->total_price ?? 0;
        @endphp
    @endif
@endforeach
@foreach ($ses as $tongbillct)
    @if ($tongbillct->status == 'Thành công')
        @php
        $tongAll += $tongbillct->price ?? 0;
        @endphp
    @endif
@endforeach

<p class="text-3xl mt-2">{{ $tongAll }} VNĐ</p>

       
      </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-2 gap-6">
      <!-- Pie Chart -->
      <div class="bg-white rounded shadow-lg p-6">
        <h3 class="text-lg font-bold text-blue-800 mb-4">Tỷ lệ danh mục sản phẩm</h3>
        <canvas id="pieChart"></canvas>
      </div>

      <!-- Bar Chart -->
      <div class="bg-white rounded shadow-lg p-6">
        <h3 class="text-lg font-bold text-blue-800 mb-4">Doanh thu theo tháng</h3>
        <canvas id="barChart"></canvas>
      </div>
    </div>
  </main>

  <script>
    // Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
      type: 'pie',
      data: {
        labels: ['Xe tải', 'Xe hơi', 'Xe máy', 'Phụ kiện'],
        datasets: [{
          label: 'Danh mục',
          data: [40, 30, 20, 10],
          backgroundColor: ['#4caf50', '#2196f3', '#ff9800', '#f44336']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top'
          }
        }
      }
    });

    // Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
      type: 'bar',
      data: {
        labels: ['Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
          label: 'Doanh thu (VNĐ)',
          data: [10500000, 14000000, 17500000],
          backgroundColor: '#2196f3'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
