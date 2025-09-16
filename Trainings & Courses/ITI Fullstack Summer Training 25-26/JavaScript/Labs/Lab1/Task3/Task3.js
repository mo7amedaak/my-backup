let A = Number(prompt("Enter first number"));
let B = Number(prompt("Enter second number"))

let result = (A % B == 0 || B % A == 0) ? "Multiples" : "No Multiples";

console.log(result);