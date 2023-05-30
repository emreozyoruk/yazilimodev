<?php
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Sayfası</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head" style="float:left">Admin Paneline Hoş Geldiniz</span>
<span style="float:right;"><a href="logout.php">Cikis</a></span><br />

<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td>
<span class="Subhead">Admin Komutları</span><hr size="1" style="color:#00F;" /><br />
<a href="notices.php">Çevrimiçi Notlar</a><br />
<a href="manageStudent.php">Öğrenci Hesaplarını Yönet</a><br />
<a href="manageFaculty.php">Fakülte Hesaplarını Yönet</a><br />
<a href="ChangePassword.php">Şifreyi Değiştir</a><br />
<a href="Complaints.php">Şikayetleri Yönet</a><br />
</td></tr></table>
</div>

</body>

</html>
