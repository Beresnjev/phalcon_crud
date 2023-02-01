<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ChangeController extends Controller {

    public function indexAction() {
        $post = $this->request->getPost();
        $id = array_keys($post, "✎");
        $this->view->print_r = print_r($post, true);
        $anekdot = Anekdots::findFirst($id);
        $this->view->anekdot = $anekdot;
    }

    public function saveAction() {
        $response = new Response();
        $post = $this->request->getPost();
        $id = array_keys($post, "save");
        $anekdot = Anekdots::findFirst($id);
        $text = $post["Text"];
        if ($text == "") {
            return $response->redirect("/change/error");
        } else {
            $anekdot->text = $text;
            $anekdot->save();
            return $response->redirect();
        }
    }

    public function errorAction() {

    }
}