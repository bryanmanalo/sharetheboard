<?php

class BoardGameHelper {
  private $boardGame;
  private $boardGameWrapper;
  private $gameOwnerHelper;

  function __construct($boardGame) {
    $this->boardGame = $boardGame;
    $this->boardGameWrapper = entity_metadata_wrapper('node',$boardGame);
    $gameOwner = user_load($boardGame->uid);
    $this->gameOwnerHelper = new UserHelper($gameOwner);
  }



  function getBoardGameWrapper(){
    return $this->boardGameWrapper;
  }

  function getGameOwnerHelper(){
    return $this->gameOwnerHelper;
  }

  function isForSale(){
    return $this->availabilityAs(9);
  }

  function isForRent(){
    return $this->availabilityAs(3);
  }

  function isForSwap(){
    return $this->availabilityAs(2);
  }

  function getSearchPrice(){
    $search_price = NULL;
    if($this->isForSale() && isset($this->boardGameWrapper->field_selling_price)){
      $search_price = $this->boardGameWrapper->field_selling_price->value();
    }else if($this->isForRent() && $this->boardGameWrapper->field_rent){
      $search_price = $this->boardGameWrapper->field_rent->value();
    }
    return $search_price;
  }

  private function availabilityAs($tid){
    $found = FALSE;
    foreach($this->boardGameWrapper->field_available_as->value() as $tax){
      if($tax->tid == $tid){
        $found = TRUE;
        break;
      }
    }
    return $found;
  }

  function checkProfileComplete(){
    global $user;
    if($this->boardGame->uid == $user->uid && !user_is_anonymous()){
      $this->gameOwnerHelper->checkProfileComplete();
    }
  }
}
