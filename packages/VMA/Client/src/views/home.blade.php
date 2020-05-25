@extends('client::layout.master')
@section('client_css')
    <!-- Botman library - chatbot -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">

@endsection
@section('client_content')

    <!-- content -->
    <script>
        $('.bxslider').bxSlider({
            pause: 3000
        });
    </script>
    <section class="main-slider">
        <ul class="bxslider">
            @foreach($slides as $slide)
                <li>
                    <div class="slider-item">
                        <img src="<?php echo url('images/media/slide').'/'.$slide->url; ?>" title="{{$slide->title}}" class="" style="width: 1140px;height: 500px">
                        <h2><a href="#" title="Vintage-Inspired Finds for Your Home">{{$slide->title}}</a></h2></div>
                </li>
                @endforeach

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
                                        class="fa fa-clock-o"></i>{{date('d/m/Y', strtotime($new->created_at))}}</span>/<span><i
                                        class="fa fa-comment-o"></i> <a href="#">343</a></span></div>
                        <p>{{str_limit($new->content,100)}} &raquo;</p>
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
                                            <span><i class="fa fa-clock-o"></i> {{date('d/m/Y', strtotime($new->created_at))}}</span>
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
            bubbleBackground: '#589442',
            mainColor: '#589442',
            displayMessageTime: true,
            // backgroundImage : false
        };
    </script>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    {{--Botman chatbot--}}

    {{--    <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script>--}}
@endsection
