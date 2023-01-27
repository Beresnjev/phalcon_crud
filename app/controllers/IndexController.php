<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends Controller {
    public function indexAction()
    {
        $this->view->users = Users::find();
        $this->view->anekdots = Anekdots::find();
//        $this->view->anekdots->rating = $this->ratingPlusAction($anekdot);
    }
//    public function ratingPlusAction($anekdot) {
//        $anekdot->rating += 1;
//    }
//    public function ratingMinusAction($anekdot) {
//        $anekdot->rating += 1;
//    }
//    public function conditionCheckAction() {
//        if (array_key_exists("button-plus", $_POST)) {
//            $this->ratingPlusAction($anekdot);
//        } else if (array_key_exists("button-minus", $_POST)) {
//            $this->rating_minus($anekdot);
//        }
//    }
    public function ratingAction() {
        $post = $this->request->getPost();
        $id = $post["Id"];
        return print_r($post, true);
        $anekdot = Anekdots::findFirst($id);
        if (in_array('+', $post)) {
            $anekdot->rating += 1;
            $anekdot->save();
            $response = new Response();
//            return $response->redirect();
        } else if (in_array('-', $post)) {
            $anekdot->rating -= 1;
            $anekdot->save();
            $response = new Response();
            return $response->redirect();
        }
    }
}