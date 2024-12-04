@extends('layout.main')
@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
      <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="imgs/carousel-bg-1.jpg" alt="Image" />
            <div class="carousel-caption d-flex align-items-center">
              <div class="container">
                <div
                  class="row align-items-center justify-content-center justify-content-lg-start"
                >
                  <div class="col-10 col-lg-7 text-center text-lg-start">
                    <h6
                      class="text-white text-uppercase mb-3 animated slideInDown"
                    >
                      // Dịch Vụ Sửa Chữa Ô Tô //
                    </h6>
                    <h1
                      class="display-3 text-white mb-4 pb-3 animated slideInDown"
                    >
                      Trung Tâm Sửa Chữa Ô Tô Chuyên Nghiệp
                    </h1>
                    <a
                      href=""
                      class="btn btn-primary py-3 px-5 animated slideInDown"
                      >Tìm Hiểu Thêm<i class="fa fa-arrow-right ms-3"></i
                    ></a>
                  </div>
                  <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                    <img class="img-fluid" src="imgs/carousel-1.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="imgs/carousel-bg-2.jpg" alt="Image" />
            <div class="carousel-caption d-flex align-items-center">
              <div class="container">
                <div
                  class="row align-items-center justify-content-center justify-content-lg-start"
                >
                  <div class="col-10 col-lg-7 text-center text-lg-start">
                    <h6
                      class="text-white text-uppercase mb-3 animated slideInDown"
                    >
                      // Dịch Vụ Sửa Chữa Ô Tô //
                    </h6>
                    <h1
                      class="display-3 text-white mb-4 pb-3 animated slideInDown"
                    >
                      Trung Tâm Sửa Chữa Ô Tô Chuyên Nghiệp
                    </h1>
                    <a
                      href=""
                      class="btn btn-primary py-3 px-5 animated slideInDown"
                      >Tìm Hiểu Thêm<i class="fa fa-arrow-right ms-3"></i
                    ></a>
                  </div>
                  <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                    <img class="img-fluid" src="imgs/carousel-2.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel End -->

   <!-- Dịch Vụ Bắt Đầu -->
<div class="container-xxl py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="d-flex py-5 px-4">
            <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
            <div class="ps-4">
              <h5 class="mb-3">Dịch Vụ Chất Lượng</h5>
              <p>Chúng tôi đảm bảo dịch vụ chất lượng chăm sóc xe tốt nhất</p>
              <a class="text-secondary border-bottom" href="">Đọc Thêm</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="d-flex bg-light py-5 px-4">
            <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
            <div class="ps-4">
              <h5 class="mb-3">Nhân Viên Chuyên Nghiệp</h5>
              <p>Nhân viên được đào tạo chuyên nghiệp,bài bản</p>
              <a class="text-secondary border-bottom" href="">Đọc Thêm</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="d-flex py-5 px-4">
            <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
            <div class="ps-4">
              <h5 class="mb-3">Thiết Bị Hiện Đại</h5>
              <p>Thiết bị nhập khẩu từ Mỹ và châu Âu</p>
              <a class="text-secondary border-bottom" href="">Đọc Thêm</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dịch Vụ Kết Thúc -->
  

    <!-- Giới Thiệu Bắt Đầu -->
