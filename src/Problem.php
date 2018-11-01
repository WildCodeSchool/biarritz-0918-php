<?php
declare (strict_types = 1);
namespace App;

class Problem
{
    /**
     * Return the combinaison that maximize the knapsack for a given $inputs
     */
    public static function solve(array $inputs): array
    {
        $items = $inputs['items'];
        $bag = $inputs['bag'];
        $combinations = self::_getAllCominaisonsOf($items, function ($currentCombinaison) use ($bag) {
            return self::_eval($currentCombinaison)['volume'] <= $bag->volume;
        });
        return self::_max($combinations, function ($combination) {
            return self::_eval($combination)['value'];
        });
    }

    /**
     * get maximum of an array by evaluation
     */
    private function _max(array $items, callable $eval)
    {
        return array_reduce($items, function ($acc, $item) use ($eval) {
            return $acc && ($eval($item) < $eval($acc)) ? $acc : $item;
        });
    }

    /**
     * evaluate a solution
     */
    private static function _eval(array $solution): array
    {
        $totalValue = 0;
        $totalVolume = 0;
        // Put the & as a prefix for $totalVale cuse i mutate it
        array_walk($solution, function ($item) use (&$totalValue, &$totalVolume) {
            $totalValue += $item->value;
            $totalVolume += $item->volume;
        });
        return array('value' => $totalValue, 'volume' => $totalVolume);
    }

    /**
     * get all possible combinaison filtered by $filter
     */
    private static function _getAllCominaisonsOf(array $items, callable $filter): array
    {
        $num = count($items);
        //The total number of possible combinations
        $total = pow(2, $num);
        //Loop through each possible combination
        $combinations = [];
        for ($i = 0; $i < $total; $i++) {
            $combinations[$i] = [];
            for ($j = 0; $j < $num; $j++) {
                if (pow(2, $j) & $i) {
                    array_push($combinations[$i], $items[$j]);
                }
            }
            if (!$filter($combinations[$i])) {
                unset($combinations[$i]);
            }
        }
        return $combinations;
    }

    // foreach ($items as $itemName => $item) {
    //     foreach ($combinations as $combination) {
    //         $currentCombination = array_merge(array($itemName => $item), $combination);
    //         if ($filter($currentCombination)) {
    //             array_push($combinations, $currentCombination);
    //         }
    //     }
    // }
    // return $combinations;
}
