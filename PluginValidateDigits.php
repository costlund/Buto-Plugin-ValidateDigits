<?php
class PluginValidateDigits{
  private $i18n = null;
  function __construct() {
    wfPlugin::includeonce('i18n/translate_v1');
    $this->i18n = new PluginI18nTranslate_v1();
    $this->i18n->setPath('/plugin/validate/digits/i18n');
  }
  public function validate_digits($field, $form, $data = array()){
    $form = new PluginWfArray($form);
    $data = new PluginWfArray($data);
    /**
     * exception
     */
    if(!$data->get('length')){
      throw new Exception(__CLASS__.'::'.__FUNCTION__.' says: Param length is not set.');
    }
    /**
     * 
     */
    if($form->get("items/$field/is_valid") && strlen($form->get("items/$field/post_value"))){
      $error = false;
      /**
       * is_numeric
       */
      if(!is_numeric($form->get("items/$field/post_value"))){
        $error = true;
      }
      /**
       * length
       */
      if(strlen($form->get("items/$field/post_value")) != $data->get('length')){
        $error = true;
      }
      /**
       * 
       */
      if($error){
        $form->set("items/$field/is_valid", false);
        $form->set("items/$field/errors/", $this->i18n->translateFromTheme('?label must be numeric and have a length of ?length!', array('?label' => $form->get("items/$field/label"), '?length' => $data->get('length'))));
      }
    }
    return $form->get();
  }
}