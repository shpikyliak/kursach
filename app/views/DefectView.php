<script type="text/javascript" src="js/defect.js"></script>
<h2 align="center">Дефекты</h2>
    <table id="defect" class="table-bordered personal">
        <tr>
            <th>#</th>
            <th># плана</th>
            <th>Вид брака</th>
            <th>Количество</th>
            <td></td>
        </tr>
        <?php
        for ($i = 0; $i < count($data); $i++) {
            echo("
        <tr>
            <td class='id_defect'>" . $data[$i]['id_defect'] . "</td>
            <td class='id_plan big'>" . $data[$i]['id_plan'] . "</td>
            <td class='id_defect_type bige'>" . $data[$i]['id_defect_type'] . "</td>
            <td class='amount big'>" . $data[$i]['amount'] . "</td>
            <td><input class='check_delete' type='checkbox' value=" . $data[$i]['id_defect'] . "></td>
        <tr>
        ");
        } ?>
    </table>
