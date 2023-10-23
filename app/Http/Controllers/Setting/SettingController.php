<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Service\FinAPIService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public FinAPIService $finApiService;

    public function __construct(FinAPIService $finApiService)
    {
        $this->finApiService = $finApiService;
    }

    public function index(Request $request)
    {
        return view('settings.index');

        //    return $this->finApiService->getBanks($request->id);
        //        return $this->finApiService->getTransactions(view: 'userView');
    }
}
