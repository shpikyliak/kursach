<script type="text/javascript" src="js/defect_type.js"></script>
<h2 align="center">Вид брака</h2>
<table id="defectType" class="table-bordered personal">
    <tr>
        <th>#</th>
        <th>Вид брака</th>
        <td></td>
    </tr>
    <?php
    for ($i = 0; $i < count($data); $i++) {
        echo("
        <tr>
            <td class='id_defect_type'>" . $data[$i]['id_defect_type'] . "</td>
            <td class='defect_type big'>" . $data[$i]['defect_type'] . "</td>
            <td><input class='check_delete' type='checkbox' value=" . $data[$i]['id_defect_type'] . "></td>
        <tr>
        ");
    } ?>
</table>
