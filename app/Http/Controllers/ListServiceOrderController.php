<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListServiceOrderRequest;
use App\Http\Requests\UpdateListServiceOrderRequest;
use App\Models\ListOrder;
use App\Models\ListServiceOrder;
use App\Repositories\ListServiceOrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class ListServiceOrderController extends AppBaseController
{
    private $listServiceOrderRepository;
    private array $auth = array('Master', 'Dev', 'Admin');

    public function __construct(ListServiceOrderRepository $listServiceOrderRepo)
    {
        $this->listServiceOrderRepository = $listServiceOrderRepo;
    }

    public function destroyAll($uid)
    {
        if (in_array(Auth::user()->role, $this->auth))
        {
            $listorder = ListServiceOrder::where('uid', $uid);

            if (empty($listorder)) {
                return "error";
            } else {
                $listorder->delete();
                return "success";
            }
        } else {
            return redirect('home');
        }
    }

    public function destroy(Request $request)
    {
        if (in_array(Auth::user()->role, $this->auth))
        {
            $listServiceOrder = $this->listServiceOrderRepository->find($request->id);

            if (empty($listServiceOrder)) {
                Flash::error('List Service Order not found');
                return "error";
            } else {
                $this->listServiceOrderRepository->delete($request->id);
                return "success";
            }
        } else {
            return redirect('home');
        }
    }
}
