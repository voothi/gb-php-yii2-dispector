<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 04.03.2019
 * Time: 19:08
 */

namespace app\widgets\ViewUsersListWidget;


use yii\bootstrap\Widget;

class ViewUsersListWidget extends Widget
{
    public $users;

    public function init()
    {
        parent::init();

        if(empty($this->users)){
            throw new \Exception('need param users');
        }
    }

    public function run(){

        return $this->render('index',['users'=>$this->users]);
    }
}