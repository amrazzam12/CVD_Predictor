<?php

namespace App\Calculators;

use Illuminate\Http\JsonResponse;

class WomenCalculatorContact extends Calculator implements CalculatorContact
{


    public function response($request): JsonResponse
    {
        $gender = 'Woman';
        return $this->finalResponse($request , $gender);
    }
    public function ageEffect($age)
    {
        switch ($age) {
            case 0 :
                $this->score -= 7;
                break;
            case  1 :
                $this->score -= 3;
                break;
            case 3 :
                $this->score += 3;
                break;
            case 4 :
                $this->score += 6;
                break;
            case 5 :
                $this->score += 8;
                break;
            case 6 :
                $this->score += 10;
                break;
            case 7 :
                $this->score += 12;
                break;
            case 8 :
                $this->score += 14;
                break;
            case 9 :
                $this->score += 16;
                break;
        }
    }

    public function totalColEffect( $col , $age)
    {
        if ($age == 0 || $age == 1) {
            switch ($col) {
                case 1 :
                    $this->score += 4;
                    break;
                case 2 :
                    $this->score += 8;
                    break;
                case 3 :
                    $this->score += 11;
                    break;
                case 4 :
                    $this->score += 13;
                    break;
            }
        } elseif($age == 2 || $age == 3 ){
            switch ($col) {
                case 1 :
                    $this->score += 3;
                    break;
                case 2 :
                    $this->score += 6;
                    break;
                case 3 :
                    $this->score += 8;
                    break;
                case 4 :
                    $this->score += 10;
                    break;
            }
        }elseif($age == 4 || $age == 5 ){
            switch ($col) {
                case 1 :
                    $this->score += 2;
                    break;
                case 2 :
                    $this->score += 4;
                    break;
                case 3 :
                    $this->score += 5;
                    break;
                case 4 :
                    $this->score += 7;
                    break;
            }
    } elseif($age == 6 || $age == 7 ){
            switch ($col) {
                case 1 :
                    $this->score += 1;
                    break;
                case 2 :
                    $this->score += 2;
                    break;
                case 3 :
                    $this->score += 3;
                    break;
                case 4 :
                    $this->score += 4;
                    break;
            }
        }elseif($age == 8 || $age == 9 ){
            switch ($col) {
                case 2:
                case 1 :
                    $this->score += 1;
                    break;
                case 4:
                case 3 :
                    $this->score += 2;
                    break;
            }
        }

    }

    public function smokeEffect($age)
    {
        switch ($age) {
            case 0:
            case 1 :
                $this->score += 9;
                break;
            case 2:
            case 3 :
                $this->score += 7;
                break;

            case 4:
            case 5 :
                $this->score += 4;
                break;

            case 6:
            case 7 :
                $this->score += 2;
                break;

            case 8:
            case 9 :
                $this->score += 1;
                break;
        }


    }

    public function hdlColEffect($hdlCol)
    {
        switch ($hdlCol){
            case -1 :
                $this->score -= 1;
                break;
            case 1 :
                $this->score += 1;
                break;
            case 2 :
                $this->score += 2;
                break;
    }
    }


    public function sysBloodPressureEffectTreated($sysBlood)
    {
        switch ($sysBlood) {
            case 1 :
                $this->score += 3;
                break;
            case 2 :
                $this->score += 4;
                break;
            case 3 :
                $this->score += 5;
                break;
            case 4 :
                $this->score += 6;
                break;
        }
    }

    public function sysBloodPressureEffectUnTreated($sysBlood)
    {
        switch ($sysBlood) {
            case 1 :
                $this->score += 1;
                break;
            case 2 :
                $this->score += 2;
                break;
            case 3 :
                $this->score += 3;
                break;
            case 4 :
                $this->score += 4;
                break;
        }
    }

    public function calcTotalPercentOfDisease($score){
        $percent = "";
        if ($score < 9 ) { $percent = "Under 1%"; }
        elseif($score >= 9 && $score <= 12 ) {$percent = "1%";}
        elseif($score >= 13 && $score <= 14 ) {$percent = "2%";}
        elseif($score == 15) {$percent = "3%";}
        elseif( $score == 16) {$percent = "4%";}
        elseif($score == 17) {$percent = "5%";}
        elseif($score == 18) {$percent = "6%";}
        elseif($score == 19) {$percent = "8%";}
        elseif($score == 20) {$percent = "11%";}
        elseif($score == 21) {$percent = "14%";}
        elseif($score == 22) {$percent = "17%";}
        elseif($score == 23) {$percent = "22%";}
        elseif($score == 24) {$percent = "27%";}
        elseif($score > 25) {$percent = "Over 30%";}

        return $percent;

    }
}
