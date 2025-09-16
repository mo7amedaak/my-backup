// for loop
// console.log(1)
// console.log(2)

// for(expersion1; condition; expersion2){
//     // code to be executed
// }

// expression 1 => start point  1 step
// condition => check if the condition is true or false step 2
// block of code  3 step
// expression 2 => increment or decrement step 4
// for(let i = 1; i<=100; i++){
//     console.log(i)// 1
// }

// for(let i= 100; i>=1; i--){
//     console.log(i)// 100
// }
// for(let i =1; i<=100; i++){
//     if(i%2 ==0){
//         console.log(i)
//     }
// }

// let text = "eman mohamed elsayed";
// let short = "";
// for(let i = 0; i<text.length; i++){
    
//     if(text[i] == " "){
//         console.log(short);
//         short = "";
//     }else{
//         short += text[i];
//         if(i == text.length-1){
//             console.log(short);
//         }
//     }
// }


// while(condition){
    
// }

// let i=1;
// while(i<=10){ 
//     console.log(i);

//     i++;
// }

// let age = +prompt("enter your age");
// while(isNaN(age)){
//     age = +prompt("please enter a valid age");
//     console.log(age);
// }

// do while

// let i = 10;
// do {
//     console.log("this is do while loop");
//     console.log('i: ' + i);
    
//    i++;
// }while(i<=10);


// for(let i = 1; i<=10; i++){
//     console.log('start of the loop');
    
//     if(i%3 ==0){
//     //    continue; // skip the current iteration

//     break; // exit the loop
        
//     }
//     console.log(i);
    
// }

// arrays
let x =1;
let y= "wqewrg";
let flag = true;

// let list = [1, "fg", true, ["eman", [20]]]; 
// let list2 = [5, 100];
// console.log(typeof(list + list2)); // convert two list to string and concatenate them

// console.log(list.concat(list2));
//  list2 = list.concat(list2)
// console.log("list: ",list);
// console.log("list2: ",list2);

// list[5] = "mohamed";

// list.splice(2,0, 20, 30);
// console.log('list: ', list);

// list.push("new item", "new item3"); // add new item to the end of the array
// list.push("new item2"); // add new item to the end of the array
// // list[0] ="new ";

// list.unshift("new "); // add new item to the start of the array

// list.pop();
// list.shift();
// list.shift();
// console.log('list: ', list);
// console.log('list[4]: ', list[4]);
// let list2 = list[3];

// console.log('list2: ', list2);
// console.log(list[3][1][0]);

// console.log(list[3]);

// list[2];
let list = [40, 5,100, 6, 3, 100, 20, 100];
// list.sort((a,b)=> a-b);
// /**
//  * 40-5 > 1
//  * 40, 5, 100, 6, 3
//  * 5-100<1
//  * 40, 100, 5, 6,3
//  * 40, 100, 6,5,3 
//  * 100,40,6,5,3
//  */
// // list.reverse();
// console.log('list: ', list);

// list.join();
// console.log(list.join(" | "));

// console.log("first: ", list.indexOf(100)); // return the index of the first occurrence of the element
// console.log("second:",list.indexOf(100, 4)); // return the index of the first occurrence of the element
// console.log("third:",list.indexOf(100,6)); // return the index of the first occurrence of the element
// console.log(list.lastIndexOf(100)); // return the index of the first occurrence of the element

// console.log(list.includes(100)); // return true if the element is found in the array, false otherwise

let li = [1,2];


// let ti = li;

// li.push(3);
// ti.push(6);
// console.log("li: ", li);
// console.log("ti: ", ti);

// // spread operator ...

// let yk = [4,6];
// let op = [...li, ...yk, 45, 3 , "sdfg"]

// yk.push(100);
// console.log("li: ", li);
// console.log("yk: ", yk);


