<?php

namespace FlameDevelopment\Validation;

class Number
{
    protected $number;
    protected $ones = [
        "",
        "one",
        "two",
        "three",
        "four",
        "five",
        "six",
        "seven",
        "eight",
        "nine",
        "ten",
        "eleven",
        "twelve",
        "thirteen",
        "fourteen",
        "fifteen",
        "sixteen",
        "seventeen",
        "eighteen",
        "nineteen"
    ];

    protected $tens = [
        "",
        "",
        "twenty",
        "thirty",
        "forty",
        "fifty",
        "sixty",
        "seventy",
        "eighty",
        "ninety"
    ];

    protected $triplets = [
        "",
        "thousand",
        "million",
        "billion",
        "trillion",
        "quadrillion",
        "quintillion",
        "sextillion",
        "septillion",
        "octillion",
        "nonillion"
    ];
    
    public function __construct($number)
    {
        $this->number = $number;
    }
    
    public function toInt()
    {
        return $this->number;
    }
    
    public function toWord()
    {
        return $this->convertNum($this->number);
    }


    // recursive fn, converts three digits per pass
    private function convertTri($num, $tri)
    {
        // chunk the number, ...rxyy
        $r = (int) ($num / 1000);
        $x = ($num / 100) % 10;
        $y = $num % 100;

        // init the output string
        $str = "";

        // do hundreds
        if ($x > 0)
        {
            $str = $this->ones[$x] . " hundred";
        }

        // do ones and tens
        if ($y < 20)
        {
            $str .= $this->ones[$y];
        }
        else
        {
            $str .= $this->tens[(int) ($y / 10)] . $this->ones[$y % 10];
        }

        // add triplet modifier only if there
        // is some output to be modified...
        if ($str != "")
        {
            $str .= $this->triplets[$tri];
        }

        // continue recursing?
        if ($r > 0)
        {
            return $this->convertTri($r, $tri+1).$str;
        }
        else
        {
            return $str;
        }
    }

    // returns the number as an anglicized string
    private function convertNum($num)
    {
        $num = (int) $num;    // make sure it's an integer

        if ($num < 0)
        {
           return "negative".$this->convertTri(-$num, 0);
        }

        if ($num == 0)
        {
           return "zero";
        }

        return $this->convertTri($num, 0);
    }
}

