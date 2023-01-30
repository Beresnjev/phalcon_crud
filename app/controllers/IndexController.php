<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends Controller {
    public function indexAction()
    {
//        $this->view->users = Users::find();
        $this->view->anekdots = Anekdots::find();
    }
    public function ratingAction() {
        $post = $this->request->getPost();
        echo print_r(array_keys($post, "+"), true);
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
}