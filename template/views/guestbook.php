<?php
$guestbook = \R::getAll('SELECT * FROM book');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Гостевая книга</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
<?php
if(!$guestbook) {
  echo "<h4 class='text-danger'>Пусто</h4>";
} else {
  echo "<table class='table' style='border: 1px solid;'><tr><th>№</th><th>Имя</th><th>Текст</th><th>Дата</th></tr>";
  foreach ($guestbook as $key => $value_book) {
$key = $key + 1;
echo "<tr><td>".$key."</td><td>".$value_book['name']."</td><td>".$value_book['msg']."</td><td>".$value_book['addate']."</td></tr>";
  }
  echo "</table>";
}
?>
<h5 class="text-right">Гостевая книга</h5>
<form action="func/guestbook" method="POST">
  <div class="form-group">
    <label>Имя</label>
    <input type="text" name="name" class="form-control" placeholder="Имя" required="required">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
  </div>
  <div class="form-group">
    <label>Сообщение</label>
    <textarea name="soob" class="form-control" placeholder="Сообщение" required="required"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>
</div>
</body>
</html>