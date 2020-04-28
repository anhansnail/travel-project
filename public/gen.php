<?php
/**
 * Created by JetBrains PhpStorm.
 * User: maconline
 * Date: 9/7/17
 * Time: 9:31 PM
 * To change this template use File | Settings | File Templates.
 */

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=staging", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$q = 'SHOW TABLES';
//$stmt = $conn->prepare($q);
$stmt = $conn->query($q);
$list_tables=$stmt->fetchAll();;

?>
Chọn Bảng:
<form>
    <select name="table">
        <?php foreach ($list_tables as $key => $table){ ?>
            <option value="<?php echo $table[0]?>"><?php echo $table[0]?></option>
        <?php } ?>
    </select>
    <input type="submit">
</form>

<?php
if(isset($_GET['table'])){
    $table=$_GET['table'];
    $namespace='Longtt\\B2s';
    $view='b2s';
    if (substr($table, -1) == 's')
    {
        $table_without_s = substr($table, 0, -1);
    }else{
        $table_without_s=$table;
    }
    $table_upper_without_s = ucfirst($table_without_s);
    /*echo "<pre>";
    var_dump($table_upper_without_s);
    echo "</pre>";exit;*/

    $q = 'DESCRIBE '.$table;
    $stmt = $conn->query($q);
    $list_columns=$stmt->fetchAll();;
    $string_input='';
    $string_input_edit='';
    $string_input_controller='';
    $string_input_index='';
    $string_input_index1='';
    $string_input_search='';
    foreach($list_columns as $key => $column){
        $field=$column['Field'];
        $str=<<<EOD
         <div class="form-group">
            <label for="exampleInputEmail1">$field</label>
            <input type="text" name="$field" class="form-control" id="$field">
         </div>

EOD;

        $str2=<<<EOD
         <div class="form-group">
            <label for="exampleInputEmail1">$field</label>
            <input type="text" name="$field" value="{{ \${$table_without_s}->${field} }}" class="form-control" id="$field">
         </div>

EOD;
        $str3=<<<EOD
        \$model->$field=\$request->input("$field");

EOD;
        $str4=<<<EOD
        <th>$field</th>
EOD;
        $str5=<<<EOD
         <td>{{\$record->$field}}</td>
EOD;
        $str6=<<<EOD
         ->orWhere('$field', 'LIKE', "%\$query%")

EOD;

        $string_input.=$str;
        $string_input_edit.=$str2;
        $string_input_controller.=$str3;
        $string_input_index.=$str4;
        $string_input_index1.=$str5;
        $string_input_search.=$str6;
    }


    $string_create_view=<<<EOD

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
                Create {$table_upper_without_s}
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{url('$table_without_s/store')}}" method="post" role="form">
                        {{ csrf_field() }}
                        $string_input
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

EOD;



    $string_edit_view=<<<EOD


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
                    <form action="{{url('$table_without_s/update')}}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ \${$table_without_s}->id }}">
                        $string_input_edit
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

