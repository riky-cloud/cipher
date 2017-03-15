<?php
class Cipher{
    public $data;

    public function __construct(){
        // digit 5 for str_split by 5 char
        $rand = 1000;
        $i = $rand + 9989;
        foreach (range('A', 'Z') as $char) {
            $data[$i] = $char;
            $i = $i + $rand;
            $rand++;
        }

        foreach (range('!', '@') as $char) {
            $data[$i] = $char;
            $i = $i + $rand;
            $rand++;
        }

        foreach (range('a', 'z') as $char) {
            $data[$i] = $char;
            $i = $i + $rand;
            $rand++;
        }

        $i++;
        $data[$i] = ' ';
        $i++;
        $data[$i] = '_';
        $this->data = $data;
    }

    public function cipher_encode($text){
        $arrText = str_split($text);
        foreach ($arrText as $tx)
            if (in_array($tx, $this->data))
                $arrKey[] = array_search($tx, $this->data);


        return join($arrKey);
    }

    public function cipher_decode($encode){
        $arrKey = str_split($encode, 5);
        foreach ($arrKey as $key)
            $result[] = $this->data[$key];
        return join($result);
    }
}

$cipher = new Cipher;
$text = "hello";
$encode = $cipher->cipher_encode($text);
$decode = $cipher->cipher_decode($encode);

echo '<pre>'.
    'text   => ' . $text . "\n" .
    'encode => ' . $encode . "\n" .
    'decode => ' . $decode;
print_r($cipher->data);

?>
