const formAddToCart = document.querySelector('.add-to-cart');
if(formAddToCart){
	formAddToCart.addEventListener('submit', function(e){
	e.preventDefault();
	const data = new FormData(formAddToCart); /*все данные собранные из формы {{qty: 2, product_id: 14}}*/
	
	axios.post('/cart/add', data)
	.then(function(response){       
		changeCart(response.data);
	});
});
}

function changeCart(data){
	document.querySelector('.modal-body').innerHTML = data;
	const cartCountProduct = document.querySelector('.cart-count-product')
	const countProduct = document.querySelector('.count-product')
	if(cartCountProduct)
		countProduct.innerHTML = cartCountProduct.value;
	else
		countProduct.innerHTML = 0;

} 

document.querySelector('.clear-cart').addEventListener('click', function(e){

	e.preventDefault();

	axios.post('/cart/clear')
	.then(function(response){
		changeCart(response.data);
	});
});


document.querySelector('body').addEventListener('submit', function(e){
	
	if(e.target.classList.contains('product-delete')){
		e.preventDefault();
		const data = new FormData(e.target); 
		
		axios.post('/cart/remove', data)
		.then(function(response){
			changeCart(response.data);
		});
	}
});

document.querySelector('body').addEventListener('submit', function(e){	
	if(e.target.classList.contains('prod-del')){
		e.preventDefault();
		
		const data = new FormData(e.target); 
		
		axios.post('/checkout/delete', data)
		.then(function(response){
			changeCart(response.data);
		});
	}
});
