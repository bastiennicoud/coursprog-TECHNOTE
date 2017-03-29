<?php

  // cette classe permet d'effectuer de petites validations sur des champs

  class VALIDATE {

    public static function exists($field){

      if(strlen($field) < 1) {
        return false;
      } else {
        return true;
      }

    }

    public static function numeric($field){

      if(is_numeric($field)) {
        return true;
      } else {
        return false;
      }

    }

  }
