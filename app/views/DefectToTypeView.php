<h2 align="center">Брак по типу</h2>
<table  id="defectToType" class="table-bordered personal">
    <tr>
        <th>вид</th>
        <th>количество</th>
    </tr>
    <?php
    for ($i=0;$i<count($data);$i++){
        echo ("
        <tr>
            <td class = 'defect_type big'>".$data[$i]['defect_type']."</td>
            <td class = 'sum big'>".$data[$i]['sum(amount)']."</td>
        <tr>
        ");
    }?>
</table>