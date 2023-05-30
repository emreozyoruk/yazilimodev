<?php
session_start();
include("config.php");
if(!isset($_SESSION['fid']))
{
	header("location:index.php");
}
$comp=$_POST['comp'];
$by=$_SESSION['fid'];
$date=date('d-M-Y');
if($comp==NULL)
{
	//ASLDO Nothing
}
else
{
	mysqli_query($techVegan,"INSERT INTO complaints(complaint,byy,date,access) VALUES('$comp','$by','$date','1')");
	$info="Şikayetiniz Başarıyla Kaydedildi";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Şikayet Paneli</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head" style="float:left">Şikayet Kutusuna Hoş Geldiniz</span>
<span style="float:right;"><a href="logout.php">Çıkış</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<span class="Subhead">Şikayetinizi Belirtiniz</span><br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Şikayet : </td><td><textarea name="comp" rows="5" cols="30" class="fields" style="height:70px;"></textarea></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Gönder" class="button" onclick="return confirm('Kaydettikten sonra değişim yapamıycaksınız');" /></td></tr>
</table>
</form>
<a href="fhome.php">Geri Dön</a>

</div>
</body>

</html>
