<?php
namespace VMA\Admin\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Media;


class DeleteController extends Controller
{

    public $_media;

    public function __construct(Media $media){
        $this->_media=$media;
    }

    public function index($id)
    {

        $this->_media->find($id)->delete();
        return redirect()->route(
            'media.index'
        )->with('status', 'Data deleted!');

    }

}
