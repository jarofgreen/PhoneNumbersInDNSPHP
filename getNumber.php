<?php
/**
 * @license BSD License
 */

if (!isset($_POST['domain'])) {
	header("Location: /");
	die();
}

require 'PhoneNumbersInDNS.php';

$data = getPhoneNumbersFromDNS($_POST['domain']);

?>
<html>
	<head>
		<title>Phone Numbers In DNS</title>
	</head>
	<body>
		<table>
			<tr>
				<th>Name</th>
				<th>Number</th>
			</tr>
			<?php foreach ($data as $d) { ?>
				<tr>
					<td><?php print htmlentities($d['name']); ?></td>
					<td>(+<?php print $d['country']; ?>) <?php print $d['number']; ?></td>
				</tr>
			<?php } ?>
		</table>
	</body>
</html>



