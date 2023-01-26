<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->users = Users::find();
        $this->view->anekdots = Anekdots::find();
    }
}