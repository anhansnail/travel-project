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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <a href="{{url('product/create')}}" class="btn btn-primary">Thêm mới</a>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Products table
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <div class="table">
                        <form action="{{url('product/search')}}">
                            <input class="" placeholder="search" type="text" name="q">
                            <input type="submit" value="Tìm Kiếm">
                        </form>

                    </div>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>category_id</th>
                                <th>description</th>
                                <th>image</th>
                                <th>price</th>
                                <th>discount</th>
                                <th>status</th>
                                <th>created_at</th>
                                <th>updated_at</th>
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
                                <td>{{$record->id}}</td>
                                <td>{{$record->name}}</td>
                                <td>{{$record->category_id}}</td>
                                <td>{{str_limit($record->description,100)}}</td>
                                <td>
                                <img src="<?php echo url('images/product').'/'.$record->image; ?>" class="" style="max-width: 150px;">
                                </td>
                                <td>{{$record->price}}</td>
                                <td>{{$record->discount}}</td>
                                <td>{{$record->status}}</td>
                                <td>{{$record->created_at}}</td>
                                <td>{{$record->updated_at}}</td>

                                <td>
                                    <a href="{{url('product/edit',['id'=>$record->id])}}">Edit</a>
                                    <a href="{{url('product/delete',['id'=>$record->id])}}">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>

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
