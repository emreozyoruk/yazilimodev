<?php
session_start();
include("config.php");
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$id=$_SESSION['sid'];
$a=mysqli_query($techVegan,"SELECT * FROM registration WHERE roll='$id'");
$b=mysqli_fetch_array($a);
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['p1']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//ASL Do Nothing
}
else
{
if($old!=$pass)
{
	$info="Yanlış Eski Şifre";
}
elseif($p1!=$p2)
	{
		$info="Yeni Şifre Eşleşmedi";
	}
	else
	{
		mysqli_query($techVegan,"UPDATE registration SET password='$p2' WHERE roll='$id'");
		$info="Şifreniz Değiştirildi";
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Öğrenci Şifre Değiştirme</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head" style="float:left">Şifre Değiştirme</span>
<span style="float:right;"><a href="logout.php">Çıkış</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Eski Şifre Giriniz :</td><td><input type="password" name="old" size="25" class="fields" /></td></tr>
<tr><td class="labels">Yeni Şifre Giriniz :</td><td><input type="password" name="p1" size="25" class="fields"  /></td></tr>
<tr><td class="labels">Yeni Şİfrenizi Tekrar Giriniz :</td><td><input type="password" name="p2" size="25"  class="fields" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Şifreyi Değiştir" class="button" /></td></tr>
</table>
</form>
<a href="shome.php">Geri Dön</a>

</div>
</body>
</html>
