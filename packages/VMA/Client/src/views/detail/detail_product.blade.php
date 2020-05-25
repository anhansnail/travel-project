@extends('client::layout.master')
@section('client_content')

    <!-- content -->
    <section>

        <div class="inner-header">
            <div class="container">
                <div class="pull-left">
                    <h1 class="inner-title">Product</h1>
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
                                <img src="assets/dest/images/products/6.jpg" alt="">
                            </div>
                            <div class="col-sm-8">
                                <div class="single-item-body">
                                    <p class="single-item-title">Sample Woman Top</p>
                                    <p class="single-item-price">
                                        <span>$34.55</span>
                                    </p>
                                </div>

                                <div class="clearfix"></div>
                                <div class="space20">&nbsp;</div>

                                <div class="single-item-desc">
                                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
                                </div>
                                <div class="space20">&nbsp;</div>

                            </div>
                        </div>

                        <div class="space40">&nbsp;</div>
                        <div class="">
                            <ul class="tabs">
                                <li><a href="#tab-description">Description</a></li>
                                <li><a href="#tab-reviews">Reviews (0)</a></li>
                            </ul>

                            <div class="panel" id="tab-description">
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                                <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
                            </div>
                            <div class="panel" id="tab-reviews">
                                <p>No Reviews</p>
                            </div>
                        </div>
                        <div class="space50">&nbsp;</div>
                    </div>
                </div>
            </div> <!-- #content -->
        </div> <!-- .container -->
    </section>

@endsection