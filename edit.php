<?php
$edit=$_GET['edit'];
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}

$notice=$_POST['notice'];
$title=$_POST['title'];
$date=date('d-M-Y');
$access=$_POST['access'];
$id=$_GET['id'];
if($notice==NULL || $title==NULL || $access==NULL)
{
	
}
else
{
	mysqli_query($techVegan,"UPDATE notices SET title='$title', notice='$notice', date='$date', access='$access' WHERE id='$edit'");
	header("location:notices.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Not Düzenleme</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>
<body>
<span class="head">Not Düzenleme</span>
<span style="float:right;"><a href="logout.php">Çıkış</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>ID</th><th>Başlık</th><th>Not</th><th>Ulaşım Tipi</th><th>Durum</th></tr>
<?php 
$a=mysqli_fetch_array(mysqli_query($techVegan,"SELECT * FROM notices WHERE id='$edit'"));
?>
<tr><td><?php echo $a['id'];?></td><td><input type="text" name="title" class="fields" value="<?php echo $a['title'];?>" /></td><td><textarea name="notice" cols="35" class="fields" style="height:70px;font-family:'trebuchet MS';"><?php echo $a['notice'];?></textarea></td><td><select name="access" class="fields"><option disabled="disabled" selected="selected">- Ulaşım Tipi Seç - </option><option value="0">Öğrenci</option><option value="1">Fakülte</option></select></td><td><input type="submit" value="Düzenle" class="button" /><input type="hidden" value="<?php echo $a['id'];?>" name="id" /></td></tr>
</table>
</form>
</div>
</body>

</html>
