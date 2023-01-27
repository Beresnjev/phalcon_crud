<?php

use Phalcon\Mvc\Model;

class Anekdots extends Model
{
    public $id;
    public $author;
    public $text;
    public $rating = 0;
    public $status = "Active";
}