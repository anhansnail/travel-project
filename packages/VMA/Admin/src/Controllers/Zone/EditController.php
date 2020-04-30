<?php
namespace VMA\Admin\Controllers\Zone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use VMA\Admin\Model\Zone;

class EditController extends Controller
{

    public $zone;

    public function __construct(Zone $zone){
        $this->zone=$zone;
    }

    public function index($id)
    {


        $zone=$this->zone->find($id);
        return view('admin::zone.edit',[
            'zone'=>$zone,
        ]);

    }

}