EOD;

    $string_index_view=<<<EOD
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
                <a href="{{url('$table_without_s/create')}}" class="btn btn-primary">Thêm mới</a>
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
                {$table_upper_without_s}s table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
            </header>
            <div class="panel-body">
                <div class="table">
                    <form action="{{url('$table_without_s/search')}}">
                        <input class="" placeholder="search" type="text" name="q">
                        <input type="submit" value="Tìm Kiếm">
                    </form>

                </div>
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            $string_input_index
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
                        <?php foreach(\$records as \$record){ ?>
                            <tr>
                                $string_input_index1

                                <td>
                                    <a href="{{url('$table_without_s/edit',['id'=>\$record->id])}}">Edit</a>
                                    <a href="{{url('$table_without_s/delete',['id'=>\$record->id])}}">Delete</a>
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
                {{ \$records->appends(Request::only('q'))->links() }}
            </div>
        </section>

    </div>
</div>






<!-- page end-->
</section>
</section>

@endsection

EOD;


    $string_model=<<<EOD
<?php
/**
 * Created by PhpStorm.
 * $view: long
 * Date: 2/7/17
 * Time: 4:23 PM
 */
namespace $namespace\Model;

use Illuminate\Database\Eloquent\Model;

class $table_upper_without_s extends Model {

}
EOD;

    $string_create_controller=<<<EOD
<?php
namespace $namespace\Controllers\\$table_upper_without_s;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use $namespace\Model\\$table_upper_without_s;


class CreateController extends Controller
{

    public function index()
    {
        \${$table}={$table_upper_without_s}::all();
        return view('$view::{$table_without_s}.create',["{$table}"=>\${$table}]);

    }

}

EOD;

    $string_delete_controller=<<<EOD
<?php
namespace $namespace\Controllers\\{$table_upper_without_s};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use $namespace\Model\\{$table_upper_without_s};


class DeleteController extends Controller
{

    public \$_{$table_without_s};

    public function __construct($table_upper_without_s \${$table_without_s}){
        \$this->_{$table_without_s}=\${$table_without_s};
    }

    public function index(\$id)
    {

        \$this->_{$table_without_s}->find(\$id)->delete();
        return redirect()->route(
            '{$table_without_s}.index'
        )->with('status', 'Data deleted!');

    }

}

EOD;

    $string_edit_controller=<<<EOD
<?php
namespace $namespace\Controllers\\{$table_upper_without_s};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use $namespace\Model\\{$table_upper_without_s};

class EditController extends Controller
{

    public \${$table_without_s};

    public function __construct({$table_upper_without_s} \${$table_without_s}){
        \$this->{$table_without_s}=\${$table_without_s};
    }

    public function index(\$id)
    {


        \${$table_without_s}=\$this->{$table_without_s}->find(\$id);
        return view('$view::{$table_without_s}.edit',[
            '{$table_without_s}'=>\${$table_without_s},
        ]);

    }

}


EOD;

    $string_index_controller=<<<EOD
<?php
namespace $namespace\Controllers\\{$table_upper_without_s};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use $namespace\Model\\{$table_upper_without_s};

class ImportInventoryController extends Controller
{
    public function index()
    {
        \$records={$table_upper_without_s}::paginate(3);
        return view('$view::{$table_without_s}.index', ['records' => \$records]);
    }

}

EOD;

    $string_search_controller=<<<EOD
<?php
namespace $namespace\Controllers\\{$table_upper_without_s};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use $namespace\Model\\{$table_upper_without_s};

class SearchController extends Controller
{
    public function index(Request \$request)
    {
        \$query = \$request->input('q');
        if (\$query)
        {
            \$records = {$table_upper_without_s}::where('name', 'LIKE', "%\$query%")
            $string_input_search
            ->paginate(3);
        }
        else
        {
            \$records = {$table_upper_without_s}::orderBy('id', 'DESC')->paginate(3);
        }

        //\$records={$table_upper_without_s}::paginate(15);
        return view('$view::{$table_without_s}.index', ['records' => \$records]);
    }

}


EOD;

    $string_store_controller=<<<EOD
<?php
namespace $namespace\Controllers\\{$table_upper_without_s};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use $namespace\Model\\{$table_upper_without_s};

class StoreController extends Controller
{


    public function __construct(){
    }

    public function index(Request \$request)
    {
        \$this->validate(\$request, [
            //'name' => 'required|unique:{$table}|max:255',
        ]);
        \$model=new {$table_upper_without_s}();
        $string_input_controller
        \$model->save();
        return redirect()->route(
            '{$table_without_s}.index'
        )->with('status', 'Data saved!');


    }

}


EOD;

    $string_update_controller=<<<EOD
<?php
namespace $namespace\Controllers\\{$table_upper_without_s};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use $namespace\Model\\{$table_upper_without_s};

class UpdateController extends Controller
{

    public \$_{$table_without_s};

    public function __construct({$table_upper_without_s} \${$table_without_s}){
        \$this->_{$table_without_s}=\${$table_without_s};
    }

    public function index(Request \$request)
    {
        /*\$this->validate(\$request, [
            'email' => 'required|unique:users|max:255',
        ]);*/
        \$id=\$request->input('id');
        \$model=\$this->_{$table_without_s}->find(\$id);
        $string_input_controller
        \$model->save();
        return redirect()->route(
            '{$table_without_s}.index'
        )->with('status', 'Data updated!');

    }

}


EOD;
 $string_route=<<<EOD
Route::get('$table_without_s/index','$namespace\Controllers\\{$table_upper_without_s}\IndexController@index')->name('{$table_without_s}.index');
    Route::get('{$table_without_s}/create','$namespace\Controllers\\{$table_upper_without_s}\CreateController@index')->name('{$table_without_s}.create');
    Route::get('{$table_without_s}/edit/{id}','$namespace\Controllers\\{$table_upper_without_s}\EditController@index')->name('{$table_without_s}.edit');
    Route::post('{$table_without_s}/store','$namespace\Controllers\\{$table_upper_without_s}\StoreController@index');
    Route::get('{$table_without_s}/search','$namespace\Controllers\\{$table_upper_without_s}\SearchController@index');
    Route::get('{$table_without_s}/read','$namespace\Controllers\\{$table_upper_without_s}\ReadController@index');
    Route::post('{$table_without_s}/update','$namespace\Controllers\\{$table_upper_without_s}\UpdateController@index');
    Route::get('{$table_without_s}/delete/{id}','$namespace\Controllers\\{$table_upper_without_s}\DeleteController@index');

EOD;

    $string_menu=<<<EOD
    array("id"=>2,"name"=>"Nguoivay","url"=>"","route"=>"","type"=>"fix_url","parent_id"=>0,"icon_code"=>"fa fa-tasks","group"=>"config"),
                    array("id"=>"","name"=>"$table","url"=>"","route"=>"$table_without_s/index","type"=>"dynamic_url","parent_id"=>2,"icon_code"=>"fa fa-tasks","group"=>"$table_without_s"),

EOD;






//    echo $string_create_view;
//    echo $string_edit_view;
//    echo $string_index_view;
//    echo $string_model;
//    echo $string_create_controller;
//    echo $string_delete_controller;
//    echo $string_edit_controller;
//    echo $string_index_controller;
//    echo $string_search_controller;
//    echo $string_store_controller;
//    echo $string_update_controller;
    echo $string_route;

    if(!is_dir("gen" ))
    {
        mkdir("gen",0777, true);

    }
    if(!is_dir("gen/".$table_without_s ))
    {
        mkdir("gen/".$table_without_s,0777, true);

    }
    if(!is_dir("gen/controller/".$table_upper_without_s ))
    {
        mkdir("gen/controller/".$table_upper_without_s,0777, true);

    }

    $fp = fopen("gen/".$table_without_s."/create.blade.php","wb");
    fwrite($fp,$string_create_view);
    fclose($fp);

    $fp = fopen("gen/".$table_without_s."/edit.blade.php","wb");
    fwrite($fp,$string_edit_view);
    fclose($fp);

    $fp = fopen("gen/".$table_without_s."/index.blade.php","wb");
    fwrite($fp,$string_index_view);
    fclose($fp);

    $fp = fopen("gen/".$table_upper_without_s.".php","wb");
    fwrite($fp,$string_model);
    fclose($fp);

    $fp = fopen("gen/controller/".$table_upper_without_s."/CreateController.php","wb");
    fwrite($fp,$string_create_controller);
    fclose($fp);

    $fp = fopen("gen/controller/".$table_upper_without_s."/DeleteController.php","wb");
    fwrite($fp,$string_delete_controller);
    fclose($fp);

    $fp = fopen("gen/controller/".$table_upper_without_s."/EditController.php","wb");
    fwrite($fp,$string_edit_controller);
    fclose($fp);

    $fp = fopen("gen/controller/".$table_upper_without_s."/IndexController.php","wb");
    fwrite($fp,$string_index_controller);
    fclose($fp);


    $fp = fopen("gen/controller/".$table_upper_without_s."/SearchController.php","wb");
    fwrite($fp,$string_search_controller);
    fclose($fp);

    $fp = fopen("gen/controller/".$table_upper_without_s."/StoreController.php","wb");
    fwrite($fp,$string_store_controller);
    fclose($fp);

    $fp = fopen("gen/controller/".$table_upper_without_s."/UpdateController.php","wb");
    fwrite($fp,$string_update_controller);
    fclose($fp);

    $fp = fopen("gen/route.php","wb");
    fwrite($fp,$string_route);
    fclose($fp);

     $fp = fopen("gen/menu.php","wb");
        fwrite($fp,$string_menu);
        fclose($fp);

    chmod("gen", 0777);
    chmod("gen/".$table_without_s, 0777);
    chmod("gen/controller", 0777);
    chmod("gen/controller/".$table_upper_without_s, 0777);

    /*echo "<pre>";
    var_dump($list_columns);
    echo "</pre>";exit;*/
}
?>

<?php
//echo "<pre>";
//var_dump($result);
//var_dump($result1);
//echo "</pre>";exit;
//// set the resulting array to associative
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//echo "<pre>";
//var_dump($result);
//echo "</pre>";exit;
?>
