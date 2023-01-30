<?php

use Phalcon\Mvc\Controller;

class AnekdotPostController extends Controller {

    public function indexAction()
    {

    }

    public function postAction()
    {
        $post = $this->request->getPost();

        $anekdot = new Anekdots();
        $anekdot->author = $post["author"];
        $anekdot->text = $post["text"];

        $success = $anekdot->save();

        $this->view->success = $success;

        if ($success) {
            $message = "Well done! You have posted your anekdot! Very funny!";
        } else {
            $message = "Oh... to bad! You can not post your anekdot because:<br>"
                . implode('<br>', $anekdot->getMessages());
        }

        $this->view->message = $message;
    }
}