@extends('client::layout.master')
@section('client_content')

    <!-- content -->

    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!-- contact info start -->
                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-block">
                        <h1>Contact info</h1>
                        <div class="contact-info">
                            <div class=" mb30">
                                <div class="contact-icon"><i class="fa fa-map-marker"></i></div>
                                <div class="mt30">
                                    <h5 class="contact-title">Address</h5>
                                    <span> 19/14 Group 12,Sub-district Thach Ban,Long Bien District</span>
                                </div>
                            </div>
                            <div class=" mb30">
                                <div class="contact-icon"><i class="fa fa-phone"></i></div>
                                <div class="mt30">
                                    <h5 class="contact-title">Phone Numbers</h5>
                                    <span> (+84)(0)97 141 2630 /
                (+84)(0)97 394 5812</span></div>
                            </div>
                            <div class="mb30">
                                <div class="contact-icon"><i class="fa fa-envelope"></i></div>
                                <div class="mt30">
                                    <h5 class="contact-title">Email Address</h5>
                                    <span>vuongminhanhsnail@gmail.com</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contact info close -->
                <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h1>Get In Touch With Us</h1>
                    <p>Get in touch with us through the contact info below the given.</p>
                    <!-- contact form start -->
                    <div class="row">
                        <form action="{{url('/client/contact')}}" method="post" role="form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="phone">Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="subject">Subject</label>
                                    <input id="subject" name="subject" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="textarea">Message</label>
                                    <textarea class="form-control" id="textarea" name="content" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" type="submit">Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- contact form close -->
            </div>
        </div>
    </div>

@endsection