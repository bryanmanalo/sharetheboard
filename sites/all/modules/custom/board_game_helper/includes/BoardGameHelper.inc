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
    return $this->availabilityAs('Sale');
  }

  function isForRent(){
    return $this->availabilityAs('Rent');
  }

  function isForSwap(){
    return $this->availabilityAs('Swap');
  }

  private function availabilityAs($name){
    $found = FALSE;
    foreach($this->boardGameWrapper->field_available_as->value() as $tax){
      if($tax->name == $name){
        $found = TRUE;
        break;
      }
    }
    return $found;
  }

  function checkProfileComplete(){
    global $user;
    if($this->boardGame->uid == $user->uid){
      $this->gameOwnerHelper->checkProfileComplete();
    }
  }
}
