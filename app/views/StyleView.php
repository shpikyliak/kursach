<script type="text/javascript" src="js/style.js"></script>
<h2 align="center">Вид</h2>
<table id="style" class="table-bordered personal">
    <tr>
        <th>#</th>
        <th>Вид</th>
        <td></td>
    </tr>
    <?php
    for ($i = 0; $i < count($data); $i++) {
        echo("
        <tr>
            <td class='id_plan'>" . $data[$i]['id_style'] . "</td>
            <td class = 'style big'>" . $data[$i]['style'] . "</td>
            <td><input class='check_delete' type='checkbox' value=" . $data[$i]['id_style'] . "></td>
        <tr>
        ");
    } ?>

</table>

