<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Напишите письмо</title>
</head>
<body>
<h1>Напишите письмо</h1>
<form action="amail-result.php" method="post">
  <table>
    <tr>
      <td style="width:170px">Фамилия Имя Отчество</td>
      <td><input name="InpFio" type="text" id="InpFio" size="40" maxlength="50"></td>
    </tr>
    <tr>
      <td>Ваш e-mail: <font color="red">*</font></td>
      <td><input name="InpMail" type="text" id="InpMail" size="30" maxlength="30"></td>
    </tr>
    <tr>
      <td>URL сайта (если есть)</td>
      <td><input name="InpUrl" type="text" id="InpUrl" size="30" maxlength="30"></td>
    </tr>

    <tr>
      <td>Тема письма</td>
      <td valign="bottom"><input name="InpThema" type="text" id="InpThema" size="40" maxlength="50"></td>
    </tr>
    <tr>
      <td>Текст письма </td>
      <td><textarea name="InpText" cols="30" rows="8" id="InpText"></textarea></td>
    </tr>
  </table>

    <input type="submit" name="ButSend" value="Отправить" style="margin: 0 30px;">
    <input type="reset" name="ButReset" value="    Сброс    ">
</form>
</body>
</html>
