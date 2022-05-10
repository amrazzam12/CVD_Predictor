<?php

namespace App\Calculators;

interface CalculatorContact
{

    public function handle($request);

    public function ageEffect($age);
    public function totalColEffect($col , $age);
    public function smokeEffect($age);
    public function hdlColEffect($hdlCol);
    public function sysBloodPressureEffectTreated($sysBlood);
    public function sysBloodPressureEffectUnTreated($sysBlood);
    public function calcTotalPercentOfDisease($score);


}
