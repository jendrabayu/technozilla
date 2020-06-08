<?php

namespace App\Core;

use PDO;

class DB
{
    protected $sql;
    protected $db;

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        try {
            $this->dbh = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->user,
                $this->pass,
                [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        try {
            $this->stmt->execute();
        } catch (PDOException $e) {
            return $e->errorInfo;
        }
    }



    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function rowCount()
    {
        return $this->stmt->rowCount();
    }


    public function select(...$column)
    {
        $strColumn = '';
        if (is_array($column)) {
            foreach ($column as $col) {
                if (empty($strColumn)) {
                    $strColumn = $col;
                } else {
                    $strColumn = $strColumn . ', ' . $col;
                }
            }
        } else {
            $strColumn = $column;
        }
        $this->sql = sprintf('SELECT %s', $strColumn);
        return $this;
    }

    public function from($table)
    {
        $this->sql = sprintf('%s FROM %s', $this->sql, $table);
        return $this;
    }

    public function limit($start, $end)
    {
        $this->sql = sprintf('%s LIMIT %s, %s', $this->sql, $start, $end);
        return $this;
    }

    public function where($column, $operator = null, $value = null)
    {
        if (is_array($column)) {
            $query = '';
            foreach ($column as $key => $value) {
                if ($key == (count($column) - 1)) {
                    $query = $query . '' . sprintf("%s %s '%s'", $value[0], $value[1], $value[2]);
                } else {
                    $query = $query . '' . sprintf("%s %s '%s' AND ", $value[0], $value[1], $value[2]);
                }
            }

            $this->sql = sprintf("%s WHERE %s", $this->sql, $query);
            return $this;
        }
        $this->sql = sprintf("%s WHERE %s %s '%s'", $this->sql, $column, $operator, $value);
        return $this;
    }

    public function whereDate($req, $operator, $value)
    {
        $this->sql = sprintf("%s WHERE %s %s %s", $this->sql, $req, $operator, $value);
        return $this;
    }

    public function whereIsNull($column)
    {
        $this->sql = sprintf("%s WHERE %s IS NULL", $this->sql, $column);
        return $this;
    }

    public function andWhere($req, $operator, $value)
    {
        $this->sql = sprintf("%s AND %s %s '%s'", $this->sql, $req, $operator, $value);
        return $this;
    }

    public function orWhereIsNull($column)
    {
        $this->sql = sprintf("%s OR %s IS NULL", $this->sql, $column);
        return $this;
    }

    public function join($table, $req, $operator, $value)
    {
        $this->sql = sprintf('%s JOIN %s ON %s %s %s', $this->sql, $table, $req, $operator, $value);
        return $this;
    }


    public function get($table =  null)
    {
        $query = "";
        $table ? $query = sprintf('SELECT * FROM %s', $table) : $query = $this->sql;
        $this->query($query);
        return $this->resultSet();
    }

    public function first($table =  null)
    {
        $query = "";
        $table ? $query = sprintf('SELECT * FROM %s', $table) : $query = $this->sql;
        $this->query($query);
        return $this->single();
    }


    public function orderBy($column, $sorting = null)
    {
        $sorting == null ? $sorting = '' : $sorting = $sorting;
        $this->sql = sprintf("%s ORDER BY %s %s", $this->sql, $column, $sorting);

        return $this;
    }

    public function groupBy($column)
    {
        $this->sql = sprintf('%s GROUP BY %s', $this->sql, $column);
        return $this;
    }


    public function andLike($column, $value)
    {
        $this->sql = $this->sql . " AND " . $column . " LIKE '%" . $value . "%' ";
        return $this;
    }

    public function like($column, $value)
    {
        $this->sql = $this->sql . " WHERE " . $column . " LIKE '%" . $value . "%' ";
        return $this;
    }

    public function orLike($column, $value)
    {
        $this->sql = $this->sql . "OR " . $column . " LIKE '%" . $value . "%' ";
        return $this;
    }

    public function insert($table, $array = [])
    {
        $strCoulumn = '';
        foreach ($array as $key => $value) {
            if (empty($strCoulumn)) {

                $strCoulumn =  ':' . $key;
            } else {
                $strCoulumn = $strCoulumn . ', :' . $key;
            }
        }
        $query = sprintf('INSERT INTO %s VALUES (%s)', $table, $strCoulumn);
        $this->query($query);
        foreach ($array as $key => $value) {
            $this->bind($key, $value);
        }

        $this->execute();
        return $this->rowCount();
    }

    public function update($table, $array = [], $req, $operator, $val)
    {
        $strColumn = '';

        foreach ($array as $key => $value) {
            if (empty($strColumn)) {
                $strColumn = sprintf('%s = :%s', $key, $key);
            } else {
                $strColumn = sprintf('%s, %s = :%s', $strColumn, $key, $key);
            }
        }
        $query = sprintf(
            'UPDATE %s SET %s WHERE %s %s :%s',
            $table,
            $strColumn,
            $req,
            $operator,
            $req
        );

        $this->query($query);

        foreach ($array as $key => $value) {
            $this->bind($key, $value);
        }

        $this->bind($req, $val);
        $this->execute();
        return $this->rowCount();
    }

    public function delete($table, $req, $operator, $val)
    {
        $query = sprintf('DELETE FROM %s WHERE %s %s :%s', $table, $req, $operator, $req);
        $this->query($query);
        $this->bind($req, $val);
        $this->execute();
        return $this->rowCount();
    }

    public function __toString()
    {
        return $this->sql;
    }
}
