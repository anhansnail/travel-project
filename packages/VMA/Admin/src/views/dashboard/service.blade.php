@extends('user::layout.master')
<!--index.blade.php-->
@section('css')
    <!--<link href="{{getThemeUrl()}}bs3/css/custom.css" rel="stylesheet">-->
@endsection

@section('js_lib')
@endsection

@section('js_script')
@endsection


@section('content')
    <!-- page start-->
    <!-- page start-->

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
Service Dashboard
                </header>
                <div class="panel-body">
                    <div class="table">
                    </div>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <div>
                                <p>Total:</p><span>{{$total}}</span><br>
                                <p>Products Booked:</p><span>{{$booked}}</span><br>
                            </div>
                        </table>
                    </section>
                </div>
            </section>

        </div>
    </div>






    <!-- page end-->
    </section>
    </section>

@endsection
