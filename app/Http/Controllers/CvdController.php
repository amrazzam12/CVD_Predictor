<?php

namespace App\Http\Controllers;

use App\Calculators\MenCalculator;
use App\Calculators\WomenCalculatorContact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CvdController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if ($request->gender == 'male'){
            return (new MenCalculator)->response($request);
        }else{
            return (new WomenCalculatorContact)->finalResponse($request);
        }
    }
}
