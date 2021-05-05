<?php

namespace App\Http\Controllers;

use App\Models\ListOrder;
use App\Repositories\ListOrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListOrderController extends AppBaseController
{
    private $ListOrderRepository;
    private array $auth = array('Master', 'Dev', 'Admin');

    public function __construct(ListOrderRepository $ListOrderRepo)
    {
        $this->ListOrderRepository = $ListOrderRepo;
    }

    public function destroyAll($uid)
    {
        if (in_array(Auth::user()->role, $this->auth))
        {
            $listorder = ListOrder::where('uid', $uid);

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
            $listorder = $this->ListOrderRepository->find($request->id);

            if (empty($listorder)) {
                return "error";
            } else {
                $this->ListOrderRepository->delete($request->id);
                return "success";
            }
        } else {
            return redirect('home');
        }
    }
}
