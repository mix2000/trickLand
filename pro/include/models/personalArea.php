<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 2:32
 */
class personalArea
{
    private $pdo;

    /**
     * personalArea constructor.
     * @param $pdo
     */
    public function __construct(pdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPayDataByUser($idUser)
    {
        $sql = "SELECT
                  DATE_FORMAT(mix_sale.date_at, '%d-%m-%Y %H:%i:%s') AS date_at,
                  t3.name                                            AS typeName,
                  mix_sale.sale
                FROM mix_sale, mix_sale_type AS t3
                WHERE mix_sale.id_user = ? AND t3.id=mix_sale.type
                ORDER BY date_at";
        $sth = $this->pdo->prepare($sql);
        $sth->execute([$idUser]);
        $returnArray = [];
        if ($sth->rowCount() != 0) {
            while ($row = $sth->fetch()) {
                $returnArray[] = $row;
            }
        }
        return $returnArray;
    }

    public function getSubscriptionState($idUser, $date = '')
    {

        $arrayInfo['info'] = 'Информации по абонементу не найдено';
        $lastDate = $this->getLastSubscription($idUser, $date);
        if ($lastDate !== false) { // если нашли абонемент
            $arrayInfo['info'] = 'Абонемент приобретен ' . $lastDate['lastDate'];
            $arrayInfo['visit'] = $this->getVisitByUser($idUser, $lastDate['sqlDate']);
            $arrayInfo['dateStart'] = $lastDate['lastDate'];
            $arrayInfo['dateFinal'] = $lastDate['dateFinal'];
            $arrayInfo['countVisitLimit'] = $lastDate['countVisitLimit'] - $lastDate['countVisit'];
            $arrayInfo['id'] = $lastDate['id'];
        } else { // получаем даты посещений
            $arrayInfo['visit'] = $this->getVisitByUser($idUser);
        }
        return $arrayInfo;
    }

    private function getLastSubscription($idUser, $date = '')
    {
        $date = ($date == '') ? 'now()' : "'$date'";
        $sql = "SELECT
        id,
          date_format(dateStart, '%d-%m-%Y') AS lastDate,
          date_format(dateStart, '%Y-%m-%d') AS sqlDate,
          date_format(dateFinal, '%d-%m-%Y') AS dateFinal,
          countVisit,countVisitLimit
        FROM mix_sale
        WHERE id_user = ? AND type = 2 AND dateStart <= {$date} AND dateFinal >= {$date}";
        $sth = $this->pdo->prepare($sql);
        $sth->execute([$idUser]);
        if ($sth->rowCount() != 0) {
            $row = $sth->fetch();
            if ($row['lastDate'] != '') {
                return $row;
            }

        }
        return false;
    }

    private function getVisitByUser($idUser, $lastDate = '')
    {
        $lastDate = ($lastDate != '') ? " and date>='{$lastDate}'" : '';
        $sql = "SELECT date_format(`date`, '%d-%m-%Y') AS date_at
                        FROM mix_visit, mix_visit_trainer
                        WHERE mix_visit_trainer.date AND mix_visit.id_visit = mix_visit_trainer.id
                              AND mix_visit.id_user = ? $lastDate

                             ORDER by date_at";
        $sth = $this->pdo->prepare($sql);
        $sth->execute([$idUser]);
        $visit = [];
        if ($sth->rowCount() != 0) {
            while ($row = $sth->fetch()) {
                $visit[] = $row['date_at'];
            }
        }
        return $visit;
    }
}