<h2 align="center">Работники</h2>
<table  id="worker" class="table-bordered personal">
    <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Фамилия</th>
    </tr>
    <?php
    for ($i=0;$i<count($data);$i++){
        echo ("
        <tr>
            <td class='id_worker'>".$data[$i]['id_worker']."</td>
            <td class = 'name big'>".$data[$i]['name']."</td>
            <td class = 'second_name big'>".$data[$i]['second_name']."</td>
        <tr>
        ");
    }?>
</table>
