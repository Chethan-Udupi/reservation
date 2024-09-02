<?php
session_start();
include('includes/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login_error = "";

	// Prepare the SQL statement to avoid SQL injection
	$stmt = $con->prepare("SELECT user_id, username FROM user WHERE username = ? AND password = ?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		// Login successful, store session data
		$stmt->bind_result($user_id, $username);
		$stmt->fetch();
		$_SESSION['userid'] = $user_id;
		$_SESSION['username'] = $username;

		// Redirect to index.php
		header("Location: index2.php");
		exit();
	} else {
		// Login failed
		$login_error = "Invalid username/email or password.";
	}
	$stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
	<link rel="stylesheet" href="css/style.css">
</head>
<style>
	/* Reset some default styles */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Arial', sans-serif;
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Full viewport height */
    background: #f2f2f2; /* Light background color */
}

.screen {
    position: relative;
    width: 360px;
    height: 640px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.screen__content {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.login {
    width: 100%;
}

.login__field {
    position: relative;
    margin-bottom: 20px;
}

.login__icon {
    position: absolute;
    top: 50%;
    left: 20px;
    transform: translateY(-50%);
    color: #888;
}

.login__input {
    width: 100%;
    padding: 15px 20px 15px 50px;
    border: 1px solid #ddd;
    border-radius: 25px;
    font-size: 16px;
}

.button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 25px;
    background: #007BFF; /* Primary color */
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

.button:hover {
    background: #0056b3; /* Darker shade */
}

.button__text {
    margin-right: 10px;
}

.social-login {
    margin-top: 20px;
    text-align: center;
}

.social-login h3 {
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
}

.social-icons {
    display: flex;
    justify-content: center;
}

.social-login__icon {
    font-size: 24px;
    color: #555;
    margin: 0 10px;
    transition: color 0.3s;
}

.social-login__icon:hover {
    color: #007BFF; /* Primary color */
}

.screen__background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #007BFF; /* Primary color */
    overflow: hidden;
    z-index: -1;
}

.screen__background__shape {
    position: absolute;
    border-radius: 50%;
    background: #0056b3; /* Darker shade */
}

.screen__background__shape1 {
    width: 300px;
    height: 300px;
    top: -50px;
    left: -150px;
}

.screen__background__shape2 {
    width: 600px;
    height: 600px;
    top: -150px;
    left: -300px;
}

.screen__background__shape3 {
    width: 200px;
    height: 200px;
    bottom: -100px;
    right: -100px;
}

.screen__background__shape4 {
    width: 500px;
    height: 500px;
    bottom: -250px;
    right: -250px;
}

</style>
<?php include 'header.php';?>
<body>
	<div class="container">
		<div class="screen">
			<div class="screen__content">
				<form class="login" action="login.php" method="post">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" name="username" placeholder="User name / Email" required>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" name="password" placeholder="Password" required>
					</div>
					<?php if (isset($login_error)): ?>
						<p style="color: red;"><?php echo $login_error; ?></p>
					<?php endif; ?>
					<button class="button login__submit" type="submit">
						<span class="button__text">Log In Now</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</form>
				<div class="social-login">
					<h3>Log in via</h3>
					<div class="social-icons">
						<a href="#" class="social-login__icon fab fa-instagram"></a>
						<a href="#" class="social-login__icon fab fa-facebook"></a>
						<a href="#" class="social-login__icon fab fa-twitter"></a>
					</div>
				</div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>
</body>

</html>