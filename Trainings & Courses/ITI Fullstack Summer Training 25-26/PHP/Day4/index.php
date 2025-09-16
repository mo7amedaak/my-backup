<?php

/**
 * access modifiers
 * public => access inside and outside class, inheret (extend)
 * private => access only inside class , can't inheret(extend)
 * protected => access only inside class, can inheret (extend)
 */

// base class parent class
abstract class product
{
    protected $productName;
    protected $productdescription;
    protected $productprice;
    protected $productdiscount;
    protected $amount;


    function __construct($name, $description, $price)
    {
        $this->productName = $name;
        $this->productdescription = $description;
        $this->productprice = $price;
        $this->productdiscount = 0;
        $this->amount = 10;
        echo "product constructor <br>";
    }
    function setDiscount($discount)
    {

        $this->productdiscount = $this->calculateDiscount($discount);
    }

    private function calculateDiscount($discount)
    {
        return $this->productprice * ($discount / 100);
    }

    function applyDiscount()
    {
        return $this->productprice - $this->productdiscount;

        // $x = $x -$y; // $x-=2
    }


    function getPrice()
    {
        return $this->productprice;
    }
    function getDiscount()
    {
        return $this->productdiscount;
    }


    function getName()
    {
        return $this->productName;
    }
    function setName($name)
    {
        $this->productName = $name;
    }

    function getAmount()
    {
        return $this->amount;
    }

    abstract function logData();
}

// $product1 = new product('table', 'ertyh', 100);

// $product1->logData();

// // sub class / child class
class PhysicalProduct extends product
{
    // use traitName;
    private $weight;
    private $color;
    private $material;


    function __construct($name, $description, int $price, $weight, $color, $material)
    {

        $this->productName = $name;

        $this->productdescription = $description;
        $this->productprice = $price;
        $this->productdiscount = 0;
        $this->weight = $weight;
        $this->color = $color;
        $this->material = $material;
    }


    function shippingCost()
    {
        $baseFee = 20;

        return $baseFee * $this->weight;
    }

    function logData()
    {

        echo "name: " . $this->productName . "<br>";
        echo "description: " . $this->productdescription . "<br>";
        echo "price: " . $this->productprice . "<br>";
        echo "discount: " . $this->productdiscount . "<br>";
        echo "amount: " . $this->amount . "<br>";

        echo "weight: " . $this->weight . "<br>";
        echo "color: " . $this->color . "<br>";
        echo "material: " . $this->material . "<br>";
        echo "shipping cost: " . $this->shippingCost() . "<br>";
    }
}

class p2
{
    public $x;
    public $y;
}
// polymorphism
// override => more than function with the same prototype (function name + prameters) one overide the other , diff tthe implementation (code)
// overloading => 

// function sum(){
//     echo "sum";
// }


// function sum(){
//     echo "test";
// }


// function sum($n1,$n2){
//     return "wsdfg";
// }

class category
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }
}
class digitalProduct extends product
{

    private $size;
    private $downloadlink;
    private $category;

    public static $count=0;
    public const x = "10";


     static function countOfObject(){
        echo "count: ". self::$count ."<br>";
    }


    function __construct(string $name, string $description, float $price, int $fileSize, string $downloadlink, category $category)
    {
        parent::__construct($name, $description, $price);

        $this->size = $fileSize;
        $this->downloadlink = $downloadlink;
        $this->category = $category;
        // echo "const: ". self::x;
        self::$count++;
    }


    function getDownloadLink()
    {
        return $this->downloadlink;
    }
    function getCategory()
    {
        return $this->category;
    }

    // overloading => change definition of function (declaration) => not allowed in php

    // override => over write code of function 
    function logData()
    {
        echo "name: " . $this->productName . "<br>";
        echo "description: " . $this->productdescription . "<br>";
        echo "price: " . $this->productprice . "<br>";
        echo "discount: " . $this->productdiscount . "<br>";
        echo "amount: " . $this->amount . "<br>";

        echo "size: " . $this->size . "<br>";
        echo "downloadlink: " . $this->downloadlink . "<br>";
    }
    // function printData(){
    //     echo "name: ", $this->productName . "<br>";
    //     echo "description: ", $this->productdescription . "<br>";
    //     echo "price: ", $this->productprice . "<br>";
    //     echo "size: ", $this->size . "<br>";
    //     echo "link: ", $this->downloadlink . "<br>";
    // }
}

// composition
$cat = new category('online books');

$p1 = new digitalProduct('e-book', 'sdfgh', 100, 500, 'https://sdfghj.com', $cat);

$p2 = new digitalProduct('dfdgh', 'sdfgh', 100, 500, 'https://sdfghj.com', $cat);
$p2 = new digitalProduct('dfdgh', 'sdfgh', 100, 500, 'https://sdfghj.com', $cat);
// $p2 = new PhysicalProduct('table', 'sdfgh', 100, 5, 'red', "category");


$p1 = new digitalProduct('e-book', 'sdfgh', 100, 500, 'https://sdfghj.com', $cat);

//  $p1->countOfObject();

digitalProduct::countOfObject();
 
// echo "const out: " . digitalProduct::x;

// print_r($p1->getCategory()->getName());


// $p1->setDiscount(20);


// print_r("price: " . $p1->getPrice()  . "<br>");
// print_r("discount: " . $p1->getDiscount()  . "<br>");

// print_r("price after discount: " .  $p1->applyDiscount() . "<br>");





// $product2 = new product('e-book', 'ertyh', 2000, 'size', 'url' );

// $product1 = new product('milkb', 'dafgh asdfg sdf', 80);

// $product2 = new product('egg', 'wert', 30);



// echo $product1->productdiscount = 25 ;
// $product1->productdescription = "werty erty";
// $product1->productprice = 300;
// print_r($product1);

// $product1->createDiscount(10);

// $product1->setDiscount(20);

// // print_r($product2);
// $product1->setName("milks");

// print_r("name: " . $product1->getName()  . "<br>");
// print_r("price: " . $product1->getPrice()  . "<br>");
// print_r("discount: " . $product1->getDiscount()  . "<br>");

// // $product1->createDiscount(10);

// print_r("price after discount: ".  $product1->applyDiscount() . "<br>");

// print_r("price: " . $product1->getPrice()  . "<br>");
