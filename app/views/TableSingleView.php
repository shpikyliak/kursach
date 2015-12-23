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
    <button class="btn btn-default delete" disabled="disabled">Удалить выбраное</button>
    <button class="btn btn-default save" disabled="disabled">Сохранить</button>
</div>

<div class="table_container">
    <?php include 'app/views/' . $content_view; ?>
</div>

</body>
</html>
