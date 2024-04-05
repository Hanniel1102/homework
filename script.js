// script.js

let cart = [];

function addToCart(bookId) {
    let book = document.getElementById(bookId);
    let bookTitle = book.querySelector('h2').innerText;
    let bookPrice = book.querySelector('p').innerText.split(' ')[1]; // Lấy giá từ chuỗi, bỏ đi ký tự "$"
    cart.push({title: bookTitle, price: parseFloat(bookPrice)});
    updateCart();
}

function updateCart() {
    let cartItems = document.getElementById('cart-items');
    let total = 0;
    cartItems.innerHTML = '';
    cart.forEach(item => {
        let li = document.createElement('li');
        li.innerText = `${item.title} - $${item.price}`;
        cartItems.appendChild(li);
        total += item.price;
    });
    document.getElementById('total').innerText = `Tổng tiền: $${total.toFixed(2)}`;
}
