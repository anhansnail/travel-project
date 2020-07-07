@extends('client::layout.master')
@section('client_content')

    <!-- content -->
    <section>

        <div class="inner-header">
            <div class="container">
                <div class="pull-left">
                    <h1 class="inner-title">{{$product->name}}</h1>
                </div>
                <div class="pull-right">
                    <div class="beta-breadcrumb font-large">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="container">
            <div id="content">
                <div class="row">
                    <div class="col-sm-9">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="testimonial-img">
                                    <?php
                                    $category = app(\VMA\Admin\Model\Categorie::class)->find($product->category_id);
                                    ?>
                                    <img src="<?php
                                    if (isset($product->image)) {
                                        echo url('images/product') . '/' . $product->image;
                                    } else
                                        echo URL::to('/') . ('images/testimonial-img-1.jpg');

                                    ?>" class=""
                                         style="max-width: 360px; max-height: 150px"
                                         alt="Tour and Travel Agency - Information">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="single-item-body">
                                    <p class="">Category: {{$category->name}} </p>
                                    <p class="">
                                        Price: <span style="color: red">{{$product->price}}</span> VND
                                    </p>
                                    <p>Discount:<span style="color: #1c7430"> {{$product->discount}}</span> VND</p>
                                </div>

                            </div>
                        </div>

                        <div class="space40">&nbsp;</div>
                        <div class="">
                            <ul class="tabs">
                            </ul>

                            <div class="panel" id="tab-description">
                                <p>{{$product->description}} </p>
                            </div>
                        </div>
                        <div class="space50">&nbsp;</div>
                    </div>
                </div>
            </div> <!-- #content -->
        </div> <!-- .container -->
    </section>

@endsection