<?php
include 'ParentInputMode.php';
/**
* this class for contain input
*/
class Input extends ParentInputMode
{
    
    function __construct($name)
    {
        $this->name = $name;
    }

    public static function printName($name)
    {
        if (count($name) == 1 && !is_array($name)) {
            parent::printAnythink($name);
        } else {
            foreach ($name as $value) {
                parent::printAnythink($value->name);
            }
        }
    }

    public static function dialogInsert()
    {
        echo "Mau insert berapa?";
        fscanf(STDIN, "%s\n", $sum);
        return $sum;
    }

    public static function addName($index)
    {
        for ($i=0; $i < $index; $i++) { 
            echo "Masukin Nama nya LAGI guys\n";
            fscanf(STDIN, "%s\n", $input_name);
            $nameInput[] = new Input($input_name);
        }

        return $nameInput;
    }
}
$nameInput = [];
$sum = Input::dialogInsert();
if (is_numeric($sum)) {
    for ($i=0; $i < $sum; $i++) { 
        echo "Masukin Nama nya guys";
        fscanf(STDIN, "%s\n", $input_name);
        $nameInput[] = new Input($input_name);
    }

    echo "Sekarang mau apa?\n";
    echo "jika mau tampilkan ketik print\n";
    echo "kalo mau nambah lagi ketik add\n";
    fscanf(STDIN, "%s\n", $mode);
    if ($mode == "print") {
        Input::printName($nameInput);
    } elseif ($mode == "add") {
        $sumnext = Input::dialogInsert();
        $second = Input::addName($sumnext);
        $nameInput = array_merge($nameInput, $second);
        Input::printName($nameInput);
    } else {
        echo "Wakwaw";
    }

}else{
    echo "Maaf Anda TYPO, Silahkan coba lagi \n";
}
?>