<?php

session_start();

if (!isset($_SESSION['adm'])) {

	//redirecionando para login
	header("location:../login.php");
}

?>

<?php

$date = date("dmy_s");
$caminho = "C:\BackupSysPM";

shell_exec('C:\AppServ\MySQL\bin\mysqldump -h localhost -u root -p27072001 db_pm > '. $caminho .'\Backup' . $date . '.sql');

$result = "1";

if ($result == "1") {

	$_SESSION['fez_backup'] = true;
	header("location:../pages/adm_arm/home.php");
}

?>