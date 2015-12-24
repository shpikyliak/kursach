<script type="text/javascript" src="js/main.js"></script>

<div class="control">
    <a href="choose/workerAZ" class="btn btn-default">Роботники в алфавитном</a>
    <a href="choose/planMonth" class="btn btn-default">План на месяц</a>
    <a href="choose/defectToType" class="btn btn-default">Браки по типу</a>
</div>
<div class="table_container">
<div id="left">
<table id="worker" class="table-bordered">
    <caption><a href="/worker">Работники</a></caption>
    <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Фамилия</th>
    </tr>
    <?php
    for ($i=0;$i<count($data['worker']);$i++){
        echo ("
        <tr>
            <td class='id_worker'>".$data['worker'][$i]['id_worker']."</td>
            <td class = 'name'>".$data['worker'][$i]['name']."</td>
            <td class = 'second_name'>".$data['worker'][$i]['second_name']."</td>
        <tr>
        ");
    }?>
</table>



<table id="plan" class="table-bordered">
    <caption><a href="/plan">План</a></caption>
    <tr>
        <th>#</th>
        <th>Дата</th>
        <th>Количество</th>
        <th>Вид</th>
        <th>Размер</th>
        <th>Изготовлено</th>
        <th>Робочий</th>

    </tr>
    <?php
    for ($i=0;$i<count($data['plan']);$i++){
        echo ("
        <tr>
            <td class='id_plan'>".$data['plan'][$i]['id_plan']."</td>
            <td class = 'date'>".$data['plan'][$i]['date']."</td>
            <td class = 'amount_to_develop'>".$data['plan'][$i]['amount_to_develop']."</td>
            <td class = 'id_style'>".$data['plan'][$i]['id_style']."</td>
            <td class = 'id_size'>".$data['plan'][$i]['id_size']."</td>
             <td class = 'manufactured'>".$data['plan'][$i]['manufactured']."</td>
              <td class = 'id_worker'>".$data['plan'][$i]['id_worker']."</td>
        </tr>
        ");
    }?>
</table>
<table id="defect" class="table-bordered">
    <caption><a href="/defect">Брак</a></caption>
    <tr>
        <th>#</th>
        <th># плана</th>
        <th>Вид брака</th>
        <th>Количество</th>

    </tr>
    <?php
    for ($i=0;$i<count($data['defect']);$i++){
        echo ("
        <tr>
            <td class='id_defect'>".$data['defect'][$i]['id_defect']."</td>
            <td class = 'id_plan'>".$data['defect'][$i]['id_plan']."</td>
            <td class = 'id_defect_type'>".$data['defect'][$i]['id_defect_type']."</td>
            <td class = 'amount'>".$data['defect'][$i]['amount']."</td>
        </tr>
        ");
    }?>
</table>
</div>
<div id="right">
<table id="size" class="table-bordered">
    <caption><a href="/size">Размеры</a></caption>
    <tr>
        <th>#</th>
        <th>Размер</th>

    </tr>
    <?php
    for ($i=0;$i<count($data['size']);$i++){
        echo ("
        <tr>
            <td class='id_worker'>".$data['size'][$i]['id_size']."</td>
            <td class = 'name'>".$data['size'][$i]['size']."</td>
        </tr>
        ");
    }?>
</table>

<table id="style" class="table-bordered">
    <caption><a href="/style">Вид</caption>
    <tr>
        <th>#</th>
        <th>Вид</th>

    </tr>
    <?php
    for ($i=0;$i<count($data['style']);$i++){
        echo ("
        <tr>
            <td class='id_style'>".$data['style'][$i]['id_style']."</td>
            <td class = 'style'>".$data['style'][$i]['style']."</td>
        </tr>
        ");
    }?>
</table>

<table id="defect_type" class="table-bordered">
    <caption><a href="/defectType">Вид Брака</a></caption>
    <tr>
        <th>#</th>
        <th>Вид</th>

    </tr>
    <?php
    for ($i=0;$i<count($data['defect_type']);$i++){
        echo ("
        <tr>
            <td class='id_defect_type'>".$data['defect_type'][$i]['id_defect_type']."</td>
            <td class = 'defect_type'>".$data['defect_type'][$i]['defect_type']."</td>
        </tr>
        ");
    }?>
</table>
</div>
</div>