<?php

session_start();

if (!isset($_SESSION['adm'])) {

	//redirecionando para login
	header("location:../login.php");
}

?>

<?php

$date = date("d-m-y");
$result = "1";

shell_exec('C:\AppServ\MySQL\bin\mysqldump -u root -p12345678 db_pm > C:\Users\"João Pedro"\Downloads\Backups_SysPM\Backup_' . $date . '.sql');

if ($result == "1") {

	$_SESSION['fez_backup'] = true;
	header("location:../pages/adm/home.php");
}

?>