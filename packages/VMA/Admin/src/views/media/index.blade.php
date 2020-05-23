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
                <a href="{{url('media/create')}}" class="btn btn-primary">Thêm mới</a>
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
                Medias table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
            </header>
            <div class="panel-body">
                <div class="table">
                    <form action="{{url('media/search')}}">
                        <input class="" placeholder="search" type="text" name="q">
                        <input type="submit" value="Tìm Kiếm">
                    </form>

                </div>
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                                    <th>id</th>        <th>title</th>        <th>url</th>        <th>code</th>        <th>user_id</th>        <th>status</th>        <th>created_at</th>        <th>updated_at</th>
                            <th>Action</th>
                            <!--<th class="numeric">Price</th>
                            <th class="numeric">Change</th>
                            <th class="numeric">Change %</th>
                            <th class="numeric">Open</th>
                            <th class="numeric">High</th>
                            <th class="numeric">Low</th>
                            <th class="numeric">Volume</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($records as $record){ ?>
                            <tr>
                                         <td>{{$record->id}}</td>         <td>{{$record->title}}</td>         <td>{{$record->url}}</td>         <td>{{$record->code}}</td>         <td>{{$record->user_id}}</td>         <td>{{$record->status}}</td>         <td>{{$record->created_at}}</td>         <td>{{$record->updated_at}}</td>

                                <td>
                                    <a href="{{url('media/edit',['id'=>$record->id])}}">Edit</a>
                                    <a href="{{url('media/delete',['id'=>$record->id])}}">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>


                        <!-- <tr>
                             <td>AGO</td>
                             <td>ATLAS IRON LIMITED</td>
                             <td class="numeric">$3.17</td>
                             <td class="numeric">-0.02</td>
                             <td class="numeric">-0.47%</td>
                             <td class="numeric">$3.11</td>
                             <td class="numeric">$3.22</td>
                             <td class="numeric">$3.10</td>
                             <td class="numeric">5,416,303</td>
                         </tr>-->
                        </tbody>
                    </table>
                </section>
                {{ $records->appends(Request::only('q'))->links() }}
            </div>
        </section>

    </div>
</div>






<!-- page end-->
</section>
</section>

@endsection
