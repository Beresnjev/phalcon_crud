<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends Controller {

    public function indexAction() {
        $anekdots = Anekdots::find();
        $this->view->anekdots = $anekdots;
        $funny_count = 0;
        foreach ($anekdots as $anekdot) {
            if ($anekdot->status == "Active") {
                $funny_count += 1;
            }
        }
        $this->view->funny_count = $funny_count;
    }

    public function ratingAddAction($id) {
        $anekdot = Anekdots::findFirst($id);
        $anekdot->rating += 1;
        $anekdot->save();
        $response = new Response();
        return $response->redirect();
    }

    public function ratingSubtractAction($id) {
        $anekdot = Anekdots::findFirst($id);
        $anekdot->rating -= 1;
        $anekdot->save();
        $response = new Response();
        return $response->redirect();
    }

    public function deleteAction($id) {
        $anekdot = Anekdots::findFirst($id);
        $anekdot->status = "Passive";
        $anekdot->save();
        $response = new Response();
        return $response->redirect();
    }
}