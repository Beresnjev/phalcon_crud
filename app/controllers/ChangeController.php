<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ChangeController extends Controller {

    public function indexAction($id) {
        $anekdot = Anekdots::findFirst($id);
        $this->view->anekdot = $anekdot;
    }

    public function saveAction() {
        $response = new Response();
        $post = $this->request->getPost();
        $id = $post["anekdotId"];
        $anekdot = Anekdots::findFirst($id);
        $text = $post["Text"];
        if ($text == "") {
            return $response->redirect("/change/error");
        } else {
            $anekdot->text = $text;
            echo print_r($anekdot->id);
            $anekdot->save();
            return $response->redirect();
        }
    }

    public function errorAction() {

    }
}