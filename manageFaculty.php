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
<title>Fakülte Hesaplarını Düzenle</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="head">Aktif / Pasif Fakülte Hesapları</span>
<span style="float:right;"><a href="logout.php">Çıkış</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />

<div align="center">
<span class="Subhead">Tüm Fakülteler</span><br />
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>Fakülte ID</th><th>İsim</th><th>Email</th><th>Telefon Numarası</th><th>Durum</th><th>Sil</th></tr>
<?php
include("config.php");
$a=mysqli_query($techVegan,"SELECT * FROM faculty ORDER BY fid ASC");
while($b=mysqli_fetch_array($a))
{
	?>
    
<tr class="labels" style="font-size:16px;"><td><?php echo $b['fid'];?></td><td><?php echo $b['name'];?></td><td><?php echo $b['email'];?></td><td><?php echo $b['contact'];?></td><td>
<?php
if($b['status']==0)
{
	?><a href="activation.php?s=<?php echo $b['fid'];?>&p=3">Aktif</a>
<?php 
} 
else
{
	?>
    <a href="activation.php?s=<?php echo $b['fid'];?>&p=4">Pasif.</a>
<?php
}
?>

</td><td><a href="delete.php?del=<?php echo $b['fid'];?>&p=2" onclick="return confirm('Emin Misin ?');" onmouseover="style.color='red'" onmouseout="style.color='brown'">Sil</td></tr></tr>

<?php
}
?>




</table>
<a href="admin.php">Geri Dön</a>
</div>
</body>

</html>
