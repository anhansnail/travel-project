
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
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">name<b style="color: red">(*)</b></label>
            <input type="text" name="name" class="form-control" id="name" required>
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">user_id<b style="color: red">(*)</b></label>
            <input type="text" name="user_id" class="form-control" id="user_id" required>
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">description<b style="color: red">(*)</b></label>
            <input type="text" name="description" class="form-control" id="description" required>
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status<b style="color: red">(*)</b></label>
            <input type="text" name="status" class="form-control" id="status" required>
         </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>

@endsection
