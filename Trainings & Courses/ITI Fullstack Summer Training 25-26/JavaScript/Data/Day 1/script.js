// //TODO:edit this line

// //console.log("This is a test log message.");
// /*

// swedfrgtyuj
// wdefrty
// */
// /**
//  * dff
//  * sddf
//  * ggh
//  */


// var x = 10;
// // console.log(x);

// var x="eman";
// // console.log(x);

// var x = null;
// /**
//  * string => '' , ""
//  * boolean => true, false
//  * number => integer, float, double
//  * null => empty value
//  * undefined => no value
//  * array => list [10, 'dfg', [], true]
//  * object => {key: value, key2: value2, ...}
//  */

// var list = ['eman', 20];
// var person = {
//     age:20,
//     name: 'eman',
// }

// let y =30;
// // console.log(y);


// console.log(address);
// var address = "Egypt";

// // hoisting => access variable before declaration (initialization)

// /**
//  * declaration => var , let 
//  * assignment => var, let
//  * redeclaration => var
//  * reassignment => var, let
//  * initialization => var, let
//  */

// // var a; // declaration
// // a= 10; // assignment
// // var x =10; // initialization
// // x=30; // reassignment

// // let  v= "eman"; // redeclaration
// // console.log(v);
// // let v = "eman2"; // redeclaration

// // let q= 10;
// // {
// //    let q = 20;
// //  console.log("inner block: ", q);  // 20
// // }
// // console.log( "outer block: ",q); // 10


// {
//     var s= 10;
//  console.log("inner block: ", s);  // 10
// }
// console.log( "outer block: ",s); // 10

// /**
//  * var => hoisting => access before declaration
//  * var => global scope
//  * let => block scope
//  * var => redeclaration
//  * let => no redeclaration
//  */

// // const variable
// const pi = 3.14; 
// const l = 10;

// /**
//  * name conevention
//  * start with letter,_ , $
//  * conatin number 
//  * var let for in
//  * case sensitive => age , Age, aGE
//  * -  special character not allow
//  * * camelCase => firstName, lastName, userName, user_name, username
//  */

// // let firstName = {name: "eman"};
// // console.log(typeof(firstName));

// // let num = new Number(10);
// // console.log((num));

// /**
//  * falsey values
//  * false
//  * 0
//  * null
//  * ''
//  *""
//  undefined

//  */


//  // + - * / % **
// let a = 22;
// // let b = 4;
// // console.log('a % b = ', a % b);

// a=10;
// let z = 30;

// // a = z;
// // console.log('a = ', a);

// // a =a +z; // a+=z
// // a-=z;
// // a = a+1;
// // a+=1; 
// // a++;
// // ++a;

// // a = 10;
// // // console.log('a = ', ++a); // 11
// // // console.log('a = ', a++); // 10 a=11

// // // a+=1;
// // ++a;
// // console.log(a);

// // let w = "10";
// // let d = "20";
// // console.log('w + d = ', w + d); 

/**
 * comparison operators
 * == => compare value
 * === => compare value and dataType
 * != => compare value
 * !== => compare value and dataType
 * >    => greater than
 * <    => less than
 * >=   => greater than or equal to
 * <=
 */

// console.log("10"!==10)

/**
 * logical operators
 * && => and true => both conditions are true
 * || => or false => both conditions are false
 * !  => not true => false, false => true
 */
           // true || false => true
           // true && false => false
// console.log(20!=10 && 30<20); // true 

let password = 21565566995651;
console.log(password.length);
console.log(typeof password != "string");
// if(typeof(password) != 'string'){
//     alert("password must be string");
// }else if(password.length < 4){
//     alert("password must be at least 4 characters");
// }
// else if(password.length > 10){
//     alert("password must be at most 10 characters");
// }else{
//     alert("password is valid");
// }
// if(typeof(password) != 'string'){
//     alert("password must be string");
// }

// if(password.length < 4){
//     alert("password must be at least 4 characters");
// }
 
// if(password.length > 10){
//     alert("password must be at most 10 characters");
// }else{
//     alert("password is valid");
// }

// let age = 20;
// console.log(age);

// nested if

// let a = 10;
// let b = 200;
// let c = 30;

// if(a>= b && a>=c){
    
//     if(b>=c){
//         console.log(" a>b>c  a b c: ", a, b, c);
//     }else{
//       console.log("a>c>b a c b: ", a, c, b); 
//     }
// }else if(b>=a && b>=c){
//     if(a>=c){
//         console.log(" b>a>c  b a c: ", b, a, c);
//     }else{
//         console.log("b>c>a b c a: ", b, c, a);
//     }
// }else{
//     if(a>=b){
//         console.log(" c>a>b  c a b: ", c, a, b);
//     }else{
//         console.log("c>b>a c b a: ", c, b, a);
//     }
// }

// switch 
// switch(expression){
//     case value: 
//         // code block
// }

// grade
let grade = "q";
switch(grade){
    case "A":
        console.log("Excellent");
        break;
    case "B":
        console.log("Very Good");
        break;
    case "C":
        console.log("Good");
        break;
    case "D":
        console.log("Pass");
        break;
    case "F":
        console.log("Fail");
        break;

    default:
        console.log("Invalid Grade");
}

// alert("sdfg");
// let userName =  +prompt("Enter your name: ");
// // userName = parseInt(userName);
// // userName = Number(userName);
// console.log('Welcome ', userName);
// console.log('type ', typeof userName);

// let response = confirm('are you sure to continue?');
// if(response){
//     console.log('User confirmed');
// }else{
//     console.log('User cancelled');
// }


