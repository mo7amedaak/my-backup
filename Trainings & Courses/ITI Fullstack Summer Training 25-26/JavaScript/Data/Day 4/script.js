
// // selecting elemennts
// // let pragraph = document.getElementById("f-p"); // element // null

// // console.log(pragraph);

// // let pragraphs = document.getElementsByClassName('prag')
// // // for (let index = 0; index < pragraphs.length; index++) {
// // //     let element = pragraphs[index];
// // //     console.log(element);
 
// // // }

// // let prags = document.getElementsByTagName("div");
// // // // console.log(prags);

// // // for(let i=0; i<prags.length ; i++){
// // //     console.log(prags[i]);
    
// // // }

// // let p = document.querySelector("div p.prag"); // take css selector
// // console.log(p);
// // // let elements = document.querySelectorAll("div p.p"); // take css selector

// // console.log(elements);
// // elements.innerHTML = "wer"; // wrong 

// // for (let index = 0; index < elements.length; index++) {
// //     const element = elements[index];
// //     element.innerHTML = "eman";
// // }
// /****************************** */ 

// // change element content
// // elements.innerHTML = "esdrf";
// // let pragraph = document.getElementById("f-p"); // 
// // console.log(pragraph)
// // let content = pragraph.innerHTML;
// // let content2 = pragraph.innerText;
// // console.log('content1: ', content);
// // console.log('content2: ', content2);

// // pragraph.innerHTML = "<span style='color:green'>span</span>";
// // pragraph.innerText = "defr";
// // // pragraph.textContent // search

// // document.title = "Dom"

// // // document.body= "";
// // console.log(document.links)
// /************************************ */

// //dealing with attribute
// // let pragraph = document.getElementById("f-p"); // 

// // get attribute value
// // console.log(pragraph.className);
// // console.log(pragraph.getAttribute("class"));

// // set attribute
// // pragraph.className ="new"
// // console.log(pragraph);
// // pragraph.setAttribute("class", 'newAtt')

// // has attribute
// // console.log(pragraph.hasAttribute('class'))

// // remove attribute
// // pragraph.removeAttribute('class')

// /********************* */

// // classList
// // let classNames = ['class1', 'class2']
// // pragraph.classList.add("newatt", "test", 'className')
// // pragraph.classList.add(...classNames)
// // console.log(pragraph);
// // // console.log(pragraph.classList.contains('prag'))
// // // pragraph.classList.remove('newatt', 'test')
// // pragraph.classList.toggle('className')
// /*********************** */

// // change css style

// // console.log(pragraph.style);

// // pragraph.style = "color:blue; font-size: 30px";
// // pragraph.style.backgroundColor = "black"
// // pragraph.style.color = "green";
// // pragraph.style.fontSize= "10px"
// // pragraph.style = "background-color:black";


// // let images = document.getElementsByTagName('img');

// // for (let img of images) {
// //    if(!img.hasAttribute('alt')){
// //     img.setAttribute('alt', 'default alt')
// //    }
    
// // }
// /******************************* */

// // Create New Elements

// // document.createElement('tagName')

// // select parent
// let section = document.getElementById('section');

// //create child
// let heading = document.createElement('h1');

// // add child to parent
// section.appendChild(heading)

// heading.innerText = "this is heading"

// let products = [
//   {
//     title: "card 1",
//     content: "swefrghj asdfgh sdfghj",
//     img: "https://www.pexels.com/photo/painting-a-handmade-mug-18960521/",
//     linkUrl: "https://google.com",
//     linkText: "buy now",
//   },
//   {
//     title: "card 2",
//     content: "eman asdfgh sdfghj",
//     img: "https://images.pexels.com/photos/32507137/pexels-photo-32507137.jpeg?_gl=1*1qbjrm6*_ga*MzkyNjM1ODUwLjE3NTIzOTI3MzA.*_ga_8JE65Q40S6*czE3NTIzOTI3MjkkbzEkZzEkdDE3NTIzOTM3OTIkajYwJGwwJGgw",
//     linkUrl: "https://google.com",
//     linkText: "click her",
//   },
// ];
// products.forEach((product)=>{
// let card = createCard(product)
// section.appendChild(card)
// })
// // let card = createCard();
// // let data = {
// //   title: "card 2",
// //   content: "eman asdfgh sdfghj",
// //   img: "https://images.pexels.com/photos/32507137/pexels-photo-32507137.jpeg?_gl=1*1qbjrm6*_ga*MzkyNjM1ODUwLjE3NTIzOTI3MzA.*_ga_8JE65Q40S6*czE3NTIzOTI3MjkkbzEkZzEkdDE3NTIzOTM3OTIkajYwJGwwJGgw",
// //   linkUrl: "https://google.com",
// //   linkText: "click her",
// // };
// // let card2 = createCard(data);
// // console.log(card)
// // section.appendChild(card);
// // section.appendChild(card2);
// // // create textNode
// // let content = document.createTextNode("this is heading");

