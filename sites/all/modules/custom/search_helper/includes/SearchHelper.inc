<?php
/**
 * Created by PhpStorm.
 * User: mbmanalo
 * Date: 2/24/2017
 * Time: 4:48 PM
 */

class SearchHelper {

  private $user;
  function __construct($user){
    $this->user = $user;
  }

  function updateBoardGameIndexWhenUserUpdates(){
    $query = new EntityFieldQuery();
    $result = $query->entityCondition('entity_type', 'node')
      ->entityCondition('bundle', 'board_game')
      ->propertyCondition('status', NODE_PUBLISHED)
      ->propertyCondition('uid',$this->user->uid)
      ->execute();

    if(isset($result['node'])) {
      $nids = array_keys($result['node']);
    }else{
      $nids = NULL;
    }

    search_api_track_item_change('node', $nids);
  }
}