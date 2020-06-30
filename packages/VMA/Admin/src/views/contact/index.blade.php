@extends('user::layout.master')
<!--index.blade.php-->
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
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body">
<!--                <button type="button" class="btn btn-default">Default</button>-->
                <a href="{{url('contact/create')}}" class="btn btn-primary">Thêm mới</a>
<!--                <button type="button" class="btn btn-success">Success</button>-->
<!--                <button type="button" class="btn btn-info">Info</button>-->
<!--                <button type="button" class="btn btn-warning">Warning</button>-->
<!--                <button type="button" class="btn btn-danger">Danger</button>-->
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Contacts table

            </header>
            <div class="panel-body">
                <div class="table">
                    <form action="{{url('contact/search')}}">
                        <input class="" placeholder="search" type="text" name="q">
                        <input type="submit" value="Tìm Kiếm">
                    </form>

                </div>
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>content</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($records as $record){ ?>
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{{$record->email}}</td>
                                <td>{{$record->phone}}</td>
                                <td>{{$record->content}}</td>
                                <td>{{$record->created_at}}</td>
                                <td>{{$record->updated_at}}</td>

                                <td>
                                    <a href="{{url('contact/edit',['id'=>$record->id])}}">Edit</a>
                                    <a href="{{url('contact/delete',['id'=>$record->id])}}">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                </section>
                {{--                {{ $records->links() }}--}}
                {{ $records->appends(Request::only('q'))->links() }}
            </div>
        </section>

    </div>
</div>






<!-- page end-->
</section>
</section>

@endsection
