@extends('client::layout.master')
@section('client_content')

    <!-- content -->
    <section>

        <div class="inner-header">
            <div class="container">
                <div class="pull-left">
                    <h1 class="inner-title">{{$post->title}}</h1>
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

                                    <img src="<?php
                                    if (isset($post->image)) {
                                        echo url('images/product') . '/' . $post->image;
                                    } else
                                        echo URL::to('/') . ('images/testimonial-img-1.jpg');

                                    ?>" class=""
                                         style="max-width: 360px; max-height: 150px"
                                         alt="Tour and Travel Agency - Information">
                                </div>
                            </div>
                            <div class="col-sm-8">
                            </div>
                        </div>

                        <div class="space40">&nbsp;</div>
                        <div class="">
                            <ul class="tabs">
                                 </ul>

                            <div class="panel" id="tab-description">
                                <p>{{$post->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- #content -->
        </div> <!-- .container -->
    </section>
@endsection