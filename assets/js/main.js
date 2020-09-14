var btnShowMore = document.querySelector("#show-more");

// Ссылка
var siteURL = "http://shop-master-top.zzz.com.ua/";

if(btnShowMore) {
	btnShowMore.onclick = function() {
	var currentPageInput = document.querySelector("#current-page");
	var ajax = new XMLHttpRequest();
		ajax.open("GET", siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
		ajax.send();

		if(ajax.response == "") {
			btnShowMore.style.display = "none";
		}
		currentPageInput.value = +currentPageInput.value + 1;
	var productsBlock = document.querySelector("#products");
		products.innerHTML = productsBlock.innerHTML + ajax.response;	
	}
}


// Добавить товар в корзину
function addToBasket(btn) {


	/*
		1. Сделать аякс запрос на добавление в коризну
		2. Получить данные об успешном добавлении в корзину
		3. Обновить информацию в корзине
	*/

	var ajax = new XMLHttpRequest();
		
		ajax.open("POST", siteURL + "/modules/basket/add-basket.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + btn.dataset.id);

		var response = JSON.parse(ajax.response);


		var btnGoBassket = document.querySelector("#go-basket span");
			btnGoBassket.innerText = response["basket"].length;
} 

// Удаление товара с корзины
function deleteProductBasket(obj, id) {
	
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siteURL + "/modules/basket/delete.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("id=" + id);

	alert("Product deleted");

	// Удалить строку с товаром
	obj.parentNode.parentNode.remove();
}

// Изменение количества товаров в корзине
function countFunc(obj, id) {
	var count = obj.value;
	var productId = id;

	var ajax = new	XMLHttpRequest();
		ajax.open('POST', siteURL + "modules/basket/costs.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	var query = "count=" + count + "&id=" + id;
		ajax.send(query);

	console.dir(ajax.response);
	obj.parentNode.parentNode.childNodes["7"].firstChild.data = ajax.response;

}


