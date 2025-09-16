let products = [
  {
    title: "Bread Basket",
    desc: "Assortment of fresh baked fruit breads and muffins 5.50",
    img: "images/luxe-linnen-broodmandje-ovaal-Cottona.webp"
  },
  {
    title: "Belgian Waffle",
    desc: "Vanilla flavored batter with malted flour 7.50",
    img: "images/belgian-waffle-recipe-003.jpg"
  },
  {
    title: "Scrambled eggs",
    desc: "Scrambled eggs, roasted red pepper and garlic, green onions 7.50",
    img: "images/AR-57459-oven-scrambled-eggs-DDMFS-4x3-step-Beauty-f31f2904bb3a4eee80ed3e135436cc77.jpg"
  },
  {
    title: "Bread Basket",
    desc: "Assortment of fresh baked fruit breads and muffins 5.50",
    img: "images/luxe-linnen-broodmandje-ovaal-Cottona.webp"
  },
  {
    title: "Belgian Waffle",
    desc: "Vanilla flavored batter with malted flour 7.50",
    img: "images/belgian-waffle-recipe-003.jpg"
  },
  {
    title: "Scrambled eggs",
    desc: "Scrambled eggs, roasted red pepper and garlic, green onions 7.50",
    img: "images/AR-57459-oven-scrambled-eggs-DDMFS-4x3-step-Beauty-f31f2904bb3a4eee80ed3e135436cc77.jpg"
  }
];

const container = document.getElementById('products-container');

function renderProducts(list) {
  container.innerHTML = "";
  list.forEach(product => {
    container.innerHTML += `
      <div class="card">
        <img src="${product.img}" alt="${product.title}">
        <h4>${product.title}</h4>
        <p>${product.desc}</p>
        <button>Buy</button>
      </div>
    `;
  });
}

function filterProducts(searchText) {
  const filtered = products.filter(p =>
    p.title.toLowerCase().includes(searchText.toLowerCase()) ||
    p.desc.toLowerCase().includes(searchText.toLowerCase())
  );
  renderProducts(filtered);
}


renderProducts(products);
