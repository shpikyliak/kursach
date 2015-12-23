<!DOCTYPE html>
<html>
<head>
    <title>Parser</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/tablesScript.js"></script>

</head>
<body>
<div class="control">
    <a class="btn btn-default" href="/">Назад</a>
    <button class="btn btn-default add">Добавить</button>
    <button class="btn btn-default delete" disabled="disabled">Удалить вибране</button>
    <button class="btn btn-default save" disabled="disabled">Зберегти нові</button>
    <button class="btn btn-default save_modified" disabled="disabled">Зберегти зміни</button>
    <a href="/defect/export" class="btn btn-default">Export Excel</a>
</div>

<div class="table_container">
    <?php include 'app/views/' . $content_view; ?>
</div>

</body>
</html>
