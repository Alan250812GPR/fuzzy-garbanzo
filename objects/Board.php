<?php


namespace trello;

class Board extends TrelloSupport
{
    /** @var string */ public $id;
    /** @var string */ public $name;
    /** @var string */ public $url;
    /** @var TList[] */ public $List;
    
    public function __construct() {
        parent::__construct($this);
    }

    public function SetBoard($JSONobject) {
        $o = $JSONobject;

        $this->id = $o["id"];
        $this->name = $o["name"];
        $this->url = $o["url"];
    }
}