<?php
namespace VMA\Admin\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Media;

class EditController extends Controller
{

    public $media;

    public function __construct(Media $media){
        $this->media=$media;
    }

    public function index($id)
    {


        $media=$this->media->find($id);
        return view('admin::media.edit',[
            'media'=>$media,
        ]);

    }

}

