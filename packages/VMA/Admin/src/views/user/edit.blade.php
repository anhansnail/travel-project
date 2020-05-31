

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
                    <form action="{{url('user/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                                 <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="text" name="id" value="{{ $user->id }}" class="form-control" id="id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">role_id</label>
            <input type="text" name="role_id" value="{{ $user->role_id }}" class="form-control" id="role_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">email</label>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="email">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">password</label>
            <input type="text" name="password" value="{{ $user->password }}" class="form-control" id="password">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">facebook_id</label>
            <input type="text" name="facebook_id" value="{{ $user->facebook_id }}" class="form-control" id="facebook_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">facebook_token</label>
            <input type="text" name="facebook_token" value="{{ $user->facebook_token }}" class="form-control" id="facebook_token">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">facebook_token_expire_time</label>
            <input type="text" name="facebook_token_expire_time" value="{{ $user->facebook_token_expire_time }}" class="form-control" id="facebook_token_expire_time">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">avatar</label>
            <input type="text" name="avatar" value="{{ $user->avatar }}" class="form-control" id="avatar">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">parent_id</label>
            <input type="text" name="parent_id" value="{{ $user->parent_id }}" class="form-control" id="parent_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" value="{{ $user->status }}" class="form-control" id="status">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">remember_token</label>
            <input type="text" name="remember_token" value="{{ $user->remember_token }}" class="form-control" id="remember_token">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">created_at</label>
            <input type="text" name="created_at" value="{{ $user->created_at }}" class="form-control" id="created_at">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">updated_at</label>
            <input type="text" name="updated_at" value="{{ $user->updated_at }}" class="form-control" id="updated_at">
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
