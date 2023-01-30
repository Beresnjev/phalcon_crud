<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class BinController extends Controller {

    public function indexAction() {
        $this->view->anekdots = Anekdots::find();
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
        $id = array_keys($post, "X");
        $anekdot = Anekdots::findFirst($id);
        $anekdot->delete();
        $response = new Response();
        return $response->redirect("/bin");
    }
}