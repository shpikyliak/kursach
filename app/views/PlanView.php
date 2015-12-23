<script type="text/javascript" src="js/plan.js"></script>
 <h2 align="center">План</h2>
    <table id="plan" class="table-bordered personal">
        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>Количество</th>
            <th>Вид</th>
            <th>Размер</th>
            <th>Изготовлено</th>
            <th>Робочий</th>
            <td></td>
        </tr>
        <?php
        for ($i = 0; $i < count($data); $i++) {
            echo("
        <tr>
            <td class='id_plan'>" . $data[$i]['id_plan'] . "</td>
            <td class = 'date big'>" . $data[$i]['date'] . "</td>
            <td class = 'amount_to_develop big'>" . $data[$i]['amount_to_develop'] . "</td>
            <td class = 'id_style big'>" . $data[$i]['id_style'] . "</td>
            <td class = 'id_size big'>" . $data[$i]['id_size'] . "</td>
            <td class = 'manufactured big'>" . $data[$i]['manufactured'] . "</td>
            <td class = 'id_worker big'>" . $data[$i]['id_worker'] . "</td>
            <td><input class='check_delete' type='checkbox' value=" . $data[$i]['id_plan'] . "></td>
        <tr>
        ");
        } ?>
    </table>
