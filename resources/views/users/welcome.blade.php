<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>ABD E-Learning</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('/css/all.css')}}">


        <!-- --------- Owl-Carousel ------------------->
        <link rel="stylesheet" href="{{asset('/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}">

        <!-- ------------ AOS Library ------------------------- -->
        <link rel="stylesheet" href="{{asset('/css/aos.css')}}">

        <!-- Custom Style   -->
        <link rel="stylesheet" href="{{asset('/css/Style.css')}}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <!------------------------ Nav bar ---------------------->
            <nav class="nav">
                <div class="nav-menu flex-row">
                    <div class="nav-brand">
                        <a href="{{ url('/') }}" class="text-gray">ABD E-Learning</a>
                    </div>
                    <div class="toggle-collapse">
                        <div class="toggle-icons">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                    <div>
                        <ul class="nav-items">
                            <li class="nav-link">
                                <a href="{{ url('/') }}">TRANG CHỦ</a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ url('/courses') }}">KHÓA HỌC</a>
                            </li>
                            <!-- <li class="nav-link">
                                <a href="{{ url('/askandanswer') }}">HỎI ĐÁP</a>
                            </li> -->
                            <li class="nav-link">
                                <a href="{{ url('/sponsored') }}">TÀI TRỢ</a>
                            </li>
                            <li class="nav-link">
                                <a href="{{ url('/contact') }}">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        @if (Route::has('login'))
                            <ul class="nav-items">
                                @auth
                                    <li class="nav-link">
                                        <a href="{{ url('/home') }}">Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-link">
                                        <a href="{{ route('login') }}">Đăng Nhập</a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li class="nav-link">
                                            <a href="{{ route('register') }}">Đăng Ký</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        @endif
                    </div>
                </div>
            </nav>
            
            <!----------------x-------- Nav bar ----------x------------>

            <main>

                <!------------------------ Site Title ---------------------->

                <section class="site-title">
                    <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                        <h1>E-Learning</h1>
                        <h2>Phát triển kĩ năng của bạn thông qua các khóa học</h2>
                        <button class="btn"><a href="/courses">HỌC NGAY</a></button>
                    </div>
                </section>

                <!------------x----------- Site Title ----------x----------->

                <!-- --------------------- Course Carousel ----------------- -->

                <section>
                    <div class="course">
                        <div class="container">
                            <div class="owl-carousel owl-theme course-post">
                                <div class="course-content" data-aos="fade-right" data-aos-delay="200">
                                    <img src="/assets/course/java.jpg" alt="post-1">
                                    <div class="course-title">
                                        <h3>Lập trình JAVA cơ bản</h3>
                                        <button class="btn btn-course">Học ngay</button>
                                      
                                    </div>
                                </div>
                                <div class="course-content" data-aos="fade-in" data-aos-delay="200">
                                    <img src="/assets/course/html.jpg" alt="post-1">
                                    <div class="course-title">
                                        <h3>Học HTML cơ bản</h3>
                                        <button class="btn btn-course">Học ngay</button>
                                       
                                    </div>
                                </div>
                                <div class="course-content" data-aos="fade-left" data-aos-delay="200">
                                    <img src="/assets/course/css.jpg" alt="post-1">
                                    <div class="course-title">
                                        <h3>Học CSS cơ bản</h3>
                                        <button class="btn btn-course">Học ngay</button>
                                       
                                    </div>
                                </div>
                                <div class="course-content" data-aos="fade-right" data-aos-delay="200">
                                    <img src="/assets/course/javascript.jpg" alt="post-1">
                                    <div class="course-title">
                                        <h3>Khóa học JAVASCRIPT cơ bản</h3>
                                        <button class="btn btn-course">Học ngay</button>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-navigation">
                                <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                                <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ----------x---------- Course Carousel --------x-------- -->

                <!-- ---------------------- Site Content -------------------------->

                <section class="container">
                    <div class="site-content">
                        <div class="posts">
                            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                                <div class="post-image">
                                    <div>
                                        <img src="/assets/Blog-post/developer.jpg" class="img" alt="blog1">
                                    </div>
                                    <div class="post-info flex-row">
                                        <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                        <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;May 14, 2020</span>
                                    </div>
                                </div>
                                <div class="post-title">
                                    <a href="#">Developer tìm việc như thế nào?</a>
                                    <p>Mình sẽ mở đầu bài viết với một câu châm ngôn của bác Martin Fowler mà mình nghĩ ai là Software Engineer cũng đều nên nhớ, "Any fool can write code that a computer can understand. Good programmers write code that humans can understand." Tạm dịch là, "Bất cứ thằng ngu nào cũng có thể …
                                    </p>
                                    <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                            <hr>
                            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                                <div class="post-image">
                                    <div>
                                        <img src="/assets/Blog-post/phpblog.png" class="img" alt="blog1">
                                    </div>
                                    <div class="post-info flex-row">
                                        <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                        <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;May 16, 2020</span>
                                    </div>
                                </div>
                                <div class="post-title">
                                    <a href="#">Lộ trình học fullstack web developer với php</a>
                                    <p>Trong bài viết này chúng ta sẽ tổng hợp tất tần tật những thứ chúng ta sẽ phải học để trở thành fullstack web dev với ngôn ngữ php
                                    </p>
                                    <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                            <hr>
                            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                                <div class="post-image">
                                    <div>
                                        <img src="/assets/Blog-post/intern.jpg" class="img" alt="blog1">
                                    </div>
                                    <div class="post-info flex-row">
                                        <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                        <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;May 14, 2020</span>
                                        
                                    </div>
                                </div>
                                <div class="post-title">
                                    <a href="#">Thực tập IT là làm gì? Có nên nhận lương hay không? Chuẩn bị gì cho kỳ thực tập?</a>
                                    <p>Thực tập là giai đoạn cực kỳ quan trọng với các bạn sinh viên, vậy cần chuẩn bị gì để có kỳ thực tập tốt?
                                    </p>
                                    <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                            <hr>
                            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                                <div class="post-image">
                                    <div>
                                        <img src="/assets/Blog-post/luong.jpeg" class="img" alt="blog1">
                                    </div>
                                    <div class="post-info flex-row">
                                        <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                        <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;May 21, 2020</span>
                                        
                                    </div>
                                </div>
                                <div class="post-title">
                                    <a href="#">Lương nhân viên IT, lập trình viên có cao không?</a>
                                    <p>Trong thời kỳ cách mạng công nghệ 4.0 lên ngôi, vai trò của công nghệ thông tin cũng ngày càng trở nên quan trọng hơn bao giờ hết. Nguồn cung nhân sự cho ngành IT đang ngày càng khan hiếm nên hiện nay có rất nhiều công ty đang có nhu cầu tuyển dụng cho vị trí này với chế độ đãi ngộ hấp dẫn
                                    </p>
                                    <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                            <div class="pagination flex-row">
                                <a href="#"><i class="fas fa-chevron-left"></i></a>
                                <a href="#" class="pages">1</a>
                                <a href="#" class="pages">2</a>
                                <a href="#" class="pages">3</a>
                                <a href="#"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <aside class="sidebar">
                            <div class="category">
                                <h2>KHÓA HỌC</h2>
                                <ul class="category-list">
                                    <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                        <a href="#">LẬP TRÌNH</a>
                                        
                                    </li>
                                    <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                                        <a href="#">IT & PHẦN MỀM</a>
                                        
                                    </li>
                                    <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                                        <a href="#">ĐỒ HỌA HÌNH ẢNH</a>
                                       
                                    </li>
                                    <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                                        <a href="#">NGOẠI NGỮ</a>
                                     
                                    </li>
                                    <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                        <a href="#">KỸ NĂNG MỀM</a>
                                       
                                    </li>
                                </ul>
                            </div>
                            <div class="popular-post">
                                <h2>BÀI VIẾT PHỔ BIẾN</h2>
                                <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                                    <div class="post-image">
                                        <div>
                                            <img src="/assets/popular-post/r.jpg" class="img" alt="blog1">
                                        </div>
                                        <div class="post-info flex-row">
                                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
                                                2019</span>
                                            
                                        </div>
                                    </div>
                                    <div class="post-title">
                                        <a href="#">Data Visualization với R</a>
                                    </div>
                                </div>
                                <div class="post-content" data-aos="flip-up" data-aos-delay="300">
                                    <div class="post-image">
                                        <div>
                                            <img src="/assets/popular-post/fontenddev.png" class="img" alt="blog1">
                                        </div>
                                        <div class="post-info flex-row">
                                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;May 14,
                                                2020</span>
                                        
                                        </div>
                                    </div>
                                    <div class="post-title">
                                        <a href="#">TRỞ THÀNH LẬP TRÌNH VIÊN FRONT-END 2020 NGHĨA LÀ GÌ?</a>
                                    </div>
                                </div>
                                <div class="post-content" data-aos="flip-up" data-aos-delay="400">
                                    <div class="post-image">
                                        <div>
                                            <img src="/assets/popular-post/data.png" class="img" alt="blog1">
                                        </div>
                                        <div class="post-info flex-row">
                                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;May 14,
                                                2020</span>
                                          
                                        </div>
                                    </div>
                                    <div class="post-title">
                                        <a href="#">TOP PHƯƠNG PHÁP PHÂN TÍCH ĐỊNH TÍNH TRONG DATA ANALYTICS</a>
                                    </div>
                                </div>
                                <div class="post-content" data-aos="flip-up" data-aos-delay="500">
                                    <div class="post-image">
                                        <div>
                                            <img src="/assets/popular-post/fontendsecurity.png" class="img" alt="blog1">
                                        </div>
                                        <div class="post-info flex-row">
                                            <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;May 14,
                                                2020</span>
                                       
                                        </div>
                                    </div>
                                    <div class="post-title">
                                        <a href="#">KỸ NĂNG BẢO MẬT CHO FRONT-END DEVELOPER</a>
                                    </div>
                                </div>
                            </div>
                            <div class="newsletter" data-aos="fade-up" data-aos-delay="300">
                                <h2>Newsletter</h2>
                                <div class="form-element">
                                    <input type="text" class="input-element" placeholder="Email">
                                    <button class="btn form-btn">Subscribe</button>
                                </div>
                            </div>
                            <div class="popular-tags">
                                <h2>Popular Tags</h2>
                                <div class="tags flex-row">
                                    <span class="tag" data-aos="flip-up" data-aos-delay="100">LẬP TRÌNH</span>
                                    <span class="tag" data-aos="flip-up" data-aos-delay="200">PHẦN MỀM</span>
                                    <span class="tag" data-aos="flip-up" data-aos-delay="300">KỸ NĂNG</span>
                                    <span class="tag" data-aos="flip-up" data-aos-delay="400">DESIGN</span>
                                    <span class="tag" data-aos="flip-up" data-aos-delay="500">THÔNG TIN</span>
                                    <span class="tag" data-aos="flip-up" data-aos-delay="600">TUYỂN DỤNG</span>
                                    <span class="tag" data-aos="flip-up" data-aos-delay="700">DỰ ÁN</span>
                                    <span class="tag" data-aos="flip-up" data-aos-delay="800">BLOG</span>
                                </div>
                            </div>
                        </aside>
                    </div>
                </section>

                <!-- -----------x---------- Site Content -------------x------------>

            </main>

            <!---------------x------------- Main Site Section ---------------x-------------->


            <!-- --------------------------- Footer ---------------------------------------- -->

            <footer class="footer">
                <div class="container">
                    <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                        <h2>About us</h2>
                        <p>Liên hệ với chúng tôi</p>
                    </div>
                    <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                        <h2>Newsletter</h2>
                        <p>Stay update with our latest</p>
                        <div class="form-element">
                            <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                        </div>
                    </div>
                    <div class="thefounders" data-aos="fade-left" data-aos-delay="200">
                        <h2>the founders</h2>
                        <div class="flex-row">
                            <img src="/assets/thefounders/thumb-card3.png" alt="thefounders1">
                            <img src="/assets/thefounders/thumb-card4.png" alt="thefounders2">
                            <img src="/assets/thefounders/thumb-card5.png" alt="thefounders3">
                        </div>
                        <div class="flex-row">
                            <img src="/assets/thefounders/thumb-card6.png" alt="thefounders4">
                            <img src="/assets/thefounders/thumb-card7.png" alt="thefounders5">
                            <img src="/assets/thefounders/thumb-card8.png" alt="thefounders6">
                        </div>
                    </div>
                    <div class="follow" data-aos="fade-left" data-aos-delay="200">
                        <h2>Follow us</h2>
                        <p>Let us be Social</p>
                        <div>
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
                <div class="rights flex-row">
                    <h4 class="text-success">
                        Copyright ©2020 All rights reserved | made by Nhom 1
                    </h4>
                </div>
                <div class="move-up">
                    <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
                </div>
            </footer>

            <!-- -------------x------------- Footer --------------------x------------------- -->

            <!-- Jquery Library file -->
            <script type="application/javascript" src="/js/Jquery3.4.1.min.js"></script>

            <!-- --------- Owl-Carousel js ------------------->
            <script type="application/javascript" src="/js/owl.carousel.min.js"></script>

            <!-- ------------ AOS js Library  ------------------------- -->
            <script type="application/javascript" src="/js/aos.js"></script>

            <!-- Custom Javascript file -->
            <script type="application/javascript" src="/js/main.js"></script>

            <!-- Scripts -->
            <!-- <script type="application/javascript" src="{{ asset('js/app.js') }}"></script> -->
        </div>
    </body>
</html>
