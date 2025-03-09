@extends('layouts.master')
@section('content')
<!-- About Me Subpage -->
@if(Session::has('student_id'))
<?php $student = \App\Models\Student::find(Session::get('student_id')); ?>
<section class="pt-page pt-page-2" data-id="about_me">
    <div class="section-title-block">
      <h2 class="section-title">About Me</h2>
      <h5 class="section-description">{{ $student->role }}</h5>
    </div>
@endif

    <div class="row">
      <div class="col-sm-6 col-md-6 subpage-block">
        <div class="general-info">
          <h3>I am Web Developer/Designer @ Company.com</h3>
          <p>Proin laoreet elementum ligula, ac tincidunt lorem accumsan nec. Fusce eget urna ante. Donec massa velit, varius a accumsan ac, tempor iaculis massa. Sed placerat justo sed libero varius vulputate. Ut a mi tempus massa malesuada fermentum.</p>
          <p>Sed eleifend sed nibh nec fringilla. Donec eu cursus sem, vitae tristique ante. Cras pretium rutrum egestas. Integer ultrices libero sed justo vehicula, eget tincidunt tortor tempus. Sed tellus nibh, lobortis ut blandit sed, convallis a mauris.</p>
        </div>
      </div>

      <div class="col-sm-6 col-md-6 subpage-block">
        <div class="block-title">
          <h3>Testimonials</h3>
        </div>
        <div class="testimonials owl-carousel">
          <!-- Testimonial 2 -->
          <div class="testimonial-item">
            <!-- Testimonial Content -->
            <div class="testimonial-content">
              <div class="testimonial-text">
                <p>"Proin auctor pulvinar tellus, et venenatis ligula pharetra eu. Duis dictum nisi sed pellentesque euismod."</p>
              </div>
            </div>            
            <!-- /Testimonial Content -->  
            <!-- Testimonial Author -->
            <div class="testimonial-credits">
              <!-- Picture -->
              <div class="testimonial-picture">
                <img src="images/testimonials/testimonila_photo_2.png" alt="">
              </div>              
              <!-- /Picture -->
              <!-- Testimonial author information -->
              <div class="testimonial-author-info">
                <p class="testimonial-author">Bryan Morris</p>
                <p class="testimonial-firm">Sun Foods</p>
              </div>
            </div>
            <!-- /Testimonial author information -->               
          </div>
          <!-- End of Testimonial 2 -->

          <!-- Testimonial 2 -->
          <div class="testimonial-item" style="width:100%">
            <!-- Testimonial Content -->
            <div class="testimonial-content">
              <div class="testimonial-text">
                <p>"Vivamus porta dapibus tristique. Suspendisse et arcu eget nisi convallis eleifend nec ac lorem."</p>
              </div>
            </div>            
            <!-- /Testimonial Content -->  
            <!-- Testimonial Author -->
            <div class="testimonial-credits">
              <!-- Picture -->
              <div class="testimonial-picture">
                <img src="images/testimonials/testimonial_photo_1.png" alt="">
              </div>              
              <!-- /Picture -->
              <!-- Testimonial author information -->
              <div class="testimonial-author-info">
                <p class="testimonial-author">John Doe</p>
                <p class="testimonial-firm">Apple Inc.</p>
              </div>
            </div>
            <!-- /Testimonial author information -->               
          </div>
          <!-- End of Testimonial 2 -->
        </div>
      </div>
    </div>

    <!-- Services block -->
    <div class="block-title">
      <h3>Services</h3>
    </div>

    <div class="row">
      <div class="col-sm-6 col-md-3 subpage-block">
        <div class="service-block"> 
          <div class="service-info">
            <img src="images/service/web_design.png" alt="Responsive Design">
            <h4>Web Design</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 subpage-block">
        <div class="service-block"> 
          <div class="service-info">
            <img src="images/service/copywrite.png" alt="Copywriter">
            <h4>Copywriter</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 subpage-block">
        <div class="service-block"> 
          <div class="service-info">
            <img src="images/service/ecommerce.png" alt="E-Commerce">
            <h4>E-Commerce</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 subpage-block">
        <div class="service-block"> 
          <div class="service-info">
            <img src="images/service/management.png" alt="Management">
            <h4>Management</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Services block -->

  </section>
  <!-- End of About Me Subpage -->
  @endsection
