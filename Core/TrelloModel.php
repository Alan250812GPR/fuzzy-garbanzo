<?php


namespace trello;

class TrelloModel 
{
    /** @var User */ private $user;
    public function __construct(User $user) {
        $this->user = $user;         
    }

    public function TrelloMapping() 
    {
        $trello = new TrelloBoard($this->user->Token(), $this->user->ID());
        $Lists = $trello->GetListsForBoard($this->user->BoardList()[0]);
        $cards = $trello->GetCardsForBoard($this->user->BoardList()[0]);
        $Board = $trello->GetBoard($Lists[0]->idBoard);

        $CardListHash = [];
        foreach($cards as $card) {
            $CardListHash[$card->idList] = isset($CardListHash[$card->idList]) ? $CardListHash[$card->idList]: [];
            $CardListHash[$card->idList][] = $card;
        }

        $ListBoardHash = [];
        foreach($Lists as $List) {
            $ListBoardHash[$List->idBoard] = isset($ListBoardHash[$List->idBoard]) ? $ListBoardHash[$List->idBoard]: [];

            $UseCards = isset($CardListHash[$List->id]) ? $CardListHash[$List->id]: [];
            $List->Cards = $UseCards;

            $ListBoardHash[$List->idBoard][] = $List;
        }

        $BoardList = $ListBoardHash[$Board->id];
        $Board->List = $BoardList;

        return $Board;
    }
}