

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
                    <form action="{{url('contact/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                                 <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="text" name="id" value="{{ $contact->id }}" class="form-control" id="id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">email</label>
            <input type="text" name="email" value="{{ $contact->email }}" class="form-control" id="email">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">phone</label>
            <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control" id="phone">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">content</label>
            <input type="text" name="content" value="{{ $contact->content }}" class="form-control" id="content">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">created_at</label>
            <input type="text" name="created_at" value="{{ $contact->created_at }}" class="form-control" id="created_at">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">updated_at</label>
            <input type="text" name="updated_at" value="{{ $contact->updated_at }}" class="form-control" id="updated_at">
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
