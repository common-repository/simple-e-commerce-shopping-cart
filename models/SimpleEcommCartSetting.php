<?php
class SimpleEcommCartSetting {
  
  public static function setValue($key, $value) {
    global $wpdb;
    $key = sanitize_text_field($key);
    $settingsTable = SimpleEcommCartCommon::getTableName('cart_settings');
    if(!empty($key)) {
      $dbKey = $wpdb->get_var($wpdb->prepare("SELECT `key` from $settingsTable where `key`= %s", $key));
      if($dbKey) {
        if(!empty($value)) {
          $wpdb->update($settingsTable, 
            array('key'=>$key, 'value'=>$value),
            array('key'=>$key),
            array('%s', '%s'),
            array('%s')
          );
        }
        else {
          $wpdb->query($wpdb->prepare("DELETE from $settingsTable where `key`= %s", $key));
        }
      }
      else {
        if(!empty($value)) {
          $wpdb->insert($settingsTable, 
            array('key'=>$key, 'value'=>$value),
            array('%s', '%s')
          );
        }
      }
    }
    
  }
  
  public static function getValue($key, $entities=false) {
    global $wpdb;
    $settingsTable = SimpleEcommCartCommon::getTableName('cart_settings');
    $value = $wpdb->get_var($wpdb->prepare("SELECT `value` from $settingsTable where `key`= %s", $key));
    
    if(!empty($value) && $entities) {
      $value = htmlentities($value);
    }
    
    return empty($value) ? false : $value;
  }
  
  public static function validateDebugValue($value, $expected){
    if($value != $expected){
      // test failed
      $output = "<span class='failedDebug'>" . $value . "</span>";
    }
    else{
      $output = $value;
    }
    return $output;
  }
  
}