<?php
// Include config file
require_once "config.php";

$sql = "INSERT INTO employees (name, address, salary) VALUES ('ohno', 'imma die', 10)";
for ($i = 0; $i < 20000; $i++) {
    if ($i == 19999) {
        $sql = "DELETE FROM employees WHERE 1=1";
    } else {
	$a = $i *2;
	$sql = "INSERT INTO employees (name, address, salary) VALUES (".$a.", 'imma die', ".$i.")";
    }
    if ($link->query($sql) === TRUE) {
        echo "a";
      }
}
header("location: index.php");
mysqli_close($link);
?>
