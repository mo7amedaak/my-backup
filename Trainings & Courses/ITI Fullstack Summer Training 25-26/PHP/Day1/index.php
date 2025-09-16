<?php 

// $name = "eman mohamed";

// $name = [1,6,4];

$name = null;

# echo "<h1>" . $name . "</h1>"; 
/**
 * 
 */


// $list = [1,"5",6, "eman"];


// if(is_array($list)){
// echo "list is array";
// }
// else{
//     echo "is not array";
// }

// echo $list . "<br>";
// print $list . "<br>";
// print_r($list) ; // value
// echo "<br>";
// var_dump($list);// datatype and value

// $greating = "welcome in iti: ";
// $name = "eman";
// echo $greating , $name, "  efrg" ;
// echo "<br>";
// print $greating . $name; // concating
// $num = 0;
// echo gettype($num), ": ", $num, "<br>";

// // settype($num, "int");

// echo gettype($num), ": ", $num, "<br>";

// casting => change datatype of variable

// $num2 = (int)$num;
// echo $num2, ": ", $num;
// var_dump(false);
// echo "false value: ", false, ", " , "true value: ", true;


// var_dump(is_string("10"));
/************************* */

// + - * / ** %

// echo "23f" - 2;
// > < >= <= == ===  (!=,  <>) !== 

// logical operator 
// and && => true if all condition is true
// or || => true if one condition is true
// not ! => reverse true=> false
// $n1 = 6;
// $n2 = "6";
// var_dump ($n1 !== $n2);
       //         false  && true
// var_dump($n1>10 && $n1 >= $n2); 


// $n1= $n1 + 1;
// $n1+=1;
// $n1++;
// $n1--; => $n1= $n1-1
// ++$n1;
// $n1++;








// if($n1>$n2){
//     echo "n1 > n2";

// }else if($n1 == $n2){
//     echo "n1 == n2";
// }else{
    
//     echo "n1 < n2";
// }
// $letter = "e";

// switch($letter){
//     case 'a' : 
//     case 'e':
//     case 'u':
//     case 'o':
//     case 'i':
//         echo "it is vowel letter <br>", "<br>" . "<br>";
//     break;
// default: 
//     echo "it is constant letter";
//     break;
// }


// constant variable
// const pi =3.14;

// define("myConst", "eman");

// define("myConst", "ccc");

// echo myConst;
// echo pi + 1;
/*********************** */
$text = "wedrftg eman mohamed wertyju";
// // strlen(); // get text length
// // echo "word count: " .str_word_count($text);
// var_dump(strpos($text, "eman"));
// for($i=0; $i<strlen($text); $i++){
// echo $i . ": ". $text[$i] . "<br>";
// }

$i = 0;
// while($i< strlen($text)){
//     echo $i . ": " . $text[$i] . "<br>";
//     $i++;
// }

// $i= 0;
// do {
//     echo $i . ": " . $text[$i] . "<br>";
//     $i++;
// }
// while($i< strlen($text))


// foreach()
/********************** */
// arrays

/**
 * indexing array 
 * multidimistion array
 * assosiative array
 */

$list = [1, "true", "Fgh"];

// $list = array(6,9, array(9,7));
// $list[3] = "new value";
// $list[5] = "eman";
// print_r($list);

// array_push($list,3, 9);
// // array_pop($list);
// // array_shift($list);
// // array_unshift($list, "eman");
// // unset($list[1]);

// $list[] = "new value";
// print_r($list);

// $list = [
//     [1,3,4],
//     [
//         [1,3,40],
//         [6,5,2]
//     ],
//     [3,7,6]
// ];

// echo $list[1][0][2];

$person = [
    "name" => "eman",
    "address"  => "cairo",
    'zip'=> 15623,
];

// // echo  gettype($person);

// $person['name'] = "eman mohamed";

$person['age'] = 20;
// unset($person['name']);
// // array_push($person,20 );
// print_r($person);

// echo count($person);
// for($i=0; $i<count($person); $i++)
// {
//     echo $person[$i] . "<br>";
// }
// {
//     name: "eman",
//     address: "cairo"
// }

// foreach ($person as $key => $value){
//     echo $key . ": " . $value . "<br>";
// }

// $fun = function ($name){
//     $msg = "hello, " . $name;
//     echo $msg;
// }

//  fun("eman");

// $list1 = [1,2,3,1];
// $list2 = [2,3,1];

$list1 = ['name'=> "eman", "address" => "giza"];
$list2 = ["address" => "giza", 'name' => "eman"];
// $list2 = ['address'=> "cairo", 'age'=> 10];
// print_r($list1 + $list2)  ;

// print_r(array_merge($list1, $list2));
// var_dump($list1 !== $list2)
$list = [6,2,90];
$list2 = ['name' => "eman", 'address' => "cairo", 'age' => 10];
// sort($list2);
// arsort($list2); // sort according to value
krsort($list2); // sort according to value
print_r($list2);

/**
 * sort() => sort ascending according value, apply on indexing & assosiative array
 * rsort() => sort descending according value,  apply on indexing & assosiative array
 * ksort() => sort ascending according key, apply on assosiative array
 * krsort() => sort descending according key, apply assosiative array
 * asort() => sort ascending according, apply on ssosiative array
 * arsort() => sort descending according, apply on ssosiative array
 * 
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome there</h1>
    <table>

    </table>
    <!-- <?php 
    foreach($person as $k => $v){
        echo "<p> <span style='color:red'>" .
        $k
        .": </span>".
        $v
        
        ."</p>";
    }
    ?> -->
</body>
</html>