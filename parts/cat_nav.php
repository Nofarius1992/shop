<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	<a class="nav-link <?php if (!isset($_GET["id"])){ ?> active <?php }  ?>" href="/">Все</a>
	<?php 
		// Обращаемся к таблице в базе данных categories
		$sql = "SELECT * FROM categories";
		$result = $connect->query($sql);
		// Цыкл вывода навигации по категориям
		while ($row = mysqli_fetch_assoc($result)) {
			if (isset($_GET["id"]) && $_GET["id"] == $row["id"]) {
				echo  "<a class='nav-link active' href='/cat.php?id=" . $row["id"] . "'>" . $row["title"] . "</a>";
			} else{
				echo  "<a class='nav-link' href='/cat.php?id=" . $row["id"] . "'>" . $row["title"] . "</a>";
			}
		}
	 ?>
</div>