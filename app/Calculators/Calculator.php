<?php

namespace App\Calculators;

use Illuminate\Http\JsonResponse;

class Calculator
{
    protected $score = 0;
    protected $riskOfCvd = 0 ;
    protected $name = "";
    protected $num = 0;

    public function finalResponse($request , $gender): JsonResponse
    {
        $this->handle($request);
        $this->riskOfCvd = $this->calcTotalPercentOfDisease($this->score);
        $status = "Normal , Dont Worry" ;
        if ($this->score > 15){
            $status = "You Are Danger Please See A Doctor";
        }
        return response()->json([
            'Gender' => $gender,
            'Name' => $this->name ,
            'Phone Number' => $this->num,
            'Score' => $this->score,
            '10-Year Risk Of Injure' => $this->riskOfCvd,
            'Status' => $status
        ]);
    }


    public function handle($request)
    {
        $this->name = $request->name;
        $this->num = (double) $request->number;
        $this->ageEffect($request->age);
        $this->hdlColEffect($request->HDL_Cholesterol);
        $this->totalColEffect($request->Total_Cholesterol , $request->age);
        if ($request->smoker == 1) {
            $this->smokeEffect($request->age);
        }
        if ($request->On_Blood_pressure_medication == 0) {
            $this->sysBloodPressureEffectUnTreated($request->Systolic_BP);
        } else{
            $this->sysBloodPressureEffectTreated($request->Systolic_BP);
        }
    }


}
