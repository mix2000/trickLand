<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 0:45
 */
class sale
{
    private $pdo;

    /**
     * sale constructor.
     * @param $pdo
     */
    public function __construct(pdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addSale($mass)
    {
        $sql = "INSERT INTO mix_sale (id_user, `type`, sale, date_at, id_school,id_user_add,dateStart,dateFinal,countVisitLimit)
            VALUE(?,?,?,now(),?,?,?,?,?)";
        $sth = $this->pdo->prepare($sql);
        if (is_numeric($mass['id_user']) and is_numeric($mass['type']) and is_numeric($mass['sale']) and is_numeric($mass['id_school'])) {
            $sth->execute([$mass['id_user'], $mass['type'], $mass['sale'], $mass['id_school'], $mass['id_user_add'],$mass['dateStart'],$mass['dateFinal'],$mass['countVisitLimit']]);
        }

    }

    public function updSale($mass)
    {
        $sth = $this->pdo->prepare("UPDATE mix_sale SET id_user=?, `type`=?, sale=? WHERE id=?");
        if (is_numeric($mass['id_user']) and is_numeric($mass['type']) and is_numeric($mass['sale']) and is_numeric($mass['id'])) {
            $sth->execute([$mass['id_user'], $mass['type'], $mass['sale'], $mass['id']]);
        }
    }

    public function deleteSale($id)
    {
        $sth = $this->pdo->prepare("DELETE FROM mix_sale WHERE id=?");
        if (is_numeric($id)) {
            $sth->execute([$id]);
        }
    }

    public function getInfoById($id)
    {
        $sth = $this->pdo->prepare("
            SELECT
            mix_sale.type,mix_sale.id_user,mix_sale.sale
            FROM mix_sale
            WHERE id=?
            LIMIT 1
        ");
        $sth->execute([$id]);
        return $sth->fetch();
    }

    public function getData($idSchool, $start)
    {
        $sth = $this->pdo->prepare("
                        SELECT
                        DATE_FORMAT(mix_sale.date_at, '%d-%m-%Y %H:%i:%s') as date_at,t1.username AS saleMan, t2.username AS enterMan, t3.name AS typeName, mix_sale.sale,mix_sale.id
                        FROM mix_sale , mix_user  AS t1,  mix_user  AS t2, mix_sale_type AS t3
                        WHERE mix_sale.id_school=? AND mix_sale.id_user= t1.id AND mix_sale.id_user_add=t2.id AND t3.id=mix_sale.type
                        ORDER BY mix_sale.date_at
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

    public function getDataByDate($idSchool, $start, $date)
    {
        $sth = $this->pdo->prepare("
                        SELECT
                        DATE_FORMAT(mix_sale.date_at, '%d-%m-%Y %H:%i:%s') as date_at,t1.username AS saleMan, t2.username AS enterMan, t3.name AS typeName, mix_sale.sale,mix_sale.id
                        FROM mix_sale , mix_user  AS t1,  mix_user  AS t2, mix_sale_type AS t3
                        WHERE mix_sale.id_school=? AND mix_sale.id_user= t1.id AND mix_sale.id_user_add=t2.id AND t3.id=mix_sale.type and DATE_FORMAT(mix_sale.date_at, '%Y-%m-%d')=?
                        ORDER BY mix_sale.date_at
                        LIMIT $start, 50
        ");
        $sth->execute([$idSchool, $date]);
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

    public function addSubscription($mass){
        $sql = "INSERT INTO mix_subscription (date_at, date_fn, id_user, id_school, count_of, visit) VALUE(now(),(NOW() + INTERVAL 90 DAY), ?,?,?,?)";
        $sth = $this->pdo->prepare($sql);
        $sth->execute([$mass['id_user'],$mass['id_school'],$mass['count_of'],0]);
    }
}