@extends('dashboards.users.baru.template')
@section('home','active')
@section('isi')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 align-self-center">
                  <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                    <h6>Welcome to TK Darma Wanita</h6>
                    <h2>Taman <em>Bermain</em> &amp; <span>Pendidikan</span> </h2>
                    <p>Buah hati yang pintar adalah dambaan semua orang tua.</p>
                   
                
                        <div class="main-blue-button">
                          <a href="{{ url('/user/registerChild1') }}">Daftarkan sekarang</a>
                        </div>
                  
                
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{ asset('frontend/assets/images/header-img.png') }}" alt="team meeting">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div id="about" class="about-us section">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <img src="{{ asset('frontend/assets/images/about-left-image.png') }}" alt="person graphic">
              </div>
            </div>
            <div class="col-lg-8 align-self-center">
              <div class="services">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                      <div class="right-text">
                        <h4>Kenapa Harus Kita ?</h4>
                        <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                      <div class="icon">
                        <img src="{{ asset('frontend/assets/images/service-icon-02.png') }}" alt="">
                      </div>
                      <div class="right-text">
                        <h4>Harga</h4>
                        <p>Harga terjangkau dengan kualitas yang terjamin dan berkualitas</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                      <div class="icon">
                        <img src="{{ asset('frontend/assets/images/service-icon-03.png') }}" alt="">
                      </div>
                      <div class="right-text">
                        <h4>Pelayanan</h4>
                        <p>Pelayanan terjamin, dengan pelayan-pelayan profesional </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                   
                  </div>
                  <div class="col-lg-8">
                      <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                        <div class="icon">
                          <img src="{{ asset('frontend/assets/images/service-icon-04.png') }}" alt="">
                        </div>
                        <div class="right-text">
                          <h4>Metode Pembelajaran</h4>
                          <p>Menggunakan metode pembelajaran terbaru dan mengikuti perkembangan zaman</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div id="services" class="our-services section">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
              <div class="left-image">
                <img src="{{ asset('frontend/assets/images/services-left-image.png') }}" alt="">
              </div>
            </div>
            <div class="col-lg-7 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
              <div class="section-heading">
                <h2>Tentang Kami <em>DARMA </em> <span>WANITA</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eius quod reprehenderit ullam, ducimus consectetur cumque libero rem dicta est ipsam a eveniet quis ex velit deleniti architecto illum voluptatibus.</p>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="first-bar progress-skill-bar">
                    <h4>Pendidikan</h4>
                    <span>84%</span>
                    <div class="filled-bar"></div>
                    <div class="full-bar"></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="second-bar progress-skill-bar">
                    <h4>Pelayanan</h4>
                    <span>88%</span>
                    <div class="filled-bar"></div>
                    <div class="full-bar"></div>
                  </div>
                </div>
                <!-- <div class="col-lg-12">
                  <div class="third-bar progress-skill-bar">
                    <h4>Page Optimizations</h4>
                    <span>94%</span>
                    <div class="filled-bar"></div>
                    <div class="full-bar"></div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- <div id="portfolio" class="our-portfolio section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <h2>See What Our Agency <em>Offers</em> &amp; What We <span>Provide</span></h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <a href="#">
                <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="hidden-content">
                    <h4>SEO Analysis</h4>
                    <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                  </div>
                  <div class="showed-content">
                    <img src="assets/images/portfolio-image.png" alt="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-sm-6">
              <a href="#">
                <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                  <div class="hidden-content">
                    <h4>Website Reporting</h4>
                    <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                  </div>
                  <div class="showed-content">
                    <img src="assets/images/portfolio-image.png" alt="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-sm-6">
              <a href="#">
                <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="hidden-content">
                    <h4>Performance Tests</h4>
                    <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                  </div>
                  <div class="showed-content">
                    <img src="assets/images/portfolio-image.png" alt="">
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-sm-6">
              <a href="#">
                <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                  <div class="hidden-content">
                    <h4>Data Analysis</h4>
                    <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                  </div>
                  <div class="showed-content">
                    <img src="assets/images/portfolio-image.png" alt="">
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div> -->
    
      <!-- <div id="blog" class="our-blog section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
              <div class="section-heading">
                <h2>Check Out What Is <em>Trending</em> In Our Latest <span>News</span></h2>
              </div>
            </div>
            <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
              <div class="top-dec">
                <img src="assets/images/blog-dec.png" alt="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
              <div class="left-image">
                <a href="#"><img src="assets/images/big-blog-thumb.jpg" alt="Workspace Desktop"></a>
                <div class="info">
                  <div class="inner-content">
                    <ul>
                      <li><i class="fa fa-calendar"></i> 24 Mar 2021</li>
                      <li><i class="fa fa-users"></i> TemplateMo</li>
                      <li><i class="fa fa-folder"></i> Branding</li>
                    </ul>
                    <a href="#"><h4>SEO Agency &amp; Digital Marketing</h4></a>
                    <p>Lorem ipsum dolor sit amet, consectetur and sed doer ket eismod tempor incididunt ut labore et dolore magna...</p>
                    <div class="main-blue-button">
                      <a href="#">Discover More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
              <div class="right-list">
                <ul>
                  <li>
                    <div class="left-content align-self-center">
                      <span><i class="fa fa-calendar"></i> 18 Mar 2021</span>
                      <a href="#"><h4>New Websites &amp; Backlinks</h4></a>
                      <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                    </div>
                    <div class="right-image">
                      <a href="#"><img src="assets/images/blog-thumb-01.jpg" alt=""></a>
                    </div>
                  </li>
                  <li>
                    <div class="left-content align-self-center">
                      <span><i class="fa fa-calendar"></i> 14 Mar 2021</span>
                      <a href="#"><h4>SEO Analysis &amp; Content Ideas</h4></a>
                      <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                    </div>
                    <div class="right-image">
                      <a href="#"><img src="assets/images/blog-thumb-01.jpg" alt=""></a>
                    </div>
                  </li>
                  <li>
                    <div class="left-content align-self-center">
                      <span><i class="fa fa-calendar"></i> 06 Mar 2021</span>
                      <a href="#"><h4>SEO Tips &amp; Digital Marketing</h4></a>
                      <p>Lorem ipsum dolor sit amsecteturii and sed doer ket eismod...</p>
                    </div>
                    <div class="right-image">
                      <a href="#"><img src="assets/images/blog-thumb-01.jpg" alt=""></a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    
      <div id="contact" class="contact-us section">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
              <div class="section-heading">
                <h2>
                    Jangan Ragu Untuk Mengirim Pesan Kepada Kami Tentang Kebutuhan Anak anda</h2>
               
                <div class="phone-info">
                  <h4>Untuk pertanyaan apa pun, Hubungi kami: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
                </div>
              </div>
            </div>
            <div class="col-lg-4 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <img src="{{ asset('frontend/assets/images/kontak.png') }}" alt="team meeting">
                
            </div>
          </div>
        </div>
      </div>
@endsection