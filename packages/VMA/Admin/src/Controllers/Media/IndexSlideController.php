<?php
namespace VMA\Admin\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Media;

class IndexSlideController extends Controller
{
    public function index()
    {
        $records=Media::paginate(3);
        return view('admin::media.index', ['records' => $records]);
    }

}
