<?php

require_once 'CustomCalculator.php';

class ExtendedCalculator extends CustomCalculator {
    public function calculateHistogram($start, $end) {
        $histogram = [];

        for ($i = $start; $i <= $end; $i++) {
            $currentValue = $i;
            $iterations = 0;

            while ($currentValue != 1) {
                $currentValue = $this->nextCalculation($currentValue);
                $histogram[$currentValue] = isset($histogram[$currentValue]) ? $histogram[$currentValue] + 1 : 1;
                $iterations++;
            }
        }

        return $histogram;
    }
}

?>
