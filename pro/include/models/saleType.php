<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 2:02
 */
class saleType
{
    protected $db;

    public function __construct(pdo $db)
    {
        $this->db = $db;
    }

    public function getAllTemplateBySchool($idSchool)
    {
        $sth = $this->db->prepare("SELECT mix_sale_type.id  AS value, mix_sale_type.name, mix_sale_type.sale
                                    FROM mix_sale_type
                                    WHERE mix_sale_type.id_school = ?
        ORDER BY sale;
        ");
        $sth->execute([$idSchool]);
        if ($sth->rowCount() == 0) {
            return [];
        } else {
            $mass = [];
            while ($row = $sth->fetch()) {
                $mass[] = $row;
            }
            return $mass;
        }
    }

    public function getData($idSchool, $start)
    {
        $sth = $this->db->prepare("
                        SELECT
                        name as typeName,id,sale
                        FROM  mix_sale_type
                        WHERE mix_sale_type.id_school=?
                        LIMIT $start, 50
        ");
        $sth->execute([$idSchool]);
        if ($sth->rowCount() == 0) {
            return [];
        } else {
            $mass = [];
            while ($row = $sth->fetch()) {
                $mass[] = $row;
            }
            return $mass;
        }
    }

    public function addSale($mass)
    {
        $sth = $this->db->prepare("INSERT INTO mix_sale_type (name, sale, id_school,countDayLimit,timeDay)
            VALUE(?,?,?,?,?)");
        $sth->execute([$mass['name'], $mass['sale'], $mass['id_school'], $mass['countDayLimit'], $mass['timeDay']]);
    }


    public function updSale($arrayData)
    {
        $sth = $this->db->prepare("UPDATE mix_sale_type SET name=?,  sale=?,  timeDay=?,  countDayLimit=? WHERE id=?");
        $sth->execute([$arrayData['name'], $arrayData['sale'], $arrayData['timeDay'], $arrayData['countDayLimit'], $arrayData['id']]);
    }

    public function getInfoById($id)
    {
        $sth = $this->db->prepare("
            SELECT
            id,name,sale, countDayLimit,timeDay
            FROM mix_sale_type
            WHERE id=?
            LIMIT 1
        ");
        $sth->execute([$id]);
        return $sth->fetch();
    }

    public function deleteSale($id)
    {
        $sth = $this->db->prepare("DELETE FROM mix_sale_type WHERE id=?");
        if (is_numeric($id)) {
            $sth->execute([$id]);
        }
    }
}
