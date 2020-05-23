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
                    Create Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form action="{{url('product/store')}}" method="post" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">name<b style="color: red">(*)</b></label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">category_id</label>
                                <input type="text" name="category_id" class="form-control" id="category_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">description</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">image<b style="color: red">(*)</b></label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">price</label>
                                <input type="text" name="price" class="form-control" id="price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">discount</label>
                                <input type="text" name="discount" class="form-control" id="discount">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">status</label>
                                <input type="text" name="status" class="form-control" id="status">
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
