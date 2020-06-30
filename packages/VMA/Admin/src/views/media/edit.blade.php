

@extends('user::layout.master')
<!--edit.blade.php-->
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
                Basic Forms
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{url('media/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $media->id }}">

         <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" name="title" value="{{ $media->title }}" class="form-control" id="title">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">url</label>
            <input type="text" name="url" value="{{ $media->url }}" class="form-control" id="url">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">code</label>
            <input type="text" name="code" value="{{ $media->code }}" class="form-control" id="code">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">user_id</label>
            <input type="text" name="user_id" value="{{ $media->user_id }}" class="form-control" id="user_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" value="{{ $media->status }}" class="form-control" id="status">
         </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>






<!-- page end-->
</section>
</section>

@endsection
