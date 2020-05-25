@extends('client::layout.master')
@section('client_content')

    <!-- content -->
    <section>
        <div class="table">
        </div>
        <div class="bg-default space-medium">
            <div class="container">
                <div class="testimonial-wrapper">
                    <div class="row">
                        <!-- Testimonials-one-start -->
                        @foreach($records as $post)
                            <?php
                            $user = \VMA\User\Model\User::find($post->user_id);
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="testimonial-block text-center">
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
                                    <h2><a href="#">{{$post->title}}</a></h2>
                                    <div class="post-meta">
                                        <span>by<a href="#" class="text-danger">{{$post->user_id}}</a>
                                        </span>/
                                        <span>{{date('d/m/Y', strtotime($post->created_at))}}</span>/<span><i
                                                    class="fa fa-comment-o"></i> <a href="#">343</a></span></div>
                                    <div class="testimonial-content">
                                        <h4>{{$post->tittle}}</h4>
                                        <div class="rating">
                                        </div>
                                        <div>
                                            <p class="testimonial-text">{{str_limit($post->content,100)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- Testimonials-one-close -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection