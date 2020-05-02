@extends('client::layout.master')
@section('client_content')

    <!-- content -->
    <section>
        <div class="bg-default space-medium">
            <div class="container">
                <div class="testimonial-wrapper">
                    <div class="row">
                        <!-- Testimonials-one-start -->
                        @foreach($records as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="testimonial-block text-center">
                                <div class="testimonial-img"><img src="<?php echo URL::to('/'); ?>/images/testimonial-img-1.jpg" alt="Tour and Travel Agency - Responsive Website Template"></div>
                                <div class="testimonial-user-img"><img src="<?php echo URL::to('/'); ?>/images/testimonial-user-img-1.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                                <div class="testimonial-content">
                                    <h4>{{$product->name}}</h4>
                                    <span class="location">{{$product->price}}</span>
                                    <div class="rating"> <span> <i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> </div>
                                    <div>
                                        <p class="testimonial-text">{{$product->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Testimonials-one-close -->
                    </div>
                </div>
{{--                <div class="testimonial-wrapper">--}}
{{--                    <div class="row">--}}
{{--                        <!-- Testimonials-four-start -->--}}
{{--                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
{{--                            <div class="testimonial-block">--}}
{{--                                <div class="testimonial-img"><img src="images/testimonial-img-4.jpg" alt="Tour and Travel Agency - Responsive Website Template"></div>--}}
{{--                                <div class="testimonial-user-img"><img src="images/testimonial-user-img-4.jpg" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>--}}
{{--                                <div class="testimonial-content">--}}
{{--                                    <h4>Natalie Ramos</h4>--}}
{{--                                    <span class="location">Thailand</span>--}}
{{--                                    <div class="rating"> <span> <i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> </div>--}}
{{--                                    <div>--}}
{{--                                        <p class="testimonial-text">“Quisque sit amet semper nislut blandit metus estibulum thailand nibhquis pellentesque pretium diam ante gravida turpis, thank you”</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Testimonials-six-close -->--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

@endsection