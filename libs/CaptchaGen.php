<?php

class CaptchaGen
{
    /**
     * @var string
     */
    protected $type = 'text';
    /**
     * @var string
     */
    protected $strs = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    /**
     * @var string
     */
    protected $textToken = '';
    /**
     * @var string
     */
    protected $phrase;
    /**
     * @var int
     */
    protected $num1;
    /**
     * @var int
     */
    protected $num2;

    public function setToken(string $token = '') : self
    {
        $this->textToken = $token;
        return $this;
    }
    public function setStr(string $str = '') : self
    {
        $this->str = $str;
        return $this;
    }

    public function __construct()
    {

    }

    protected function _randNum($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
    protected function _randStr($length){
        $token = $this->textToken;
        $codeAlphabet = $this->strs;
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->_randNum(0, $max-1)];
        }

        return $token;
    }

    public function Text(int $length = 6) : string|bool
    {
        $str = $this->_randStr($length);
        $this->phrase = $str;

        if (session_id() === '') session_start();
        $_SESSION['GifCap'] = $this->phrase;

        return $this->phrase;
    }

    public function Calc(int $min = 1, int $max = 20, string|array $exps = []) : string|bool
    {
        $this->num1 = $num1 = $this->_randNum($min, $max);
        $this->num2 = $num2 = $this->_randNum($min, $max);

        $maths = ["+", "-", "×", "÷"];
        if (is_array($exps) && count($exps) > 0){
            $exp = $exps[array_rand($exps)];
        } else if ($exps != '') {
            $exp = $exps;
        } else {
            $exp = $maths[array_rand($maths)];
        }

        $exp = ($exp == 'x' || $exp == '*' || $exp == '⋅') ? "×" : $exp;
        $exp = ($exp == ':' || $exp == '/') ? "÷" : $exp;
        $exp = ($exp == '') ? $maths[array_rand($maths)] : ((@count($exp)==0) ? $maths[array_rand($maths)] : $exp);

        $rg = "$num1 $exp $num2 =";
        if ($exp === '+'){
            $this->phrase = $num1 + $num2;
        } else if ($exp === '-'){
            if ($num1 > $num2) {
                $this->phrase = $num1 - $num2;
            } else {
                $rg = "$num2 - $num1 =";
                $this->phrase = $num2 - $num1;
            }
        } else if ($exp === '×'){
            $this->phrase = $num1 * $num2;
        } else if ($exp === '÷'){
            $num3 = $num1 * $num2;
            $rg = "$num3 ÷ $num1 =";
            $this->phrase = $num2;
        } else {
            return false;
        }
        return $rg;
    }

    public function Auto(int $TextLength = 6, int $NumberMin = 1, int $NumberMax = 30) : bool|string
    {
        return ($this->_randNum(0,666666) % 2) ? $this->Text($TextLength) : $this->Calc($NumberMin,$NumberMax);
    }

    public function Valid($data) : bool
    {
        if (session_id() === '') session_start();
        return (isset($_SESSION['GifCap'])) ? ($data == $_SESSION['GifCap']) : false;
    }
    public function Clear(){
        if (session_id() === '') session_start();
        unset($_SESSION['GifCap']);
    }
    public function Phrase(){
        return $this->phrase;
    }
}
