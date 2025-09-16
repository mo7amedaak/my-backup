

//////////// Task1 \\\\\\\\\\\\\\

// let numbers = [10,20,30,40,50];
// console.log(numbers);
// console.log('the first element is : ',numbers[0]);
// console.log('the last element is : ',numbers[4]);
// let modifiedarr = [...numbers];
// modifiedarr.push(60);
// modifiedarr.shift();
// modifiedarr.splice(1,0,25);
// console.log('the modified array is : ',modifiedarr);

//////////// Task2 \\\\\\\\\\\\\\\

// let array = [10,50,40,30,20];
// let max = array[0];
// for(let i = 1;i < array.length;i++){
//     if(array[i] > max){
//         max = array[i];
//     }
// }
// console.log('the maximum number = ',max);

/////////// Task3 \\\\\\\\\\\\\\\\\

// let arr = [10,20,30,40,50];
// let sum = 0;
// let arr2 = [10,15,20,25,30];
// for(let num of arr){
//     sum+=num;
// }
// let arr3 = [];
// for(let num of arr2){
//     if(num%2 == 0){
//         arr3.push(num);
//     }
// }
// console.log('the sum = ',sum);
// console.log('the even numbers array is : ',arr3);

////////////// Task4 \\\\\\\\\\\\\\\\\\

// let Arr = [10,20,30,40,50];
// let counter = 0;
// for(let num of Arr){
//     if(num > 25){
//         counter++;
//     }
// }
// console.log('Count = ',counter);

//////////////// Task5 \\\\\\\\\\\\\\\\\\

// let text = prompt('Enter a long text').trim();
// let word = prompt('Enter the word').trim();
// let position = text.indexOf(word);
// if(position == -1){
//     alert('the word you have iserted is not exist.');
// }else{
//     alert(`the word you have iserted is at index : ${position}`);
// }

/////////////////// Task6 \\\\\\\\\\\\\\\\\\
// let Numbers = [10,80,60,15,10,3,6,10];
// let positions = [];
// let element = 10;
// let index = Numbers.indexOf(element);
// while(index !== -1){
//     positions.push(index);
//     index = Numbers.indexOf(element , index + 1);
// }
// console.log('the positions of the element is : ',positions);

///////////////// Task7 \\\\\\\\\\\\\\\\\\\\

// First point :-
function removeDupilcates(arr){
    let uniqueArr = [];
    for(let num of arr){
        if(uniqueArr.indexOf(num) == -1){
            uniqueArr.push(num);
        }
    }
    return uniqueArr;
}
let arr = [10,20,30,20,10,40];
console.log('the new array is : ',removeDupilcates(arr));

// Swap part :-
let x = 10;
let y = 20;
x = x + y;
y = x - y;
x = x - y;
console.log('x = ',x);
console.log('y = ', y);


// password

const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{};:,.<>?/|";
let pass = "";

for (let i = 0; i < 12; i++) {
  const randomIndex = Math.floor(Math.random() * chars.length);
  pass += chars[randomIndex];
}

console.log("Password:", pass);


