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
                    Create User
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form action="{{url('user/store')}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">role_id</label>
                                <input type="text" name="role_id" class="form-control" id="role_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">email</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">password</label>
                                <input type="text" name="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">facebook_id</label>
                                <input type="text" name="facebook_id" class="form-control" id="facebook_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">facebook_token</label>
                                <input type="text" name="facebook_token" class="form-control" id="facebook_token">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">facebook_token_expire_time</label>
                                <input type="text" name="facebook_token_expire_time" class="form-control"
                                       id="facebook_token_expire_time">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">avatar</label>
                                <input type="text" name="avatar" class="form-control" id="avatar">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">parent_id</label>
                                <input type="text" name="parent_id" class="form-control" id="parent_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">status</label>
                                <input type="text" name="status" class="form-control" id="status">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">remember_token</label>
                                <input type="text" name="remember_token" class="form-control" id="remember_token">
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
