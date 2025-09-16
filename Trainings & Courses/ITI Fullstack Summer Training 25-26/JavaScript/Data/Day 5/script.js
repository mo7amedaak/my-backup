// // synchorouns function => sequence => line by line
// function print(){
//   console.log('first');
//  second();

//   third();

// }

// function second(){
// // async function  => setTimeout setInterval , event , http request
//   setTimeout(()=>{
//     console.log('second');
//   },1000)

//   console.log('after second');

// }
// function third(){
// // async function  => setTimeout setInterval , event , http request
//   setTimeout(()=>{
//     console.log('third');
//   },200)

//   console.log('after third');

// }

// print();
// console.log('after print');
// //  setTimeout(() => {
// //    console.log("second");
// //  }, 0);

// //  console.log("Rf");

/**************** */

// callback and callback hell

function getSingleUser(users, id) {
  let filters = users.filter((user) => user.id == id);
  return filters[0];
}

function logMessage(msg) {
  console.log("message is: ", msg);
}
function printMessage(msg, fn) {
  // fn("message is: ", msg);
  document.write("message is: ", msg);
}
function alertMessage(msg) {
  alert("message is: " + msg);
}

function sum(n1, n2, printFun) {
  let sum = n1 + n2;
  printFun(`${n1} + ${n2} = ${sum}`);
}

// sum(2,3, logMessage)
// sum(2,3, alertMessage)
// sum(2,3, printMessage)

function getUsers() {
  let users = [];
  setTimeout(() => {
    users = [
      {
        id: 2,
        name: "eman",
      },
      {
        id: 4,
        name: "ahmed",
      },
    ];

    if (users.length > 0) {
      console.log("users returned: ", users);
    } else {
      console.log("error, failed request");
    }

    // let user = getSingleUser(users, 2);

    console.log("user: ", user);
  }, 100);
}

// arr.filter((item, index, array)=>{})
// async function
let promise = new Promise((resolve, reject) => {
  let users = [];
  users = [
    {
      id: 2,
      name: "eman",
    },
    {
      id: 4,
      name: "ahmed",
    },
  ];

  if (users.length > 0) {
    resolve({ users: users, msg: "success response" }); // success response
    // console.log("users returned: ", users);
  } else {
    reject({ msg: "failed request, no users data" });
    // console.log("error, failed request");
  }
});
let users = [];
promise
  .then((successResponse) => {
    users = successResponse.users;
    // console.log('result: ', users);
    return users[0];
  })
  .then((user) => {
    // console.log('another then: ',user);
  })
  .catch((error) => {
    console.log("error: ", error.msg);
  });

// console.log("after promise");

/**
 * promise 3 state
 * fullfiled  => success
 * rejected = > faild
 * pending => pending
 */

// console.log(promise);

/************************************ */
// fetching api
// api =>  programming interface => url => endpoint
// fetch("https://backend/products");

/**
 * CRUD OPERATORS
 * create => add resource
 * Read = > read resource single or group
 * Update resource
 * delete resource
 */
/**
 * domain/users => get all resource of users => method: get
 * domain/users => add single resource => method: post
 * domain/users/id => get the single user of id = 1 => method: get
 * domain/users/id => update single resource => post , put
 * domain/users/id => delete single resource => delete
 */
// js object
// {
//   id: 1
// }

// {
//   "id":1
// }

// let response = fetch("https://jsonplaceholder.typicode.com/posts");

// response
// .then((data)=>{
// // console.log(data.json());
// let result = data.json();
// result.then((users)=>{
// console.log(users);

// }).catch((error)=>{
//   console.log(error);

// })

// })
// .catch((error)=>{
//   console.log(error);

// })

// let response = fetch("https://jsonplaceholder.typicode.com/posts");

// response
//   .then((result) => result.json())
//   .then((data)=>{
//     console.log(data);
//   })
//   .catch((error) => {
//     console.log(error);
//   });
let data = {
  title: "foo",
  body: "bar",
  userId: 1,
};
// console.log("json: ",JSON.stringify(data));
// console.log(typeof(JSON.stringify(data)));

// console.log("js data: ", (data));
// console.log(typeof(data));

// let response = fetch(
//   "https://6874c6a8dd06792b9c952bd7.mockapi.io/api/products",
//   {
//     body: JSON.stringify(data), // convert js object to json
//     method: "delete",
//     headers: {
//       contentType: "application/json",
//     },
//   }
// );

// response
//   .then((result) => result.json())
//   .then((data) => {
//     console.log(data);
//   })
//   .catch((error) => {

//     console.log(error);
    
//   });


async function getAllUsers() {
  // http request => async operation
  let response ;
  try {
     response = await fetch(
      "https://6874c6a8dd06792b9c952bd7.mockapi.io/api/products",
      {
        body: JSON.stringify(data), // convert js object to json
        method: "delete",
        headers: {
          contentType: "application/json",
        },
      }
    ); // promise
    let result = await response.json();
    console.log(result);
    if (!response.ok) {
      // Handle HTTP error
      console.error(`HTTP error! status: ${response.status}`);
    }
    
  } catch (error) {
    console.log(error);
    
  }

  // response
  // .then((result) => result.json())
  // .then((data)=>{
  //   console.log(data);
  // })
  // .catch((error) => {
  //   console.log(error);
  // });
}

getAllUsers();
console.log("after getting users");
