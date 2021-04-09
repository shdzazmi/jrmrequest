<?php

namespace App\Http\Controllers;

use App\Models\ListOrder;
use App\Repositories\ListOrderRepository;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    private $ListOrderRepository;

    public function __construct(ListOrderRepository $ListOrderRepo)
    {
        $this->ListOrderRepository = $ListOrderRepo;
    }

    public function store(Request $request){
        $list_order = ListOrder::create($request->all());
        return $list_order;
    }
    public function get(){
        $list_order = ListOrder::all();
        return view('list_order', $list_order);
    }
    public function destroy($id)
    {
        $this->ListOrderRepository->delete($id);
    }
    public function destroyAll($id)
    {
        $this->ListOrderRepository->delete($id);
    }
}
