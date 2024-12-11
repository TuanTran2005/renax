@extends('layout.main')

@section('content')
    
    <main>
      <section
        style="
          max-width: 1200px;
          margin: auto;
          background: white;
          padding: 40px;
          border-radius: 15px;
          
        "
      >
        
        <div style="text-align: center; margin-bottom: 40px">
          <img
           src="https://png.pngtree.com/png-vector/20230221/ourmid/pngtree-red-dragon-logo-with-flaming-fire-color-3d-png-image_6611905.png"
            alt="Logo Carsev"
            style="width: 120px; margin-bottom: 20px"
          />
          <h1 style="font-size: 3em; color: #d35400; margin-bottom: 10px">
            Giới thiệu về <strong>Carsev</strong>
          </h1>
          <p style="font-size: 1.2em; color: #666">
            Nơi tìm kiếm và sở hữu chiếc xe hơi trong mơ của bạn.
          </p>
        </div>

        <div
          style="
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            margin-bottom: 40px;
          "
        >
          <div style="flex: 1; min-width: 300px">
            <img
              src="https://hoanghamobile.com/tin-tuc/wp-content/uploads/2024/07/anh-sieu-xe.jpg"
              alt="Showroom Carsev"
              style="
                width: 100%;
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
              "
            />
          </div>
   
          <div style="flex: 1; min-width: 300px; text-align: left">
            <h2 style="font-size: 2em; color: #d35400">Về chúng tôi</h2>
            <p style="font-size: 1.1em; color: #555; margin: 20px 0">
              Tại Carsev, chúng tôi cam kết mang đến cho bạn trải nghiệm mua xe
              hơi hoàn hảo nhất. Với đội ngũ chuyên gia giàu kinh nghiệm, chúng
              tôi luôn sẵn sàng hỗ trợ bạn trong hành trình tìm kiếm chiếc xe lý
              tưởng.
            </p>
            <ul
              style="
                list-style: none;
                padding: 0;
                margin: 20px 0;
                font-size: 1.1em;
                color: #333;
              "
            >
              <li>✔️ Nhiều dòng xe từ phổ thông đến cao cấp</li>
              <li>✔️ Cập nhật thông tin chi tiết và giá cả minh bạch</li>
              <li>✔️ Hỗ trợ mua bán xe với quy trình đơn giản</li>
            </ul>
          </div>
        </div>

       
        <div style="text-align: center; margin-bottom: 40px">
          <h2 style="font-size: 2.5em; color: #d35400">Tầm nhìn & Sứ mệnh</h2>
          <p style="font-size: 1.2em; color: #555; margin: 20px 0">
            Chúng tôi không chỉ là một nền tảng bán xe hơi mà còn là người đồng
            hành tin cậy, giúp bạn biến giấc mơ sở hữu xe hơi thành hiện thực.
            Carsev hướng đến việc trở thành một trong những thương hiệu hàng đầu
            trong lĩnh vực xe hơi tại Việt Nam.
          </p>
        </div>

      
        <div
          style="
            display: flex;
            flex-wrap: wrap;
            gap: 20px;/-strong/-heart:>:o:-((:-h justify-content: center;
          "
        >
          <img
            src="https://i0.wp.com/hintergrundbild.org/wallpaper/full/0/d/e/55054-uhd-hintergrundbilder-3840x2160-fuer-ipad.jpg?resize=1020%2C574"
            alt="Xe sang trọng"
            style="
              width: 45%;
              border-radius: 12px;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            "
          />
          <img
            src="https://i0.wp.com/himg2.huanqiu.com/attachment2010/2016/0114/17/06/20160114050624333.jpg?resize=1020%2C680"
            alt="Xe gia đình"
            style="
              width: 45%;
              border-radius: 12px;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            "
          />
        </div>

       
        <div style="margin-top: 40px; text-align: center">
          <h2 style="font-size: 2em; color: #d35400">Giá trị cốt lõi</h2>
          <p style="font-size: 1.1em; color: #555; margin: 20px 0">
            Carsev luôn đặt khách hàng làm trung tâm, cung cấp dịch vụ minh
            bạch, chất lượng và hiệu quả. Chúng tôi xây dựng niềm tin qua từng
            giao dịch và tạo dựng cộng đồng khách hàng thân thiết.
          </p>
        </div>
      </section>
    </main>
   @endsection