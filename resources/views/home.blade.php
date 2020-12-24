@extends('layouts.app')

@section('content')
   
<main id="main">

<!-- ======= Intro Section ======= -->
    <section id="intro">
        <div class="container">
            <div class="intro-text">
            <h2>مرحبا بك في عضويات كفاء</h2>
            <p>المخصصة للمنظمات الراغبة في استقطاب المتطوعين</p>
            <a href="{{route('subscription.index')}}" class="btn-get-started scrollto">تصفح العضويات</a>
            </div>

            <div class="product-screens">

            <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
                <img src="assets/img/product-screen-1.png" alt="">
            </div>

            <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
                <img src="assets/img/product-screen-2.png" alt="">
            </div>

            <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
                <img src="assets/img/product-screen-3.png" alt="">
            </div>

            </div>
        </div>
    </section>
    <!-- End Intro Section -->


    <!-- ======= About Section ======= -->
    <section id="about" class="section-bg">
        <div class="container">
            <div class="container-fluid">
                <div class="section-header">
                     <h3 class="section-title">عضويات كفاء</h3>
                        <span class="section-divider"></span>
                             <p class="section-description">
                             تم طرح العضويات والمخصصة للمنظمات الراغبة في استقطاب المتطوعين للأعمال التطوعية 
                            </p>
                </div>

                <div class="row">
                    <div class="col-lg-6 about-img wow fadeInLeft">
                        <img src="assets/img/about-img.jpg" alt="">
                    </div>

                    <div class="col-lg-6 content wow fadeInRight">
                        <h2>فئات المتطوعين</h2>
                        <h3>تقدم كفاء العديد والمزيد من الافكار التطوعية وتقديمها للمنظمات  بمختلف الفئات حسب رغبة المنظمة</h3>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End About Section -->
    <!-- ======= Featuress Section ======= -->
    <section id="features">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title">قيم كفاء</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="assets/img/product-features.png" alt="" class="wow fadeInLeft">
          </div>

          <div class="col-lg-8 col-md-7 ">

            <div class="row">

              <div class="col-lg-6 col-md-6 box wow fadeInRight">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                <h4 class="title"><a href="">التميز في الأداء</a></h4>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                <div class="icon"><i class="ion-ios-flask-outline"></i></div>
                <h4 class="title"><a href="">الشراكة</a></h4>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                <div class="icon"><i class="ion-social-buffer-outline"></i></div>
                <h4 class="title"><a href="">الشفافية</a></h4>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href="">المهنية</a></h4>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Featuress Section -->



    <!-- ======= Clients Section ======= -->
    <section id="clients">
      <div class="container">

        <div class="row wow fadeInUp">

          <div class="col-md-2">
            <img src="assets/img/clients/client-1.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-2.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-3.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-4.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-5.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="assets/img/clients/client-6.png" alt="">
          </div>

        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">العضويات</h3>
          <span class="section-divider"></span>
          <p class="section-description">حيارات أكثر حسب تطلع المنظمة</p>
        </div>

        <div class="row">

          @foreach ($members as $member)              
          <div class="col-lg-4 col-md-6">
            <div class="box wow fadeInLeft">
              <h3>{{ $member->name }}</h3>
              <h4><sup>ر.س</sup>{{ $member->price }}<span> سنويا</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i>{{ $member->description}}</li>
              </ul>
              <a href="{{ route('subscription.confirm',$member->uuid) }}" class="get-started-btn">اشتراك</a>
            </div>
          </div>
          @endforeach

          

        </div>
      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="row wow fadeInUp">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>كفاء</h3>
              <p>"كِفاء" هي منصة تطوعية تساعد الباحث عن الاعمال التطوعية بالوصول إلى المنظمة
                التطوعية في خطوة واحدة.</p>

            </div>  
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>الرياض<br> المملكة العربية السعودية</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>halmalki.ste@outlook.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p dir="ltr">+966 59 696 6667</p>
              </div>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection

