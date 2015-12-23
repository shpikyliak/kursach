<h2 align="center">Дефекты</h2>
    <table id="plan" class="table-bordered personal">
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
            <td class='id_plan'>" . $data[$i]['id_plan'] . "</td>
            <td class='id_defect_type'>" . $data[$i]['id_defect_type'] . "</td>
            <td class='amount'>" . $data[$i]['amount'] . "</td>
            <td><input class='check_delete' type='checkbox' value=" . $data[$i]['id_defect'] . "></td>
        <tr>
        ");
        } ?>
    </table>
<a href="/defect/export"><button>Export Excel</button></a>