

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
                    <form action="{{url('question_answer/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $question_answer->id }}">
                                 <div class="form-group">
            <label for="exampleInputEmail1">id</label>
            <input type="text" name="id" value="{{ $question_answer->id }}" class="form-control" id="id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">question</label>
            <input type="text" name="question" value="{{ $question_answer->question }}" class="form-control" id="question">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">answer</label>
            <input type="text" name="answer" value="{{ $question_answer->answer }}" class="form-control" id="answer">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">user_id</label>
            <input type="text" name="user_id" value="{{ $question_answer->user_id }}" class="form-control" id="user_id">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">status</label>
            <input type="text" name="status" value="{{ $question_answer->status }}" class="form-control" id="status">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">created_at</label>
            <input type="text" name="created_at" value="{{ $question_answer->created_at }}" class="form-control" id="created_at">
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">updated_at</label>
            <input type="text" name="updated_at" value="{{ $question_answer->updated_at }}" class="form-control" id="updated_at">
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
