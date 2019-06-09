<?php
// В демонстрационном примере входные данные не отфильтрованы
$form_Thema=$_POST['InpThema'];
$form_InpMail=$_POST['InpMail'];
$form_InpUrl=$_POST['InpUrl'];
$form_InpFio=$_POST['InpFio'];
$form_InpText=$_POST['InpText'];

$form_msg="--> ФИО ".$form_InpFio." \n--> E-mail: ".$form_InpMail." \n--> URL: ".$form_InpUrl." \n\n--> Текст письма: \n".$form_InpText ;

$form_adress = "web@test";

if(mail($form_adress, $form_Thema, $form_msg)==TRUE)
  { 
echo <<<SUCCESS
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Письмо успешно отправлено</title>
</head>
<body>
<h1>Письмо успешно отправлено</h1>
<h2><a href="aform-result.php">Страница для отправки нового письма.</a></h2>
SUCCESS;
  }
else
  {
echo <<<ERROR
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ошибка при отправке письма</title>
</head>
<body>
<h1>Ошибка при отправке письма. Попробуйте отправить еще раз через несколько минут.</h1>
<h2><a href="aform-result.php">Страница для отправки нового письма.</a></h2>
ERROR;
  }
echo '</body></html>';
?>
