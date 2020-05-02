@extends('client::layout.master')
@section('client_content')

    <!-- content -->

    <section class="main-slider">
        <ul class="bxslider">
            <li>
                <div class="slider-item"><img src="<?php echo URL::to('/');  ?>/images/MA.png" title="Funky roots"/>
                    <h2><a href="#" title="Vintage-Inspired Finds for Your Home">Vintage-Inspired Finds for Your
                            Home</a></h2></div>
            </li>
            <li>
                <div class="slider-item"><img src="<?php echo URL::to('/');  ?>/images/MA.png" title="Funky roots"/>
                    <h2><a href="#" title="Vintage-Inspired Finds for Your Home">Vintage-Inspired Finds for Your
                            Home</a></h2></div>
            </li>
            <li>
                <div class="slider-item"><img src="<?php echo URL::to('/');  ?>/images/MA.png" title="Funky roots"/>
                    <h2><a href="#" title="Vintage-Inspired Finds for Your Home">Vintage-Inspired Finds for Your
                            Home</a></h2></div>
            </li>
        </ul>
    </section>
    <section>
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $new)
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="#"><img src="images/750x500-1.jpg" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2><a href="#">{{$new->title}}</a></h2>
                        <div class="post-meta"><span>by <a href="#" class="text-danger">{{$new->user_id}}</a></span>/<span><i
                                        class="fa fa-clock-o"></i>{{date_format($new->created_at,'Y-m-d') }}</span>/<span><i
                                        class="fa fa-comment-o"></i> <a href="#">343</a></span></div>
                        <p>{{$new->content}}</p>
                        <div class="read-more"><a href="#">Continue Reading</a></div>
                    </div>
                </article>
                @endforeach
                <!-- article -->
            </div>
            <div class="col-md-4 sidebar-gutter">
                <aside>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">About Us</h3>
                        <div class="widget-container widget-about">
                            <a href="#"><img src="images/author.jpg" alt=""></a>
                            <h4>Minh Anh Travel</h4>
                            <div class="author-title">Your VietNamese Friends</div>
                            <p>While everyone’s eyes are glued to the runway, it’s hard to ignore that there are major
                                fashion moments on the front row too.</p>
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">News</h3>
                        <div class="widget-container">
                            @foreach($posts as $new)
                                <article class="widget-post">
                                    <div class="post-image">
                                        <a href="#"><img src="images/90x60-1.jpg" alt=""></a>
                                    </div>
                                    <div class="post-body">
                                        <h2><a href="#">{{$new->title}}</a></h2>
                                        <div class="post-meta">
                                            <span><i class="fa fa-clock-o"></i> {{date_format($new->created_at,'Y-m-d') }}</span>
                                            <span><a
                                                        href="#"><i class="fa fa-comment-o"></i> 23</a></span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Socials</h3>
                        <div class="widget-container">


                            <div class="widget-socials">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-reddit"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Travel Service</h3>
                        <div class="widget-container">
                            <ul>
                                @foreach($categories as $cate)
                                    <li><a href="{{url('client/product/category',[$cate->id])}}">{{$cate->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>
    <script>
        var botmanWidget = {
            frameEndpoint: '/botman/chat',
            title: 'Minh Anh',
            bubbleBackground : '#ff9775',
            mainColor : '#FF9775',
            displayMessageTime : true

        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection
