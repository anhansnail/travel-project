
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
                Create Booking
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{url('booking/store')}}" method="post" role="form">
                        {{ csrf_field() }}
                                 <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="text" name="id" class="form-control" id="id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">product_id</label>
            <input type="text" name="product_id" class="form-control" id="product_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">customer_name</label>
            <input type="text" name="customer_name" class="form-control" id="customer_name">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">customer_email</label>
            <input type="text" name="customer_email" class="form-control" id="customer_email">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">customer_phone</label>
            <input type="text" name="customer_phone" class="form-control" id="customer_phone">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">people</label>
            <input type="text" name="people" class="form-control" id="people">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">note</label>
            <input type="text" name="note" class="form-control" id="note">
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
