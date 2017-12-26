<?php require_once("session.php"); ?>
<?php include_once("includes/header.php"); ?>
	<div id="welcome">
 		<h2 align="center">Добро пожаловать, <span><?php echo $_SESSION['session_username'];?></span>!</h2>
			<p align="center">
				Перейти на <a href="/">главную страницу</a>
			</p>
			<p align="center">
				<a href="logout.php">Выйти</a> из системы
			</p>
	</div>
<?php include_once("includes/footer.php"); ?>
	
<?php //endif; ?>