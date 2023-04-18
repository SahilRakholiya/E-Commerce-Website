<?php 
	session_start();
	if (isset($_POST['submit'])) {
		if ($_SESSION['captcha'] == $_POST['cap']) {
			echo "sucess";
		}
		else{
			echo "captcha verification failed! try again"."<br>";
			echo "Text is : ".$_SESSION['captcha'];
		}
	}
?>

<form method="POST">
	<input type="text" name="cap">
	<input type="submit" name="sub" value="submit">
</form>

<img src="captcha.php" id="captc">
<span onclick="changetext();"></span>

<script type="text/javascript">
	function changetext(){
		var img = document.geyElementById('captc');
		img.src = "captcha.php";
	}
</script>