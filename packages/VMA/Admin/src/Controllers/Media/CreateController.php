<?php
namespace VMA\Admin\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Media;


class CreateController extends Controller
{

    public function index()
    {
        $medias=Media::all();
        return view('admin::media.create',["medias"=>$medias]);

    }

}
