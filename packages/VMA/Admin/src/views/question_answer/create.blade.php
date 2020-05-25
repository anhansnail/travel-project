@extends('user::layout.master')
<!--create.blade.php-->
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
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Question_answer
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form action="{{url('question_answer/store')}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">question</label>
                                <input type="text" name="question" class="form-control" id="question">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">answer</label>
                                <input type="text" name="answer" class="form-control" id="answer">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">status</label>
                                <input type="text" name="status" class="form-control" id="status">
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
