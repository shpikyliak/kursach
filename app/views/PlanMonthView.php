<h2 align="center">Рапорт</h2>
<table id="report" class="table-bordered personal">
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Нужно изготовить</th>
        <th>Изготовленно</th>
    </tr>
    <?php
    for ($i = 0; $i < count($data); $i++) {
        echo("
        <tr>
            <td class='name'>" . $data[$i]['name'] . "</td>
            <td class='second_name big'>" . $data[$i]['second_name'] . "</td>
            <td class='sum(plan.amount_to_develop) bige'>" . $data[$i]['sum(plan.amount_to_develop)'] . "</td>
            <td class='sum(plan.manufactured) big'>" . $data[$i]['sum(plan.manufactured)'] . "</td>
        <tr>
        ");
    } ?>
</table>
