<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 14:23
 */
class visit
{
    protected $db;

    /**
     * visit constructor.
     * @param $db
     */
    public function __construct(pdo $db)
    {
        $this->db = $db;
    }

    protected function checkUserVisit($array)
    {
        $sql = "SELECT count(*) AS counter FROM mix_visit WHERE id_user = ? AND id_visit = ?";
        $sth = $this->db->prepare($sql);
        $sth->execute([$array['idUser'], $array['idVisit']]);
        $result = $sth->fetch();
        return $result['counter'];
    }

    /*
     * return 1 when have any visit
     * return 0 when don't have Subscription
     * return 2 when Subscription, but don't have visit*
     */
    protected function checkUserSubscription($idUser, $date = '')
    {
        $personalArea = new personalArea($this->db);
        $userData = $personalArea->getSubscriptionState($idUser, $date);
        if (isset($userData['dateStart'])) {
            if ($userData['countVisitLimit'] > 0) {
                return ['msg' => 1, 'data' => $userData];
            }
            return ['msg' => 2, 'data' => $userData];
        }
        return ['msg' => 0];
    }

    protected function updUserCountVisit($idUser, $idVisit, $action)
    {
        $trainingData = $this->getInfoById($idVisit);
        $dataSubscription = $this->checkUserSubscription($idUser, $trainingData['dateSql']);
        if ($action == 'add') {
            if ($dataSubscription['msg'] == 1) {
                // upd ++;
                $sql = "UPDATE mix_sale SET countVisit=countVisit+1 WHERE id=?";
                $sth = $this->db->prepare($sql);
                $sth->execute([$dataSubscription['data']['id']]);
            }
        } elseif ($action == 'delete') {
            if ($dataSubscription['msg'] == 1 or $dataSubscription['msg'] == 2) {
                // upd --;
                $sql = "UPDATE mix_sale SET countVisit=countVisit-1 WHERE id=?";
                $sth = $this->db->prepare($sql);
                $sth->execute([$dataSubscription['data']['id']]);
            }
        }

    }

    public function addVisit($array)
    {
        if ($this->checkUserVisit($array) == 0) {
            $sth = $this->db->prepare("INSERT INTO mix_visit ( id_user, id_visit)
                                    VALUE (?,?)");
            $sth->execute([$array['idUser'], $array['idVisit']]);
            $text = 'add';
        } else {
            $sth = $this->db->prepare("DELETE FROM mix_visit WHERE id_user=? AND id_visit=?");
            $sth->execute([$array['idUser'], $array['idVisit']]);
            $text = 'delete';
        }
        $this->updUserCountVisit($array['idUser'], $array['idVisit'], $text);
        return $text;
    }

    public
    function getVisitByDate($mass)
    {
        $sth = $this->db->prepare("SELECT
  t3.username AS saleMan,
  t1.training_type,
  t4.countVisit,
  t5.username AS trainerName,
  t1.id AS trainingId,
  date_format(date_at, '%d-%m-%Y')
FROM (mix_visit_trainer AS t1, mix_visit AS t2, mix_user AS t3, mix_user AS t5)
  LEFT JOIN mix_sale AS t4 ON t4.dateStart <= now() AND t4.dateFinal >= now() AND countVisit < countVisitLimit
                              AND t4.id_user = t2.id_user
WHERE DATE_FORMAT(t1.date, '%Y-%m-%d') = ? AND t1.id = t2.id_visit AND t3.id = t2.id_user AND
      t5.id = t1.trainer_id
ORDER BY DATE_FORMAT(t1.date, '%Y-%m-%d'), t1.id, t5.username
        ");
        $sth->execute([$mass['date']]);
        if ($sth->rowCount() == 0) {
            return [];
        } else {
            $mass = [];
            while ($row = $sth->fetch()) {
                $row['typeName'] = ($row['countVisit'] == '') ? 2 : 1;
                $mass[] = $row;
            }
            return $mass;
        }
    }

    public
    function getInfoById($idTraining)
    {
        $info['id'] = '';
        $info['date'] = '';
        $info['training_type'] = '';
        if ($idTraining == '' and !is_numeric($idTraining)) {
            return $info;
        }

        if (usersClass::$userType == 'trainer') {
            $dopSql = "and trainer_id=?";
            $arrayData = [$idTraining, usersClass::$userData['id']];
        } else {
            $dopSql = '';
            $arrayData = [$idTraining];
        }
        $sql = "SELECT
                  t1.trainer_id,
                  DATE_FORMAT(t1.date,'%d-%m-%Y %H:%i') as date,
                  t1.date as dateSql,
                  DATE_FORMAT(t1.date,'%Y-%m-%dT%H:%i') as dateLabel,
                  t1.training_type,
                  t1.id,
                  t2.username
                FROM mix_visit_trainer as t1, mix_user as t2
                WHERE t1.id = ? and t1.trainer_id = t2.id $dopSql"; //yyyy-MM-ddThh:mm
        $sth = $this->db->prepare($sql);
        $sth->execute($arrayData);
        if ($sth->rowCount() > 0) {
            return $sth->fetch();
        }
        return $info;
    }

    public
    function getInfoVisitById($idTraining)
    {
        $sql = "SELECT id_user
                  FROM mix_visit
                WHERE id_visit = ?";
        $sth = $this->db->prepare($sql);
        $sth->execute([$idTraining]);
        if ($sth->rowCount() > 0) {
            $arrayUser = [];
            while ($row = $sth->fetch()) {
                $arrayUser[] = $row['id_user'];
            }
            return $arrayUser;
        }
        return [];
    }

    public
    function addTraining($array)
    {
        $sql = "INSERT INTO mix_visit_trainer (trainer_id, date, training_type) VALUE(?,?,?)";
        $sth = $this->db->prepare($sql);
        $sth->execute([usersClass::$userData['id'], $array['date'], $array['training_type']]);
        return $this->db->lastInsertId();
    }

    public
    function updTraining($array)
    {
        if (usersClass::$userType == 'trainer') {
            $dopSql = "and trainer_id=:trainer_id";
            $arrayData = ['trainer_id' => usersClass::$userData['id']];
        } else {
            $dopSql = '';
        }
        $arrayData['id'] = $array['id'];
        $arrayData['date'] = $array['date'];
        $arrayData['training_type'] = $array['training_type'];
        $sql = "UPDATE mix_visit_trainer SET training_type=:training_type, `date`=:date WHERE id=:id $dopSql";
        $sth = $this->db->prepare($sql);
        $sth->execute($arrayData);
        return $array['id'];
    }

    public
    function getMyTrainingTrainer()
    {
        $result = [];
        $sql = "SELECT
                  mix_visit_trainer.id,
                  date_format(mix_visit_trainer.date,'%d-%m-%Y %H:%i') AS `date`,
                  mix_visit_trainer.training_type,
                  count(mix_visit.id_user) AS countUser
                FROM (mix_visit_trainer)
                  LEFT JOIN mix_visit ON mix_visit.id_visit = mix_visit_trainer.id
                WHERE mix_visit_trainer.trainer_id = ?
                GROUP BY mix_visit_trainer.id";
        $sth = $this->db->prepare($sql);
        $sth->execute([usersClass::$userData['id']]);
        if ($sth->rowCount() > 0) {

            while ($row = $sth->fetch()) {
                $result[] = $row;
            }

        }
        return $result;
    }
}