<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 08.10.2016
 * Time: 3:25
 */
class blog extends router
{
    protected $module = 'blog';

    public function __construct(pdo $db, $routers = [], $params = [])
    {
        $this->db = $db;
        $this->routers = $routers;
        $this->params = $params;
    }

    public function unit($name)
    {
        if($name == ''){
            $info = $this->getNews();
            $this->renderPage($info,'index');
        }else{
            $sql = "SELECT * FROM mix_blog WHERE `key`=?";
            $sth = $this->db->prepare($sql);
            $sth->execute([$name]);
            if($sth->rowCount()==0){
                $this->callError404();
            }else{
                $info = $sth->fetch();
                $this->renderPage($info,'blogPost');
            }
        }
    }
    private function getNews(){
        $post = [];
        $sql = $this->params['getPage'];
        $sth = $this->db->prepare($sql);
        $sth->execute(['blog']);
        $post = $sth->fetch();
        if(isset($_GET['page']) and is_numeric($_GET['page'])){
            $start = $_GET['page']*10;
            $sql = "SELECT title, preview, `key` FROM mix_blog ORDER BY id DESC LIMIT $start,10";
            $sth = $this->db->query($sql);
            if($sth->rowCount()==0){
                $this->callError404();
            }else{
                while($row = $sth->fetch()){
                    $post['post'][] = $row;
                }
            }
        }else{
            $sql = "SELECT title, preview, `key` FROM mix_blog ORDER BY id DESC LIMIT 0,10";
            $sth = $this->db->query($sql);
            if($sth->rowCount()==0){
                $this->callError404();
            }else{
                while($row = $sth->fetch()){
                    $post['post'][] = $row;
                }
            }
        }
        return $post;
    }
}