<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ChangeController extends Controller {

    public function indexAction() {
        $post = $this->request->getPost();
        $id = array_keys($post, "✎");
        $anekdot = Anekdots::findFirst($id);
        $this->view->anekdot = $anekdot;
    }

    public function saveAction() {
        $post = $this->request->getPost();
        $id = array_keys($post, "save");
        $anekdot = Anekdots::findFirst($id);
        $text = $post["Text"];
        $anekdot->text = $text;
        $anekdot->save();
        $response = new Response();
        return $response->redirect();
    }
}