<!-- Giới Thiệu Dịch Vụ Bán Xe Hơi -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <!-- Phần hình ảnh xe hơi -->
      <div class="col-lg-6 pt-4" style="min-height: 400px">
        <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
          <img
            class="position-absolute img-fluid w-100 h-100"
            src="imgs/about.jpg"  
            style="object-fit: cover"
            alt="Xe hơi"
          />
          <div
            class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
            style="background: rgba(0, 0, 0, 0.08)"
          >
            <h1 class="display-4 text-white mb-0">
              15 <span class="fs-4">Năm</span>
            </h1>
            <h4 class="text-white">Kinh Nghiệm Bán Xe</h4>
          </div>
        </div>
      </div>

      <!-- Phần giới thiệu về dịch vụ bán xe -->
      <div class="col-lg-6">
        <h6 class="text-primary text-uppercase">// Giới Thiệu //</h6>
        <h1 class="mb-4">
          <span class="text-primary">CarServ</span> - Nơi Bán Xe Hơi Chất Lượng Nhất
        </h1>
        <p class="mb-4">
          CarServ cung cấp những mẫu xe hơi chất lượng cao, được kiểm tra kỹ lưỡng và cam kết mang đến cho bạn những lựa chọn tốt nhất. Chúng tôi cung cấp dịch vụ bán xe mới và đã qua sử dụng với các thương hiệu nổi tiếng trên thị trường.
        </p>
        
        <!-- Các điểm nổi bật về dịch vụ bán xe -->
        <div class="row g-4 mb-3 pb-3">
          <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
            <div class="d-flex">
              <div
                class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                style="width: 45px; height: 45px"
              >
                <span class="fw-bold text-secondary">01</span>
              </div>
              <div class="ps-3">
                <h6>Chất Lượng Xe Cao Cấp</h6>
                <span>Tất cả các xe đều được kiểm tra kỹ lưỡng và đạt tiêu chuẩn chất lượng cao.</span>
              </div>
            </div>
          </div>
          <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
            <div class="d-flex">
              <div
                class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                style="width: 45px; height: 45px"
              >
                <span class="fw-bold text-secondary">02</span>
              </div>
              <div class="ps-3">
                <h6>Giá Cả Hợp Lý</h6>
                <span>Chúng tôi cung cấp những chiếc xe với giá cả hợp lý và dịch vụ tài chính linh hoạt.</span>
              </div>
            </div>
          </div>
          <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
            <div class="d-flex">
              <div
                class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                style="width: 45px; height: 45px"
              >
                <span class="fw-bold text-secondary">03</span>
              </div>
              <div class="ps-3">
                <h6>Hỗ Trợ Tận Tình</h6>
                <span>Chúng tôi luôn sẵn sàng hỗ trợ bạn tìm kiếm chiếc xe phù hợp với nhu cầu và ngân sách.</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Nút đọc thêm -->
        <a href="" class="btn btn-primary py-3 px-5">
          Tìm Hiểu Thêm<i class="fa fa-arrow-right ms-3"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Giới Thiệu Dịch Vụ Bán Xe Hơi Kết Thúc -->

  <!-- Giới Thiệu Kết Thúc -->
  <!-- Sự Kiện Bắt Đầu -->

  <!-- Sự Kiện Kết Thúc -->
  <!-- Thống Kê Bắt Đầu -->
<div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
      <div class="row g-4">
        <div
          class="col-md-6 col-lg-3 text-center wow fadeIn"
          data-wow-delay="0.1s"
        >
          <i class="fa fa-check fa-2x text-white mb-3"></i>
          <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
          <p class="text-white mb-0">Năm Kinh Nghiệm</p>
        </div>
        <div
          class="col-md-6 col-lg-3 text-center wow fadeIn"
          data-wow-delay="0.3s"
        >
          <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
          <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
          <p class="text-white mb-0">Kỹ Thuật Viên Chuyên Gia</p>
        </div>
        <div
          class="col-md-6 col-lg-3 text-center wow fadeIn"
          data-wow-delay="0.5s"
        >
          <i class="fa fa-users fa-2x text-white mb-3"></i>
          <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
          <p class="text-white mb-0">Khách Hàng Hài Lòng</p>
        </div>
        <div
          class="col-md-6 col-lg-3 text-center wow fadeIn"
          data-wow-delay="0.7s"
        >
          <i class="fa fa-car fa-2x text-white mb-3"></i>
          <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
          <p class="text-white mb-0">Dự Án Hoàn Thành</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Thống Kê Kết Thúc -->
  

  <!-- Đặt Lịch Bắt Đầu -->
  <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container">
    <div class="row gx-5">
      <!-- Thông tin -->
      <div class="col-lg-6 py-5">
        <div class="py-5">
          <h1 class="text-white mb-4">
            Nhà Cung Cấp Dịch Vụ Sửa Chữa Ô Tô Được Chứng Nhận và Giành Giải Thưởng
          </h1>
          <p class="text-white mb-0">
            Dịch vụ của CarSev chúng tôi đã trở nên nổi tiếng và in dấu ấn rõ nét trong lòng người tiêu dùng
          </p>
        </div>
      </div>
      
      <!-- Form Đặt Lịch Dịch Vụ -->
      <div class="col-lg-6">
        <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
          <h1 class="text-white mb-4">Đặt Lịch Dịch Vụ</h1>
          <form>
            <div class="row g-3">
              
              <!-- Trường Tên -->
              <div class="col-12 col-sm-6">
                <input type="text" name="name" class="form-control border-0" placeholder="Tên Của Bạn" style="height: 55px" />
              </div>
              
              <!-- Trường Chọn Sản Phẩm -->
              <div class="col-12 col-sm-6">
                <select class="form-select border-0" name="product" style="height: 55px">
                  <option selected>Chọn Loại Xe</option>
                  @foreach ( $sql as $roop )
                  
                 
                  <option value="{{$roop->id}}">{{$roop->name_product}}</option>
                   @endforeach
                </select>
              </div>
              
              <!-- Trường Chọn Dịch Vụ -->
              <div class="col-12 col-sm-6">
                <select class="form-select border-0" name="service" style="height: 55px">
                  <option selected>Chọn Dịch Vụ</option>
                  @foreach ($services as $word )
                  <option value="{{$word->id}}">{{$word->name}}</option>
                  @endforeach
                  
                </select>
              </div>
              
              <!-- Trường Ngày Dịch Vụ -->
              <div class="col-12 col-sm-6">
                <div class="date" id="date1" data-target-input="nearest">
                  <input type="text" name="service_date" class="form-control border-0 datetimepicker-input" placeholder="Ngày Dịch Vụ" data-target="#date1" data-toggle="datetimepicker" style="height: 55px" />
                </div>
              </div>
              
              <!-- Trường Yêu Cầu Đặc Biệt -->
              <div class="col-12">
                <textarea class="form-control border-0" name="special_requests" placeholder="Yêu Cầu Đặc Biệt"></textarea>
              </div>
              
              <!-- Nút Đặt Lịch -->
              <div class="col-12">
                <button class="btn btn-secondary w-100 py-3" type="submit">
                  Đặt Lịch Ngay
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Đặt Lịch Kết Thúc -->

