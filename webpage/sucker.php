<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php
			// if(isset($_REQUEST["name"])&&isset($_REQUEST["section"])&&isset($_REQUEST["credit_card"])){
			if($_REQUEST["name"]&&$_REQUEST["section"]&&$_REQUEST["credit_card"]&&$_REQUEST["credit_type"]){
		?>
				<h1>Thanks. sucker!</h1>
				<p>
					Your information has been recorded
				</p>

					<dl>
						<dt>Name</dt>
						<dd>
							<?= $_REQUEST["name"]?>
						</dd>
						
						<dt>Section</dt>
						<dd>
							<?= $_REQUEST["section"]?>
						</dd>
						
						<dt>Credit Card</dt>
						<dd>
							<?= $_REQUEST["credit_card"]."(".$_REQUEST["credit_type"].")"?>
						</dd>
					</dl>
				<p>
					Here are all the suckers who have submitted here:
				</p>
				<pre>
					<?php
						$file = 'suckers.txt';
						$suckers = file_get_contents($file);
						$suckers = explode("\r", $suckers);
						if(isset($suckers)){
							foreach ($suckers as $value) {
								printf("%s", $value);
							}
						}
						$newsucker = $_REQUEST["name"].";".$_REQUEST["section"].";".$_REQUEST["credit_card"].";".$_REQUEST["credit_type"]."\r\n";
						file_put_contents($file, $newsucker, FILE_APPEND);
					?>
				</pre>
		<?php
			}else{
		?>
			<h1>Sorry</h1>
			<p>
				Your didn't fill out the form completely. <a href="buyagrade.html">Try again?</a>
			</p>
		<?php
			}
		?>

	</body>
</html>