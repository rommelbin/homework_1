<?php
// 2* Добавьте метод andWhere в класс Db, который обеспечит реализацию цепочеки:
//echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();
//что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5
class Db
{
    protected $tableName;
    protected $wheres = [];
    protected $andwheres = [];

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($this->wheres)) {
            $sql .= " WHERE " . $this->wheres[0]['field'] . ' = ' . $this->wheres[0]['value'] . ' ';
            $this->wheres = [];
            if(!empty($this->andwheres)) {
                foreach ($this->andwheres as $value) {
                    $sql .= $value['sql'] . ' ' . $value['field'] . " = " . $value['value'] . ' ';
                }
                $this->andwheres = [];
            }

        }


        return $sql . PHP_EOL;
    }

    public function getOne($id)
    {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id}" . PHP_EOL;
    }

    public function where($field, $value)
    {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function andwhere($field, $value, string $condition)
    {
        $this->andwheres[] = [
            'field' => $field,
            'value' => $value,
            'sql' => $condition
        ];
        return $this;
    }
}

$db = new Db();

echo $db->table('losers')->where('login', 'loser')->getAll();
//echo $db->table('losers')->where('login', 'loser')->andwhere('pass', '123', 'OR')->andwhere('id', 1, 'OR')->getAll();