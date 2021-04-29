<?php

namespace App\Http\Controllers;

use App\Repositories\ListOrderRepository;
use Illuminate\Http\Request;

class ListOrderController extends AppBaseController
{
    private $ListOrderRepository;

    public function __construct(ListOrderRepository $ListOrderRepo)
    {
        $this->ListOrderRepository = $ListOrderRepo;
    }

    public function destroy(Request $request)
    {
        $listorder = $this->ListOrderRepository->find($request->id);

        if (empty($listorder)) {
            return "error";
        } else {
            $this->ListOrderRepository->delete($request->id);
            return "success";
        }

    }
}
