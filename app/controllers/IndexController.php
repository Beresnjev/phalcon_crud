<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Tag;
use Phalcon\Assets\Manager;

class IndexController extends Controller {

    public function indexAction() {
        $this->numberCheckAction();
        $anekdots = Anekdots::find();
        $this->view->anekdots = $anekdots;
        $funny_count = 0;
        foreach ($anekdots as $anekdot) {
            if ($anekdot->status == "Active") {
                $funny_count += 1;
            }
        }
        $this->view->funny_count = $funny_count;

        $this->assets->addCss("public/css/style.css");
    }

    public function numberCheckAction() {
        $anekdots = Anekdots::find();
        $number = 1;
        foreach ($anekdots as $anekdot) {
            if ($anekdot->status == "Active") {
                $anekdot->number = $number;
                $anekdot->save();
                $number += 1;
            }
        }
    }

    public function ratingAction() {
        $post = $this->request->getPost();
        if (in_array('👍', $post)) {
            $id = array_keys($post, "👍");
            $anekdot = Anekdots::findFirst($id);
            $anekdot->rating += 1;
            $anekdot->save();
            $response = new Response();
            return $response->redirect();
        } else if (in_array('👎', $post)) {
            $id = array_keys($post, "👎");
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