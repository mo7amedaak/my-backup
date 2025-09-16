///////////////////// Task1 \\\\\\\\\\\\\\\\\\\\\\\\
// function Factorial(num){
//     let result = 1;
//     for(let i = 1;i <= num;i++){
//         result*= i;
//     }
//     return result;
// }
// let num = prompt('Enter the number');
// num = Number(num);
// if(isNaN(num) || num < 0){
//     alert('Error! Please enter positive numbers only!');
// }else{
//     console.log('Factorial = ',Factorial(num));
// }

////////////////////// Task2 \\\\\\\\\\\\\\\\\\\\\\\\
// function Calculate(operator,...arr){
//     let numbers = arr.filter(function (item){
//         return typeof item === 'number' && !isNaN(item);
//     });

//     if (numbers.length < 2)
//         return null;

//     let result = numbers[0];

//     for(let i =1 ; i < numbers.length; i++){
//         let num = numbers[i];
//         switch(operator){
//             case '+':
//                 result+=num;
//                 break;
//             case '-':
//                 result-=num;
//                 break;
//             case '*':
//                 result*=num;
//                 break;
//             case '/':
//                 num == 0 ? alert('Error! Cannot devide by zero'):result/=num;
//                 break;
//             case '^':
//                 result**=num;
//                 break;
//             default:
//                 alert('Error! Invalid operator.')

//         }
//     }

//     return result;
// }

// console.log(Calculate('+',1,2,3));
// console.log(Calculate('*',2,'x',4));
// console.log(Calculate('^',2,3));
// console.log(Calculate('-','a',5));

//////////////////////////// Task3 \\\\\\\\\\\\\\\\\\\\\\\\\\

// function isEcellentOrGoodStudent(student){
//     return student.grade === 'A' || student.grade ==='B';
// }

// let Students = [
//     {name: 'Ahmed', age: 20 , grade: 'A'},
//     {name: 'Mohamed', age:22, grade:'B'},
//     {name: 'Sally', age:19, grade:'B'},
//     {name: 'Nadine', age:21, grade:'C'}
// ];

// let goodStudents = Students.filter(isEcellentOrGoodStudent);
// console.log(goodStudents);

/////////////////////////// Task4 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

let products = [
  {
    title: 'Iphone11',
    description: 'smartphone with high quality camera',
    price: 1000,
    discountFun: function(percent) {
      this.price -= this.price * (percent / 100);
    }
  },
  {
    title: 'Macbook',
    description: 'laptop with high performance and quality',
    price: 10000,
    discountFun: function(percent) {
      this.price -= this.price * (percent / 100);
    }
  },
  {
    title: 'Headphone',
    description: 'noise cancelling high quality headphones',
    price: 200,
    discountFun: function(percent) {
      this.price -= this.price * (percent / 100);
    }
  }
];

let userInput = prompt("Enter search text:").toLowerCase();

let filteredProducts = products.filter((product) =>
  product.title.toLowerCase().includes(userInput) ||
  product.description.toLowerCase().includes(userInput)
);

document.write('<h1>Filtered Products</h1>');

if (filteredProducts.length > 0) {
  filteredProducts.forEach(product => {
    product.discountFun(20);
    document.write(`<h3>${product.title}</h3>`);
    document.write(`<p>${product.description}</p>`);
    document.write(`<p>Discount Price: $${product.price}</p>`);
    document.write('<hr>');
  });
} else {
  document.write('<p>No products match your search.</p>');
}


