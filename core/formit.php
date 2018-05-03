<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 25.04.2018
 * Time: 18:57
 */

// <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required />
// <textarea name="message" id="message" class="form-control" rows="6" cols="25" required="required" placeholder="Your message"></textarea>
/*
 * how to use it:
 * -------------------------------------------------------
 *      require_once ROOT_DIR.'/core/formit.php';
 *      $form = new formit();
 *
        $result = array('textDivs'=>'','textareaDiv'=>'');
        foreach ($formFactor as $item) {

            if (strcasecmp($item["type"],"textarea") == 0) {
                $item['htmlBefore']='<div class="form-group">';
                $item['htmlAfter']='</div>';
                $result["textareaDiv"] = sprintf("\t%s\n",$form->addInput($item));
                continue;
            } elseif (strcasecmp($item["type"],"text") == 0) {
                $result["textDivs"] .= sprintf("\t%s\n",$form->addInput($item));
            } elseif (strcasecmp($item["type"],"submit") == 0) {
                $result["act"] = $item["label"] ;
            } else { continue; }
        }
        $content = $this->view->render("contact", $result, true);
*/

class formit {

    // public $htmlBefore, $htmlAfter, $type, $classes, $name, $id, $placeholder, $required, $label, $value, $autofocus;
    const HTML_BEFORE = '<div class="form-group"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text"><span class="fa fa-user"></div></div>';
    const HTML_AFTER  = '</div></div>';

    public $htmlBefore, $htmlAfter, $type, $classes, $field_name, $css_id, $placeholder, $label, $value;
    public $stringTmpl,$result,$additionals;
    private $booleans = array('required','autofocus');
    private $propMap = array('placeholder'=>'label','css_id'=>'field_name');

    public function __construct() {
        $this->stringTmpl = '<%s%s class="%s" name="%s" id="%s" placeholder="%s"%s';
        //                     1 2         3         4       5                6  7
        /*
            1 - type of field[input|textarea]
            2 - any  additional text [rows,cols,autofocus, required]
            7 - closer tag
        */
        $this->StartStop = array(
            'textarea' => array(
                'start' => 'textarea', 'stop' => '></textarea>',
                'add' => 'rows="6" cols="25"'
            ),
            'text' => array(
                'start' => 'input type="text"', 'stop' => '/>'
            ),
        );

        $this->classes   = array();
        $this->required  = false;
        $this->autofocus = false;
        $this->additionals = "";
    }

    public function addInput(array $parameters) {
        // $type, $classes, $name, $css_id, $placeholder, $required, $label,
        if ( empty($parameters['type']) ) {
            return 'The type parameter is mandatory';
        } else {
            $this->setParameters($parameters);
            if (! $this->isTypeSupported()) {
                return 'Unsupported type: '.$this->type;
            }
        }

        $this->result = sprintf($this->stringTmpl,
            $this->getTag(),
            $this->additionals,
            implode(" ",$this->classes),
            $this->field_name,
            $this->css_id,
            $this->placeholder,
            $this->getTag('stop')
        );

    return sprintf("\n%s\n\t%s\n%s",$this->htmlBefore,$this->result,$this->htmlAfter);
    }

    private function getTag($tagType='start') {
        return $this->StartStop[ $this->type ][$tagType];
    }

    public function isTypeSupported($type='') {
        if(empty($type)) { $type = $this->type; }
        return array_key_exists($type, $this->StartStop);
    }

    private function getAdditionals() {
        if(!empty($this->StartStop[ $this->type ]['add']) ) {
            $this->additionals .= sprintf(" %s",$this->StartStop[ $this->type ]['add']);
        }
    }

    private function setParameters(array $params) {
        $this->additionals = "";
        foreach (array('type','field_name','css_id','placeholder','label') as $item) {
            $this->$item = $params[$item];
        }

        foreach ($this->propMap as $prop => $v) {
            if (empty($this->$prop)) { $this->$prop = $this->$v; }
        }
        $this->classes = explode(" ",$params["class"]);
        $this->htmlBefore = (empty($params["htmlBefore"])) ? formit::HTML_BEFORE : $params["htmlBefore"];
        $this->htmlAfter  = (empty($params["htmlAfter"]))  ? formit::HTML_AFTER  : $params["htmlAfter"];
        $this->handleBooleans($params);
        $this->getAdditionals();
    }

    private function handleBooleans(array $params) {
        foreach($this->booleans as $bool) {
//            if (!empty($params[$bool]) && $params[$bool] ) {
            if ( $params[$bool] ) {
                $this->additionals .= sprintf(" %s",$bool);
            }
        }
    }

}
