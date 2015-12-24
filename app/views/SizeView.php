<script type="text/javascript" src="js/size.js"></script>
<h2 align="center">Размер</h2>
<table id="size" class="table-bordered personal">
    <tr>
        <th>#</th>
        <th>Размер</th>
        <td></td>
    </tr>
    <?php
    for ($i = 0; $i < count($data); $i++) {
        echo("
        <tr>
            <td class='id_size'>" . $data[$i]['id_size'] . "</td>
            <td class = 'size big'>" . $data[$i]['size'] . "</td>
            <td><input class='check_delete' type='checkbox' value=" . $data[$i]['id_size'] . "></td>
        <tr>
        ");
    } ?>

</table>

