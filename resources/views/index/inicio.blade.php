@extends('layout.template')
 @section('cuerpoInterno')
  <!-- Full Width Slider -->
      <div class="container-fluid mb-3">
        <div class="row">
          <div class="owl-carousel owl-theme home-slider">
            <div class="owl-cover" data-src="{{asset('plantilla/images/slider/1.jpg')}}" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="450px">
            </div>
          </div>
        </div>
      </div>
@endsection