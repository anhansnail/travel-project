

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
                    <form action="{{url('product/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                                 <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="text" name="id" value="{{ $product->id }}" class="form-control" id="id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">category_id</label>
            <input type="text" name="category_id" value="{{ $product->category_id }}" class="form-control" id="category_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">description</label>
            <input type="text" name="description" value="{{ $product->description }}" class="form-control" id="description">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">image</label>
            <input type="text" name="image" value="{{ $product->image }}" class="form-control" id="image">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">price</label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="price">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">discount</label>
            <input type="text" name="discount" value="{{ $product->discount }}" class="form-control" id="discount">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" value="{{ $product->status }}" class="form-control" id="status">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">created_at</label>
            <input type="text" name="created_at" value="{{ $product->created_at }}" class="form-control" id="created_at">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">updated_at</label>
            <input type="text" name="updated_at" value="{{ $product->updated_at }}" class="form-control" id="updated_at">
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