// object 
let product = {
    name: "product1",
    id: 1,
    price: 100,
    amount: 10,
    description: "this is product 1",
    isAvailable: true,
    details: {
        color: "red",
        size: "large",
        weight: "1kg"
    },
    getDetails: function(){ 
       console.log(`
        Product Name: ${this.name}, 
        Price: ${this.price}, 
        Amount: ${this.amount}`);
        
    }
}
let products = [
  {
    name: "product1",
    id: 1,
    price: 100,
    amount: 10,
    description: "this is product 1",
    isAvailable: true,
    details: {
      color: "red",
      size: "large",
      weight: "1kg",
    },
    getDetails: function () {
      console.log(`
            Product Name: ${this.name}, 
            Price: ${this.price}, 
            Amount: ${this.amount}`);
    },
  },
  {
    name: "product2",
    id: 1,
    price: 100,
    amount: 10,
    description: "this is product 1",
    isAvailable: true,
    details: {
      color: "red",
      size: "large",
      weight: "1kg",
    },
    getDetails: function () {
      console.log(`
        Product Name: ${this.name}, 
        Price: ${this.price}, 
        Amount: ${this.amount}`);
    },
  },
];

// for (let product of products) {
//     for (let key in product) {
//        console.log(`${key} : ${product[key]}`);
       
//     }
    
// }
// console.log(products[0].name);
// console.log(product["amount"])
// console.log(product.isAvailable)

// product.amount = 30;
// product['id'] = 3;
// product.position = "cairo"
// product.details.model = "ewrty"
// console.log(product.getDetails());

// let fName = "eman";
// let lName = "mohamed";
// document.write(`welcome ${fName} ${lName} <br>`);


// let obj1 = {
//     id: 1,
//     name: "eman",
    
// } 

// let obj2 = obj1;
// obj2.werty = "efrthy";

// // let obj2 = {
// //     ...obj1,
// //     address: "cairo",
// // }
// console.log(obj2);


// let listV = ["efrgth", 46, true];
// listV[0]
// listV[1]
// listV[2]
// for(let i = 0; i<listV.length; i ++){

//     console.log(listV[i]);
// }


// // for in  
// for (let i in listV) {
//   console.log(listV[i]);
// }

// for of 
// for (let item of listV) {
//   console.log(item);
// }


// for (let key in product) {
//     //   console.log(key , ": ",product[key]);
//       console.log(`${key} : ${product[key]}`);
//     }


let str = "    wefDFHsd fghj sdfg   eman    ";
// let res = str.split("");
// // console.log(res);

// console.log(str[3]);
// console.log(str.charAt(3));
// console.log(str.at(-3));

// console.log(str.slice(-6, -2)); // must start > end , accept nagative value
 
// console.log(str.toLowerCase())
// console.log(str.indexOf("fghjn"));
// console.log(str.trim());
// console.log("wd" + "Qwed");
// console.log(str.concat(" eman", "dwefrtg, eman"))
// str += str.concat("wfrgt", "dwefrtg eman ", "sdfg", " eman");
// console.log(str.replace("eman", "mohamed"));
// console.log(str.replaceAll("eman", "mohamed"));
// 0120
// 0012
// let num = "12";
// console.log(num.padStart(4, "0"))
// console.log(num.padEnd(4, "0"))

// console.log(Math.round(5.6));
// console.log(Math.ceil(5.3));
// console.log(Math.floor(5.9));
// console.log(Math.random()); // return a random number between 0 and 1
// console.log(Math.floor(Math.random()*10));  // form max 0 : 10
// console.log(Math.floor(Math.random()*(10-3)+3));  //between 3 and 10 // min and max



/*
task 6 solution
• Apply the functionality of arr.indexOf(element) function but want to return all
positions of the element.
• Example:
let arr = [10,80,60,15,10,3, 6,10]; // Output: position at [0, 4,7 ]
*/

// solution
let num = 10;
let arr = [10, 30, 40,10, 4, 30, 10];
let start = 0;
let positions = [];

for(let i = 0; i< arr.length; start++){
  console.log('i: ', i);
  
    let pos = arr.indexOf(num, start);
    if(pos == -1){
        break;
    }else{
      positions.push(pos);
      start = pos ;
    }
}


// another solution
while(start < arr.length){
  let pos = arr.indexOf(num, start);
  if(pos == -1){
    break;
  }else{
    positions.push(pos);
    start = pos + 1;
  }
}

// another solution
let position = arr.indexOf(num, startIndex);
let positionsList = [];
while(position!=-1){
  positionsList.push(position);
  position = arr.indexOf(num, position + 1);

}
console.log("positions: ", positions);