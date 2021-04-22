<?php

namespace App\Http\Controllers;

use App\Models\ListOrder;
use App\Repositories\ListOrderRepository;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ListOrderController extends Controller
{
    private $ListOrderRepository;

    public function __construct(ListOrderRepository $ListOrderRepo)
    {
        $this->ListOrderRepository = $ListOrderRepo;
    }

    public function store(){
//        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
//        $output->writeln("Data = $lokasi1");
//        ListOrder::insert(Input::all());
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
