<?php
 
	
    # proměnnné
 
    $prom = "ahoj světe";
    print $prom.'<br>';
    echo $prom.' Hoj';
 
    # dat typ
    print '<br><h1>Datové typy</h1><br>Célé čísla:';
    $x = 5;
    var_dump($x);
 
    print '<br>řetězce: ';
    $x = 'Ahoj';
    var_dump($x);
 
    print '<br>des čísla: ';
    $x = 1.1;
    var_dump($x);
 
    print '<br>pravdivostní hod: ';
    $x = true;
    var_dump($x);
 
    print '<br>pole: ';
    $x = [1, 2, 3];
    var_dump($x);
 
    print '<br>objekty: ';
 
    class Car {
        public $color;
        public $model;
        public function __construct($color, $model) {
            $this->color = $color;
            $this->model = $model;
        }
        public function message() {
            return "My car is a " . $this->color . " " . $this->model . "!";
        }
    }
 
    $x = new Car("red", "Volvo");;
    var_dump($x);
 
    print '<br>žádné: ';
    $x = NULL;
    var_dump($x);
    
    # komentáře
    // koment
    /* komentář 1
        2
        ...
    */
 
    # echo / print
    # string
    $str = "Řetězce";
    echo "<h1>Datový typ $str</h1>";
 
    echo "strlen: ".strlen("Hello world!")."<br>";
    echo "word count: ".str_word_count("Hello world!")."<br>";
    
    $txt = "I really love PHP!";
    var_dump(str_contains($txt, "love"))."<br>";
 
    # num
    # casting
 
    echo "<h1>Casting - přetypování</h1>";
 
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "hello"; // String
    $d = true;    // Boolean
    $e = NULL;    // NULL
 
    $a = (string) $a;
    $b = (string) $b;
    $c = (string) $c;
    $d = (string) $d;
    $e = (string) $e;
 
    // Use var_dump() to verify the data type
    echo "int na string: ".var_dump($a)."<br>";
    echo "float na string: ".var_dump($b)."<br>";
    echo "string na string: ".var_dump($c)."<br>";
    echo "bool na string: ".var_dump($d)."<br>";
    echo "null na string: ".var_dump($e)."<br>";
 
    # math
    # const
    # operator
    # if / elseif / else
    echo "<h1>Podmínky</h1>";
    $x = "1";
    if ($x === 1) echo "ahoj";
    elseif ($x == 1) echo "jiný dat typ";
    else echo "nerovná se";
 
    # switch
    # loop
    # func
    # arr
    # reg
 

	$pujdu_ven = 10;

	if ($pujdu_ven >= 18) {
		echo "Půjdu ven";
	}else {
		echo "Nikam nejdu!";
	}
?>