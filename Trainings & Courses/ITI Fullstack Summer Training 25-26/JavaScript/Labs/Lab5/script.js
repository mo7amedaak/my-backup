
async function getAllProducts() {
    try{
        const response = await fetch("https://6874dcc9dd06792b9c959825.mockapi.io/products");
        const products = await response.json();

        const tableBody = document.getElementById("products-part");
        tableBody.innerHTML = "";
        products.forEach(product => {

            const row = document.createElement("tr");

             row.innerHTML = `
                    <td><img src="${product.image}" width="50" height="50"/></td>
                    <td>${product.title}</td>
                    <td>${product.description}</td>
                    <td>${product.price} $</td>
                    <td>
                        <button onclick="viewProduct(${product.id})">View</button>
                        <button onclick="editProduct(${product.id})">Edit</button>
                        <button onclick="deleteProduct(${product.id})">Delete</button>
                    </td>
      `;
            tableBody.appendChild(row);
        });

    }catch(error){
         console.log("Error fetching products:", error);
    }
    
}
getAllProducts();

function createProduct() {
  document.getElementById("addProductForm").reset();        
  document.getElementById("productId").value = "";          
  document.getElementById("productForm").style.display = "block";
}

async function submitProduct(event) {

    event.preventDefault();
    const id = document.getElementById("productId").value;
    const title = document.getElementById("title").value.trim();
    const description = document.getElementById("Description").value.trim();
    const price = document.getElementById("Price").value.trim();
    const image = document.getElementById("Image").value.trim();

    if (!title || !description || !price || !image) {
    alert("Please fill in all fields.");
    return;
  }

    const newProduct = {
        title,
        description,
        price,
        image
    }
    const url = id ? `https://6874dcc9dd06792b9c959825.mockapi.io/products/${id}`
                    :"https://6874dcc9dd06792b9c959825.mockapi.io/products";

    const method = id ? "PUT":"POST";
    try {
    const response = await fetch( url , {
      method,
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(newProduct)
    });

    if (!response.ok) throw new Error("Failed to add product");

    
    document.getElementById("addProductForm").reset();
    document.getElementById("productForm").style.display = "none";

    
    getAllProducts();

  } catch (error) {
    console.log("Error adding product:", error);
  }

}

function closeForm(){
  document.getElementById("productForm").style.display = "none";
}

async function editProduct(id){
  try{
    const response = await fetch(`https://6874dcc9dd06792b9c959825.mockapi.io/products/${id}`);
    const product = await response.json();

    document.getElementById("productId").value = product.id;
    document.getElementById("title").value = product.title;
    document.getElementById("Description").value = product.description;
    document.getElementById("Price").value = product.price;
    document.getElementById("Image").value = product.image;

    document.getElementById("productForm").style.display = "inline-block";
  }catch(error){
    console.log("Error loading product:", error);
  }
}

async function deleteProduct(id) {

  const confirmed = confirm("Are you sure you want to delete this product?");
  if(!confirmed )return;

  try{
    const response = await fetch(`https://6874dcc9dd06792b9c959825.mockapi.io/products/${id}`,{
      method:"DELETE"
    }
    );
    if(!response.ok) throw new Error("Failed to delete product");

    getAllProducts();

  }catch(error){
    console.log("Error loading product:", error);
  }
}

async function viewProduct(id) {
  try{
  const response = await fetch(`https://6874dcc9dd06792b9c959825.mockapi.io/products/${id}`);
  const product = await response.json();

  document.getElementById("viewTitle").textContent = product.title;
  document.getElementById("viewImage").src = product.image;
  document.getElementById("viewDescription").textContent = product.description;
  document.getElementById("viewPrice").textContent = product.price;
  
  document.getElementById("viewModal").style.display = "block"; 
  }catch(error){
    console.log("Error loading product:", error);
  }
}
function closeViewModal() {
  document.getElementById("viewModal").style.display = "none";
}

