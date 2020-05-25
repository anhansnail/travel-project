@extends('client::layout.master')
@section('client_content')

    <!-- content -->
    <section>
        <div class="table">
            <form action="{{route('client.product')}}" class="">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <input class="form-control" placeholder="name" type="text" name="name"
                               value="@if(isset($dataSearch['name'])){{$dataSearch['name']}}@endif" style="color: #0f0f0f">
                    </div>
                    <div class="col-md-3 form-group">
                        <input class="form-control" placeholder="price" type="text" name="price"
                               value="@if(isset($dataSearch['price'])){{$dataSearch['price']}}@endif" style="color: #0f0f0f">
                    </div>

                    @if($id_category == 'all')
                        <?php
                        $category = \VMA\Admin\Model\Categorie::all();
                        ?>
                        <div class="form-group col-md-3">
                            <select name="category_id" class="form-control" id="category_id" style="color: #0f0f0f">
                                <option value="">{{__('--Category--')}}</option>
                                @foreach($category as $cate)
                                    @if(isset($dataSearch['category_id']) && $dataSearch['category_id'] == (string)$cate->id)
                                        <option value="{{$cate->id}}" selected>{{$cate->name}}</option>
                                    @else
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="col-md-3 form-group">
                        <input type="submit" class="btn btn-success" value="Search">
                    </div>
                </div>
            </form>
        </div>
        <div class="bg-default space-medium">
            <div class="container">
                <div class="testimonial-wrapper">
                    <div class="row">
                        <!-- Testimonials-one-start -->
                        @foreach($records as $product)
                            <?php
                            $category = app(\VMA\Admin\Model\Categorie::class)->find($product->category_id);
                            ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="testimonial-block text-center">
                                <div class="testimonial-img">

                                    <img src="<?php
                                    if (isset($product->image)) {
                                        echo url('images/product') . '/' . $product->image;
                                    } else
                                        echo URL::to('/') . ('images/testimonial-img-1.jpg');

                                    ?>" class=""
                                         style="max-width: 360px; max-height: 150px"
                                         alt="Tour and Travel Agency - Information">
                                </div>

                                <div class="testimonial-content">
                                    <h4>{{$product->name}}</h4>
                                    <span class="location">{{$product->price}}</span>
                                    {{--                                    <div class="rating"> <span> <i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> </div>--}}
                                    <div class="rating">
                                        <span>{{$category->name}}</span>
                                    </div>
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