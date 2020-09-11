<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title>Shop</title>
</head>
<body>

	<!-- nav взят из Bootstrap 4, который хранинтся на локальном диске в папке проекта -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<!-- Логотип-ссылка, которая ведёт на главную страницу -->
	  <a class="navbar-brand" href="/">Shop-master</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="about.php">About</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="contacts.php">Contacts</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	      <a href="/basket.php" class="m-2" id="go-basket">
	    		<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-basket3-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" d="M10.243 1.071a.5.5 0 0 1 .686.172l3 5a.5.5 0 0 1-.858.514l-3-5a.5.5 0 0 1 .172-.686zm-4.486 0a.5.5 0 0 0-.686.172l-3 5a.5.5 0 1 0 .858.514l3-5a.5.5 0 0 0-.172-.686z"/>
				  <path d="M13.489 14.605A.5.5 0 0 1 13 15H3a.5.5 0 0 1-.489-.395L1.311 9H14.69l-1.201 5.605z"/>
				  <rect width="16" height="2" y="6" rx=".5"/>
				</svg>
				<span>0</span>
	    	</a>
	    </form>
	    	
	    	
	    
	  </div>
	</nav>
	
	<div class="container">
		<div class="row m-2">
		  <div class="col-3">
		    <?php 
		    	include $_SERVER['DOCUMENT_ROOT'] ."/parts/cat_nav.php";
		     ?>
		  </div>
		  <div class="col-9">
		      <div class="container">