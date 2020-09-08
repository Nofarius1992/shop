var btnShowMore = document.querySelector("#show-more");

var siteURL = "http://shop-master.local/";

btnShowMore.onclick = function() {
	var ajax = new XMLHttpRequest();
		ajax.open("GET", siteURL + "modules/products/get-more.php");
		ajax.send();

	console.dir(ajax);
}