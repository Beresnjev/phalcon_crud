<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Tag;

class IndexController extends Controller {

    public function indexAction() {
        $this->view->anekdots = Anekdots::find();
    }

    public function ratingAction() {
        $post = $this->request->getPost();
        if (in_array('+', $post)) {
            $id = array_keys($post, "+");
            $anekdot = Anekdots::findFirst($id);
            $anekdot->rating += 1;
            $anekdot->save();
            $response = new Response();
            return $response->redirect();
        } else if (in_array('-', $post)) {
            $id = array_keys($post, "-");
            $anekdot = Anekdots::findFirst($id);
            $anekdot->rating -= 1;
            $anekdot->save();
            $response = new Response();
            return $response->redirect();
        }
    }

    public function deleteAction() {
        $post = $this->request->getPost();
        $id = array_keys($post, "delete");
        $anekdot = Anekdots::findFirst($id);
        $anekdot->status = "Passive";
        $anekdot->save();
        $response = new Response();
        return $response->redirect();
    }
}