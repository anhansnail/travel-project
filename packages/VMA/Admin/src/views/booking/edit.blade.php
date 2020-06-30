

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
                    <form action="{{url('booking/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $booking->id }}">

         <div class="form-group">
            <label for="exampleInputEmail1">product_id</label>
            <input type="text" name="product_id" value="{{ $booking->product_id }}" class="form-control" id="product_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">customer_name</label>
            <input type="text" name="customer_name" value="{{ $booking->customer_name }}" class="form-control" id="customer_name">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">customer_email</label>
            <input type="text" name="customer_email" value="{{ $booking->customer_email }}" class="form-control" id="customer_email">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">customer_phone</label>
            <input type="text" name="customer_phone" value="{{ $booking->customer_phone }}" class="form-control" id="customer_phone">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">people</label>
            <input type="text" name="people" value="{{ $booking->people }}" class="form-control" id="people">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">note</label>
            <input type="text" name="note" value="{{ $booking->note }}" class="form-control" id="note">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" value="{{ $booking->status }}" class="form-control" id="status">
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
