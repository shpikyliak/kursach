<?php

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $base = 'kursach';
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->base);
        if (!$this->mysqli) {
            exit ('Нет подключения к базе!');
        }
        $this->mysqli->query('SET NAMES utf8');
    }

    public function getAllFrom($table)
    {


        $sql = "SELECT * FROM " . $table;
        $result = mysqli_query($this->mysqli, $sql);


        if (!$result) {
            exit ('No table');
        }
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row[] = $result->fetch_assoc();
        }

        return $row;
    }

    public function getAll()
    {
        $row['worker'] = $this->getAllFrom('worker');
        $row['size'] = $this->getAllFrom('size');
        $row['style'] = $this->getAllFrom('style');
        $row['plan'] = $this->getAllFrom('plan');
        $row['defect'] = $this->getAllFrom('defect');
        $row['defect_type'] = $this->getAllFrom('defect_type');

        return $row;
    }

    public function getOneFrom($data, $table)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $data['field'] . '=' . $data['value'];
        $result = mysqli_query($this->mysqli, $sql);
        if (!$result) {
            exit ('No table');
        }
        $row = $result->fetch_assoc();
        return $row;
    }

    public function addInTable($data, $table)
    {
        $sql = '';
        $values = '';
        for ($i = 0; $i < count($data); $i++) {
            $col = '';
            $values .= '(';
            foreach ($data[$i] as $key => $value) {
                $col .= $key . ',';
                $values .= "'" . $value . "'" . ",";
            }

            $col[strlen($col) - 1] = ' ';
            $values[strlen($values) - 1] = ')';
            $values .= ',';

        }
        $values[strlen($values) - 1] = ' ';
        $sql .= "INSERT INTO " . $table . " (" . $col . ") VALUES " . $values . "; ";
        $result = mysqli_query($this->mysqli, $sql);
        if (!$result)
            throw new Exception('Ошибка базы данных!');
        return true;
    }

    public function delete($id, $table)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE id_' . $table . '=' . $id;
        var_dump($sql);
        $result = mysqli_query($this->mysqli, $sql);
        if (!$result)
            throw new Exception('Ошибка базы данных!');
        return true;
    }
}