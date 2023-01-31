<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class BinController extends Controller {

    public function indexAction() {
        $this->numberCheckAction();
        $anekdots = Anekdots::find();
        $this->view->anekdots = $anekdots;
        $deleted_count = 0;
        foreach ($anekdots as $anekdot) {
            if ($anekdot->status == "Passive") {
                $deleted_count += 1;
            }
        }
        $this->view->deleted_count = $deleted_count;
    }

    public function numberCheckAction() {
        $anekdots = Anekdots::find();
        $number = 1;
        foreach ($anekdots as $anekdot) {
            if ($anekdot->status == "Passive") {
                $anekdot->number = $number;
                $anekdot->save();
                $number += 1;
            }
        }
    }

    public function reviveAction() {
        $post = $this->request->getPost();
        $id = array_keys($post, "revive");
        $anekdot = Anekdots::findFirst($id);
        $anekdot->status = "Active";
        $anekdot->save();
        $response = new Response();
        return $response->redirect("/bin");
    }

    public function terminateAction() {
        $post = $this->request->getPost();
        $id = array_keys($post, "❌");
        $anekdot = Anekdots::findFirst($id);
        $anekdot->delete();
        $response = new Response();
        return $response->redirect("/bin");
    }
}