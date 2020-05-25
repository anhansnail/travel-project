
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
                Create Post
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{url('post/store')}}" method="post" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
         <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" name="title" class="form-control" id="title">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">content</label>
            <input type="text" name="content" class="form-control" id="content">
         </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">image<b style="color: red">(*)</b></label>
                            <input type="file" name="image" class="form-control" id="image">
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
