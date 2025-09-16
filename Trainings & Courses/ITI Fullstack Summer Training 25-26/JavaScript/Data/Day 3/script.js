// // array destructing

// // let [a, ,b] = [1,2,3];
// // console.log("a: ", a)
// // console.log("b: ", b)

// // let x=10;
// // let y= 20;
// // // [x,y] =[3,6];
// // [x,y] = [y,x];
// // // x=3;
// // console.log("X: ", x);
// // console.log("Y: ", y);

// // // object destructing

// // let person = {
// //     name: "eman",
// //     address : "cairo",
// //     age: 10
// // }

// // let perName = person.name;
// // let perAge = person.age

// // let {name, age} = person

// // console.log(name);
// // console.log(age);


// // function => block of code 
// // console.log("php");

// // print("ahmed");

// // declare function
// function print(name){ // parameter
//     // let name = "eman"
//     console.log("welcome ", name);
// }

// // console.log("php");
// let username = "mohamed";
// // call function
// // print(username); // argument


// // function sumTwoNumber(num1, num2){

// //     // return 10;
// //     console.log(`${num1} + ${num2} = ${num1+ num2}`);

// //     return num1+ num2

// // }

// // let output = sumTwoNumber(11,6)
// // let output2 =sumTwoNumber(10,8)

// // console.log("output: ", output);
// // console.log("output2: ", output2);

// // if(output>10){
// //     console.log("greater than 10");
    
// // }

// // let str= "wdefr gthy";
// // let result = str.split(" ");
// summation(3,2)
// // regular function / decalration/ statement function
// function summation(...items){ // rest operator
//     console.log('items', items);
    
// let sum = 0; // undefined
//     for(let item of items){
//         sum+=item;
//     }
//     console.log('sum: ', sum);
//     return sum;
    
// }
// let product = {
//     getDetails: function frt(){
//         console.log('details');
        
//     }
// }

// // product.getDetails();

// // myFun("ahmed")

// // expression function
// const myFun = function(name){
//     console.log('welcome there ', name);
    
// }

// // printV2();
// // arrow function
// const addPaddingToNum = (str, padding) =>{
//     str = str.padStart(4,padding)
//     console.log('str: ', str);
    
// }
// const printV2 = str => console.log('str: ', str);

// // const printV3 = (str) => {
// //     var text = "welcome"; // local scope
// //     console.log('text inside fun: ', text);
    
// //   console.log("str: ", str);
// // //   console.log("test")
// // };

// // console.log('text outside function: ', str); // error is not defined


    


// printV3("wergth");

// // addPaddingToNum("12","0");

// // myFun = 10;
// // myFun("eman")




// // // summation(1,3);
// // let ar = [1,20];
// // let z = [...ar]; // spread operator// 1,20



// callback function is a function passed as a prameter to another function

function incrementNum(num, calledFun){
num++;

calledFun("the number after increament is: " + num);
// return num;

}

//  incrementNum(25,alertMessage);
//  incrementNum(30,logMessage);
//  incrementNum(80,printMessage);


// function alertMessage(msg){
//     alert(msg);
// }
// function logMessage(msg){
//     console.log(msg);
// }
// function printMessage(msg){
//     document.write(`<p>${msg}</p>`)
// }



// self Invoked function
// (()=>{
//     console.log("self invoked function")
// })();

function createDiv(head, body){
    let content = `
    <div>
    <h1 style="color:red">${head}</h1>
    <p>${body}</p>
    </div>
    `;

    document.write(content)
}

// createDiv("session 3", "we talk about functions and rest operator")

// logX();

// showMessage("welcome there")

// for while do while for in for of


let list = [1,2,7, 8];
// for(let item of list){
//     document.writeln(item)
// }

// function logListItem(item){
//     document.writeln(item);
// }
// list.forEach(logListItem);

let res = list.forEach(function(item, index){
    
    // document.writeln(`
    //     <p>
    //     index ${index} : ${item*3}
    //     </p>`);

        // return 10; not allow return
});

// console.log('res: ', res);

 list = list.map( (item, index) => {
    return item*3
//   document.writeln(`
//         <p>
//         index ${index} : ${item * 3}
//         </p>`);
        
//   if(item>0){
//     return item*3
//   }
});

// console.log(mapRes);

let filterRes = list.filter(function(item){
    if(item%2 == 0){
        return true
    }
});

// console.log(filterRes);
/**
 * foreach , map, filter loop over array
 * foreach => print / log data (element) console/document
 * foreach doesn't return value => return undefined
 * map => return all array elements after modification
 * [undefined,undefined,undefined,undefined] => map function return array with undefined values instead of item values if not return anything;
 * 
 * filter => filter (extract specific element from array according to condition) 
 * filter function return empty array if not return anything
 * 
 */


let filterRes2 = list.filter( (item) =>  (item % 2 == 0) ); // arrow function

let list2 = [2,4,6,8];

// every 
/**
 * every function return true or false
 * check if all element match the condition
 */

/**
 * some function return true or false
 * check if some elements of array catch / match condition
 */

// let everyRes = list2.every((item)=>{
//     if(item%2==0){
//         return true
//     }
// })

// console.log(everyRes);


// let someRes = list2.some((item) => {
//     if (item % 2 != 0) {
//         return true;
//     }
// });

// console.log(someRes);


/**
 * reduce function
 */

let list3 = [3, 4, 6, 8];

let sumRes = list3.reduce((sum, item)=>{
        sum+=item

        return sum;
}, 10);

// console.log(sumRes);

// let li = [2,3,4,5];
// let newArr = [];
// for (let item of li) {
//     // let item = li[i]
//     if(item>-1){
//         newArr.push(item);
//     }
//     item = item*3
// }

// for (let index in li) {
//   li[index] = li[index] * 3;
// }

// console.log(li);

let str = "eman  5 mohamed 169 wmaefrg";
/**
 * \d => number(0-9)
 * \s => space
 * \w => word character A-Z a-z 0-9
 * \g => Global (find all matches)
 * \i => makes it case-insensitive
 * [...]	Any character inside brackets like [ack] any character of them a or c or k
 * [a-z] any character between a and z
 * [^...] => anything else or not the character inside brackets
 * {4} length of character is 4
 * {4,} minimun length of character is 4
 * {,4} max length of character is 4
 * {2,8} length of character between 2 and 8 (min 2 and max 8)
 * + => match the previous character one or more times.(One or more of the previous pattern)
 * [a-z]+ => that means match One or more of lowercase letters 
 */
// let pattern = /\d/g
let pattern = /E/ig
// console.log(pattern.test(str));
// console.log(str.search(pattern)) // rerturn index of matched text with pattern
// console.log(str.replace(pattern, "*"));

let phone = "rASDCFHG@";
let pat = /^[a-z][AZ]{3,6}[@]$/g
console.log(pat.test(phone));
let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


let phonePattern = /^\+20 1[0-2]{1}[0-9]{8}/

console.log(phonePattern.test("+20 1269656942"));





