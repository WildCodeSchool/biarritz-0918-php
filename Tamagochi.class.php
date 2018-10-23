<?php

const _HUNGRINESS_DELTA = 10;
const _FULLNESS_DELTA = 10;
const _TIREDNESS_DELTA = 10;
const _HAPPINESS_DELTA = 10;


// $tamagochi = [
//     "hungriness" => 50,
//     "fullness" => 50,
//     "tiredness" => 50,
//     "happiness" => 50
// ];

// function applyDelta($props, $delta)
// { CLOSURE
//     return function ($tama) use($props, $delta) {
//         $newT = $tama;
//         $newT[$props] += $delta;
//         return $newT;
//     };
// }

// $increaseHappiness = applyDelta('happiness', _HAPPINESS_DELTA);
// $increaseFullness = applyDelta('fullness', _FULLNESS_DELTA);

// $deacreaseHapiness = applyDelta('happiness', -_HAPPINESS_DELTA);



// function feed($t)
// {
//     return $decreaseHungriness($increaseFullness($t));
//     return $increaseFullness($decreaseHungriness($t));
// }



// function bed($t)
// {
//     global $increaseFullness, $deacreaseHapiness;
//     return $increaseHappiness($increaseFullness($t));
// }

// $tamagochi = bed($tamagochi);

class Tamagochi
{
    public $hungriness;
    public $fullness;
    public $tiredness;
    public $happiness;

    public function __construct($params)
    {
        $this->happiness = $params['happiness'];
        $this->hungriness = $params['hungriness'];
        $this->fullness = $params['fullness'];
        $this->tiredness = $params['tiredness'];
    }
    public function bed()
    {
        $this->tiredness -= _TIREDNESS_DELTA;
    }
    public function feed()
    {
        $this->hungriness -= _HUNGRINESS_DELTA;
        $this->fullness += _FULLNESS_DELTA;
    }
    public function play()
    {
        $this->happiness += _HAPPINESS_DELTA;
        $this->tiredness += _TIREDNESS_DELTA;
    }

    public function poop()
    {
        $this->fullness -= _FULLNESS_DELTA;
    }

    public function tick()
    {
        $this->happiness -= _HAPPINESS_DELTA;
        $this->tiredness += _TIREDNESS_DELTA;
        $this->hungriness += _HUNGRINESS_DELTA;
    }

    public function setHappiness($hapiness)
    {
        $this->happiness = $hapiness;
    }
}

function OK($msg)
{
    echo "[✔️] Test ok : $msg \n";
}

function KO($msg)
{
    echo "[❌] Test fail : $msg \n";
    throw new Exception($msg);
}

function test_tick()
{
    $t = new Tamagochi([
    "hungriness" => 50,
    "tiredness" => 50,
    "happiness" => 50]);

    $oldHappiness = $t->happiness;
    $oldTiredness = $t->tiredness;
    $oldHungriness = $t->hungriness;
    $t->tick();
    $expectedHappiness = $t->happiness;
    $expectedTiredness = $t->tiredness;
    $expectedHungriness = $t->hungriness;

    if ($expectedHappiness === $oldHappiness - _HAPPINESS_DELTA &&
     $expectedTiredness === $oldTiredness + _TIREDNESS_DELTA &&
     $expectedHungriness === $oldHungriness + _HUNGRINESS_DELTA) {
        OK("Tamagochi::tick is working as expected");
    } else {
        KO("Tamagoshi::tick is not working");
    }
}

function test_feedingTamagochi()
{
    $t = new Tamagochi([
        "hungriness" => 50,
        "tiredness" => 50,
        "fullness" => 50
    ]);
    $oldHungriness = $t->hungriness;
    $oldFullness = $t->fullness;
    $t->feed();
    $expectedHungriness = $t->hungriness;
    $expectedFullness = $t->fullness;
    
    
    if ($expectedHungriness === $oldHungriness - _HUNGRINESS_DELTA
    && $expectedFullness === $oldFullness + _FULLNESS_DELTA) {
        OK("Tamagochi::feed() is ok");
    } else {
        KO("Should hungriness and fullness deacred/increased");
    }
}

function test_puttingToBed()
{
    $t = new Tamagochi([
        "hungriness" => 50,
        "fullness" => 50,
        "tiredness" => 50
    ]);
    $oldTiredness = $t->tiredness;
    $t->bed();
    $t->feed();
    $expecTiredness = $t->tiredness;
    
    
    if ($expecTiredness === $oldTiredness - _TIREDNESS_DELTA) {
        OK("Tamagochi::bed && $expecTiredness = && $expecTiredness ===
         $oldTiredness + _TIREDNESS_DELTA is ok");
    } else {
        KO("Should tiredness deacred/increased");
    }
}

function test_play()
{
    $t = new Tamagochi([
        "happiness" => 50,
        "tiredness" => 50

    ]);
    $oldHappiness = $t->happiness;
    $oldTiredness = $t->tiredness;
    $t->play();
    $expectedHappiness = $t->happiness;
    $expectedTiredness = $t->tiredness;

    if ($expectedHappiness === $oldHappiness + _HAPPINESS_DELTA
    && $expectedTiredness === $oldTiredness + _TIREDNESS_DELTA) {
        OK("Tamagochi::play is working as expected");
    } else {
        KO("Tamagochi::play is not working");
    }
}

function test_poop()
{
    $t = new Tamagochi([
        "fullness" => 50
    ]);
    $oldFullness = $t->fullness;
    $t->poop();
    $expectedFullness = $t->fullness ;

    if ($expectedFullness === $oldFullness - _FULLNESS_DELTA) {
        OK("Tamagochi::poop is working as expected");
    } else {
        KO("Tamagoshi::poop is not working");
    }
}



function test()
{
    // feed test case
    test_feedingTamagochi();
    test_puttingToBed();
    test_play();
    test_poop();
    test_tick();
}


test();


/**
 * a= ["salut" => 111]
 * a["salut"] --> 111
 */
