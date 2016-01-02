<?php

class TaggedField extends TextField
{

    public function __construct($name, $title, $value, $maxLength = null, $form = null)
    {
        $this->addExtraClass('text jquery-tagit-hook chzn-container-multi');

        return parent::__construct($name, $title, $value, $maxLength, $form);
    }

    public function Field($properties = array())
    {
        $rules = Config::inst()->get('Director', 'rules');
        $admin = array_search('AdminRootController', $rules);

        Requirements::css(TAGGEDFIELD_DIR . '/thirdparty/tagit/jquery.tagit.css');
        Requirements::css($admin . '/thirdparty/chosen/chosen/chosen.css');
        Requirements::css(TAGGEDFIELD_DIR . '/css/jquery.tagit.ss.css');

        Requirements::javascript(TAGGEDFIELD_DIR . '/thirdparty/tagit/tag-it.min.js');
        Requirements::javascript(TAGGEDFIELD_DIR . '/javascript/TaggedField.js');

        return parent::Field($properties);
    }
}