<!-- Đội Ngũ Bắt Đầu -->
<div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-primary text-uppercase">// Sản phẩm nổi bật //</h6>
        <h1 class="mb-5">Các sản phẩm nổi bật của chúng tôi</h1>
      </div>
      <div class="bonbon d-flex">
 @foreach ( $product as $index )

    <div class="col-lg-3 col-md-6 wow fadeInUp m-3" data-wow-delay="0.1s">
       
        <div class="team-item ">
            <div class="position-relative overflow-hidden">
                <img class="mg-25" src="{{json_decode($index->images)[3] }}" alt="" width="320px" height="250px" />
                <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                    <a class="btn btn-square mx-1" href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square mx-1" href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square mx-1" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="bg-light text-center p-4">
              <a href="{{route('detailProduct')}}?id={{$index->id}}">
                <h5 class="fw-bold mb-0">{{$index->name_product}}</h5>
                <small>${{$index->price}}</small> 
                   </a>
            </div>
        </div>

    </div>
  
 @endforeach
    </div>
    </div>
  </div>
  <!-- Đội Ngũ Kết Thúc -->
  
<!-- Đội Ngũ Bắt Đầu -->
<div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-primary text-uppercase">// Các Kỹ Thuật Viên Của Chúng Tôi //</h6>
        <h1 class="mb-5">Các Kỹ Thuật Viên Chuyên Gia Của Chúng Tôi</h1>
      </div>

      <div class="row g-4">
       
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item">
            <div class="position-relative overflow-hidden">
              <img class="img-fluid" src="imgs/team-1.jpg" alt="" />
              <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="fw-bold mb-0">Họ Tên</h5>
              <small>Chức Vụ</small>
            </div>
          </div>
        </div>
      
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="team-item">
            <div class="position-relative overflow-hidden">
              <img class="img-fluid" src="imgs/team-2.jpg" alt="" />
              <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="fw-bold mb-0">Họ Tên</h5>
              <small>Chức Vụ</small>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="team-item">
            <div class="position-relative overflow-hidden">
              <img class="img-fluid" src="imgs/team-3.jpg" alt="" />
              <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="fw-bold mb-0">Họ Tên</h5>
              <small>Chức Vụ</small>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
          <div class="team-item">
            <div class="position-relative overflow-hidden">
              <img class="img-fluid" src="imgs/team-4.jpg" alt="" />
              <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="bg-light text-center p-4">
              <h5 class="fw-bold mb-0">Họ Tên</h5>
              <small>Chức Vụ</small>
            </div>
          </div>
        </div>
      </div>
   
    </div>
  </div>
  <!-- Đội Ngũ Kết Thúc -->
@endsection