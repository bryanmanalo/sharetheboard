<?php

class UserHelper{
  private $user;
  private $userWrapper;

  function __construct($user) {
    $this->user = $user;
    $this->userWrapper = entity_metadata_wrapper('user', $user);
  }

  function getUserWrapper(){
    return $this->userWrapper;
  }

  function getUser(){
    return $this->user;
  }

  function getPhotoUrl(){
    $url = null;
    if(isset($this->user->picture) && isset($this->user->picture->uri)){
      $url = $this->user->picture->uri;
    }else if(isset($this->user->picture) && !empty($this->user->picture)){
      $url = file_load($this->user->picture)->uri;
    }
    return $url;
  }

  function getLocationCity(){
    $location = array();
    foreach($this->userWrapper->field_location->value() as $_location){
      $location[] = $_location->name;
    }
    return $location;
  }

  function hasPickupLocation(){
    //dpm($this->userWrapper->field_pickup_locations->value());
    return sizeof($this->userWrapper->field_pickup_locations->value()) > 0;
  }

  function getFBId(){
    return isset($this->user->fbid) ? $this->user->fbid : '';
  }

  function checkProfileComplete(){
    $error = 0;
    if(empty($this->userWrapper->field_contact_number->value())){
      $error = 1;
      drupal_set_message('Contact Number not provided','warning');
    }

    if(empty($this->getLocationCity())){
      $error = 1;
      drupal_set_message('Location City not provided','warning');
    }

    if(empty($this->userWrapper->field_pickup_locations->value())){
      $error = 1;
      drupal_set_message('Pickup Location map not provided','warning');
    };

    if($error){
      drupal_set_message('Please add above missing profile data <a href="/user/' . $this->user->uid .'/edit">here</a>', 'warning');
    }



  }




}