// // heading.appendChild(content)


// // let comment = document.createComment("this is comment")

// // // let p = document.querySelector('section#section>p')
// // let p =section.querySelector('p')


// // // section.appendChild(comment)
// // section.insertBefore(comment,p)

// // {
// //     title: 
// //     content: 
// //     img: 
// //     linkUrl:
// //     linkText:
// // }

// create card
// function createCard(data){
//     let cardDiv = document.createElement('div');
//     let img = document.createElement('img');

//     let cardBody = document.createElement('div')
//     let heading = document.createElement('h5')
//     let content = document.createElement('p')
//     let link = document.createElement('a')


//     cardDiv.className="card";
//     cardDiv.style="width: 18rem";

//     img.src = data.img;

//     img.classList.add('card-img-top')
//     img.setAttribute('alt', 'product img')

//     img.width =" 100"
//     img.height =" 100"
//     cardBody.className ="card-body"

//     heading.classList.add('card-title')

//     content.className = 'card-text'

//     link.href = data.linkUrl

//     link.classList.add("btn", 'btn-primary')

// cardDiv.appendChild(img);
// cardDiv.appendChild(cardBody)
// cardBody.appendChild(heading)
// cardBody.appendChild(content)
// cardBody.appendChild(link)

// heading.innerHTML =data.title;
// content.innerHTML = data.content;

// link.innerHTML = data.linkText


// return cardDiv

// }

/******************************** */

// events

let btn = document.getElementById('btn');
let userName = document.getElementById('user-name');
let userEmail = document.getElementById('user-email');
let result = document.getElementById("user-name-result");

// btn.onclick = function(event){
// // event.preventDefault(); // prevent default behavior of event click

//   btn.style.backgroundColor = "red"
// }
// btn.ondblclick = function(event){
// // event.preventDefault(); // prevent default behavior of event click

//   btn.style.backgroundColor = "green"
// }


// document.getElementById('icon').onclick = function(){
//   let menu = document.getElementById('menu');
//  console.log(menu.style.display);
 
//  if(menu.style.display == 'none'){
//    menu.style.display="block"
//   }else{
//    menu.style.display="none"

//  }
// }

// userName.onfocus = function(event){
//   userName.style.backgroundColor = 'green'
//   userName.style.outline = 'red 2px solid'
//   // userName.style.width = "500px"
// }
// userName.onblur = function(event){
//   userName.style.backgroundColor = 'white'
//   userName.style.width="200px"
// }

function printInput(event){
  
  console.log(event.target.value);
  
  result.innerHTML += event.target.value;
}
userName.onkeyup = printInput
userEmail.onkeyup = printInput
// userName.onkeydown = function(event) {
//   result.innerHTML = userName.value
// }

let form = document.getElementById('my-form')
console.log(form);

form.onsubmit = function(e){
  alert("form sumbit")
  e.preventDefault();
  if(userName=""){
    alert('error')
  }
  else{
    form.submit()
  }
}

// window.onload = function(){
//   alert("page is loaded")
// }

//TODO:
// addEventListener => search 
/*********************** */
// JS timing
// set and clear interval
// let count = 0;
// let interval = setInterval(()=>{
// console.log(++count);
// if(count>=10){
//   clearInterval(interval);
// }

// }, 1000)


// set timeout

// setTimeout(() => {
//   alert("welcome")
// }, 2000);
/******************* */

// BOM
// Browser object model
// window => document => html elements

// console.log(window.innerHeight);
// console.log(window.innerWidth);
// console.log(window.scrollX);

// let newWindow = window.open("https://github.com/", "_blank", {
//   width: 2000,
//   hieght: 200,
// });

setTimeout(()=>{
  // newWindow.close();
  /**
   * window location
   */
  location.assign(
    "https://developer.mozilla.org/en-US/docs/Web/API/Window/location")
  location.replace(
    "https://developer.mozilla.org/en-US/docs/Web/API/Window/location")
  location.href= 
    "https://developer.mozilla.org/en-US/docs/Web/API/Window/location"
  ;
}, 2000)
/********** */
// document
// history
// screen
// location
// navigator

// window history
// history.go(-1) //back to previous page
// history.go(1) //forward to next page






