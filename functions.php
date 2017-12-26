<?php
function parse_ini() {
	$parse = parse_ini_file('/config/config.ini', true);
	$pages_qty = intval($parse ['pages_qty']);
	return $pages_qty;
}

function login($link) {
	global $report;
	$report = NULL;
	if(isset($_POST["login"])){
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$username=htmlspecialchars($_POST['username']);
			$password=htmlspecialchars($_POST['password']);
			$query =mysqli_query($link,"SELECT * FROM Users WHERE USERNAME='$username' AND PASS='$password'");
			$numrows=mysqli_num_rows($query);
				if($numrows)
 					{
						while($row=mysqli_fetch_assoc($query))
 						{
							$dbusername=$row['USERNAME'];
  							$dbpassword=$row['PASS'];
 						}
  						if($username == $dbusername && $password == $dbpassword)
						{
							$_SESSION['session_username']=$username;	 
 							header("Location: intropage.php");
						}
					}	
				else 
					{
						$message = "Неправильные никнейм и/или пароль!";
 					}
			}
		else {
   			$message = "Все поля обязательны к заполнению!";
		}
	}
	if (!empty($message)) 
		{
			$report = $message;
		}
}

function register($link) {
	global $report;
	$report = NULL;
	if(isset($_POST["register"])){
	
		if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  			$full_name= htmlspecialchars($_POST['full_name']);
			$email=htmlspecialchars($_POST['email']);
			$username=htmlspecialchars($_POST['username']);
 			$password=htmlspecialchars($_POST['password']);
 			$select="SELECT * FROM Users WHERE USERNAME='$username'";
 			$query=mysqli_query($link,$select);
 			$numrows=mysqli_num_rows($query);
 				if(!$numrows)	 {
					$sql="INSERT INTO `Users` (NAME, EMAIL, USERNAME, PASS) VALUES ('$full_name', '$email', '$username', '$password')";
 					$result=mysqli_query($link,$sql);
 						if($result) {
							$message = "Аккаунт успешно зарегистрирован. Сейчас произойдет переадресация";
							header('Refresh: 3; URL=login.php');  							
						} 
						else {
 							$message = "Ошибка регистрации!";
  						}
				} 
					else {
						$message = "Никнейм уже занят! Выберите другой";
   					}
		} 
			else {
				$message = "Все поля обязательны к заполнению!"; 
			} 
	}

	if (!empty($message)) 
		{
			$report = $message;
		}
}

function get_news() {
	global $link;
	$conf = parse_ini();
	$counter = mysqli_query($link,'SELECT COUNT(`ID`) FROM `News`');
	$counter = mysqli_fetch_array($counter);
	$pages = intval( ($counter[0] - 1) / $conf) + 1;
	if( isset($_GET['page'])) {
		$page = (int) $_GET['page'];
		
		if ( $page > 0 && $page <= $pages ) {
			$start = $page * $conf - $conf;
			$get_news = "SELECT * FROM News ORDER BY `News`.`DATE` DESC LIMIT  {$start}, {$conf}";
		}
		else { 
			$get_news = "SELECT * FROM News ORDER BY `News`.`DATE` DESC LIMIT ".$conf; 
			$page = 1;
		}
	}
	
	else {
		$get_news = "SELECT * FROM News ORDER BY `News`.`DATE` DESC LIMIT ".$conf;
		$page = 1;
	}
	
	$query=mysqli_query($link,$get_news);
	while($row = mysqli_fetch_assoc($query)){
 			echo "<div class=\"news mnews\" id=\"mnews\">
 			<h2>{$row['TITLE']}</h2>
 			{$row['CONTENT']}
 			<p class=\"date\">Дата публикации: {$row['DATE']}</p>
 			</div>";
 		}
 	echo '<div class="paginator">';
 	if( $page > 1 ) echo '<a class="paginator" href="index.php?page='.($page-1).'">← </a>';
	if( $page < $pages ) echo '<a class="paginator" href="index.php?page='.($page+1).'"> →</a>';
	echo '</div>';
}

function login_reg_url() {
	if (!$_SESSION['session_username']) {
		echo '<p><a href="login.php">Вход</a> | <a href="register.php">Регистрация</a></p>';
	}
	else {
		echo '<p><a href="logout.php">Выход</a>';
	}
}

function add_news_url() {
	if ($_SESSION['session_username']) {
		echo '| <a href="add_news.php"> Добавить новость</a> </p>';
	}
}

function add_news(){    
	global $link;
	global $report;
	$report = NULL;
    if(isset($_POST["add_news"])){
		if(!empty($_POST['title']) && !empty($_POST['content'])) {
			$title=htmlspecialchars($_POST['title']);
			$content=htmlspecialchars($_POST['content']);
			$sql = "INSERT INTO News (`TITLE`, `CONTENT`, `DATE`) VALUES ('{$title}','{$content}', NOW())";
    		if(mysqli_query($link, $sql)){
        		$message = 'Ваша новость успешно добавлена!<br/>';
    		}
    		else{
        		$message = 'Ошибка при выполнении запроса добавления новости<br/>';
    		}
		}
	}
	$report = $message;
}

function get_message($report) {
	if ($report) {
		echo "<p class=\"error\">". $report . "</p>";
	}	
}

function connect_db() {
	global $link;
	$parse = parse_ini_file('/config/config.ini', true);
	$db_hostname = $parse ['db_hostname'];
	$db_database = $parse ['db_database'];
	$db_username = $parse ['db_username'];
	$db_password = $parse ['db_password'];
	$link = mysqli_connect($db_hostname, $db_username, $db_password, $db_database) or die("Ошибка подключения к БД:".mysqli_connect_errno());
}

?>