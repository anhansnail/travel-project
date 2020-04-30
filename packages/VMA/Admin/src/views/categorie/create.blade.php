
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
                Create Categorie
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{url('categorie/store')}}" method="post" role="form">
                        {{ csrf_field() }}
                                 <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="text" name="id" class="form-control" id="id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" class="form-control" id="name">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">user_id</label>
            <input type="text" name="user_id" class="form-control" id="user_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">description</label>
            <input type="text" name="description" class="form-control" id="description">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" class="form-control" id="status">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">created_at</label>
            <input type="text" name="created_at" class="form-control" id="created_at">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">updated_at</label>
            <input type="text" name="updated_at" class="form-control" id="updated_at">
         </div>

                        <!-- <div class="form-group">
                             <label for="exampleInputFile">File input</label>
                             <input type="file" id="exampleInputFile">
                             <p class="help-block">Example block-level help text here.</p>
                         </div>
                         <div class="checkbox">
                             <label>
                                 <input type="checkbox"> Check me out
                             </label>
                         </div>-->
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>

@endsection
