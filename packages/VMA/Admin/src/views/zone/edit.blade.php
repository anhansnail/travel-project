

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
                    <form action="{{url('zone/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $zone->id }}">
                                 <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="text" name="id" value="{{ $zone->id }}" class="form-control" id="id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" value="{{ $zone->name }}" class="form-control" id="name">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">description</label>
            <input type="text" name="description" value="{{ $zone->description }}" class="form-control" id="description">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">user_id</label>
            <input type="text" name="user_id" value="{{ $zone->user_id }}" class="form-control" id="user_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">zone_parent_id</label>
            <input type="text" name="zone_parent_id" value="{{ $zone->zone_parent_id }}" class="form-control" id="zone_parent_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" value="{{ $zone->status }}" class="form-control" id="status">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">created_at</label>
            <input type="text" name="created_at" value="{{ $zone->created_at }}" class="form-control" id="created_at">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">updated_at</label>
            <input type="text" name="updated_at" value="{{ $zone->updated_at }}" class="form-control" id="updated_at">
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
