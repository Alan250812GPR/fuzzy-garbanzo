<?php

namespace trello;

class TList extends TrelloSupport
{
    /** @var string */ public $id;
    /** @var string */ public $name;
    /** @var bool */ public $closed;
    /** @var string */ public $idBoard;
    /** @var int */ public $pos;
    /** @var bool */ public $subscribed;
    /** @var int */ public $softLimit;
    /** @var Card[] */ public $Cards;
    
    public function __construct() {
        parent::__construct($this);
    }

    public function SetList($JSONobject) {
        $o = $JSONobject;

        $this->id = $o["id"];
        $this->name = $o["name"];
        $this->closed = $o["closed"];
        $this->idBoard = $o["idBoard"];
        $this->pos = $o["pos"];
        $this->subscribed = $o["subscribed"];
        $this->softLimit = $o["softLimit"];
    }
}