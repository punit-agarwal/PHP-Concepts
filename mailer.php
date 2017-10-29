<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Mustapha Abdulmalik">
	<title>Major Mailer</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<nav class="navbar navbar-default">
		  <a class="navbar-brand" href="#">Mailer</a>
	</nav>

	<div class="container">
		<form method="POST" action="">
		<div class="col-md-4">
			<input type="text" name="email" placeholder="Your email" class="form-control" required="">
				<br>
			<input type="text" name="reply" placeholder="Reply To:" class="form-control" required="">
				<br>

			<input type="text" name="subject" placeholder="Subject" class="form-control" required="">
				<br>

			<textarea class="form-control" name="content" required=""></textarea>

			<br>
			
			<button class="btn btn-primary">Go!!</button>

		</div>

		<div class="col-md-4">
			<input type="text" name="name" placeholder="Your name" class="form-control" required="">
		</div>

		</form>
	</div>

</body>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

<?php
	if (isset($_POST['email']) && isset($_POST['reply']) && isset($_POST['subject']) && isset($_POST['content']) && isset($_POST['name'])) {
		$email	=	htmlentities($_POST['email']);	
		$reply	=	htmlentities($_POST['reply']);	
		$subject	=	htmlentities($_POST['subject']);	
		$content	=	htmlentities($_POST['content']);	
		$name	=	htmlentities($_POST['name']);	

			$to = $reply;

			// Message
			$message = '
			<html>
			<head>
			  <title>'.$subject.'</title>
			</head>
			<body>
			  <p>'.$content.'</p>
			</body>
			</html>
			';

			// To send HTML mail, the Content-type header must be set
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';

			// Additional headers
			$headers[] = 'To: '.$to;
			$headers[] = 'From: '.$email;
			$headers[] = 'Cc: '.$name;
			$headers[] = 'Bcc: '.$name;

			// Mail it
			$mail = mail($to, $subject, $message, implode("\r\n", $headers));

				if ($mail) {
					echo "<script>alert('Email sent successfully!');</script>";
				} else {
					echo "<script>alert('An error occured');</script>";
				}

			}

?>