<?php

namespace App\Modules\Equations\QuadraticEquations\Services;



use Symfony\Component\HttpFoundation\InputBag;

class QuadraticEquationService
{

    public function solution(InputBag $values): array
    {
        $array = [];
        $data = $values->all();
        foreach ($data["data"] as $element) {
            $a = $element["a"];
            $b = $element["b"];
            $c = $element["c"];

            $array[] = $this->result(floatval($a), floatval($b), floatval($c));
        }

        return $array;
    }


    private function result(float $a, float $b, float $c): array
    {
        $d = $this->getDiscriminant($a, $b, $c);
        if ($d > 0) {
            $x1 = (-$b - sqrt($d)) / (2 * $a);
            $x2 = (-$b + sqrt($d)) / (2 * $a);
        } elseif ($d == 0) {
            $x1 = -$b / (2 * $a);
            $x2 = -$b / (2 * $a);
        } else {
            $x1 = "-------------";
            $x2 = "-------------";
        }
        return ["x1" => $x1, "x2" => $x2, "D" => $d];
    }

    private function getDiscriminant(float $a, float $b, float $c): float
    {
        return pow($b, 2) - 4 * $a * $c;
    }

}
