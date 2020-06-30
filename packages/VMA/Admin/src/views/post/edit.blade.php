

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
                    <form action="{{url('post/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $post->id }}">

         <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">content</label>
            <input type="text" name="content" value="{{ $post->content }}" class="form-control" id="content">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">image</label>
            <input type="text" name="image" value="{{ $post->image }}" class="form-control" id="image">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">user_id</label>
            <input type="text" name="user_id" value="{{ $post->user_id }}" class="form-control" id="user_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" value="{{ $post->status }}" class="form-control" id="status">
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
