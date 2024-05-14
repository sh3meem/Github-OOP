<?php

class CustomCalculator {
    public function nextCalculation($x) {
        return $x % 2 == 0 ? $x / 2 : 3 * $x + 1;
    }

    public function calculateRangeCustom($start, $end) {
        $resultsCustom = [];

        for ($i = $start; $i <= $end; $i++) {
            $numberCustom = $i;
            $currentValueCustom = $numberCustom;
            $maxValueCustom = $currentValueCustom;
            $iterationsCustom = 0;

            while ($currentValueCustom != 1) {
                $currentValueCustom = $this->nextCalculation($currentValueCustom);
                $maxValueCustom = max($maxValueCustom, $currentValueCustom);
                $iterationsCustom++;
            }

            $resultsCustom[] = [
                'number_custom' => $numberCustom,
                'max_value_custom' => $maxValueCustom,
                'iterations_custom' => $iterationsCustom
            ];
        }

        return $resultsCustom;
    }

    public function findMaxIterationsCustom($resultsCustom) {
        $maxIterationsCustom = 0;
        $maxIterationsNumberCustom = null;

        foreach ($resultsCustom as $resultCustom) {
            if ($resultCustom['iterations_custom'] > $maxIterationsCustom) {
                $maxIterationsCustom = $resultCustom['iterations_custom'];
                $maxIterationsNumberCustom = $resultCustom;
            }
        }

        return $maxIterationsNumberCustom;
    }

    public function findMinIterationsCustom($resultsCustom) {
        $minIterationsCustom = PHP_INT_MAX;
        $minIterationsNumberCustom = null;

        foreach ($resultsCustom as $resultCustom) {
            if ($resultCustom['iterations_custom'] < $minIterationsCustom) {
                $minIterationsCustom = $resultCustom['iterations_custom'];
                $minIterationsNumberCustom = $resultCustom;
            }
        }

        return $minIterationsNumberCustom;
    }
}

?>
