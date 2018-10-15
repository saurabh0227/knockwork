<?php

class RequiredSkillsModel {
    public $_skill;

    /**
     * Get the value of _skill
     */ 
    public function get_skill()
    {
        return $this->_skill;
    }

    /**
     * Set the value of _skill
     *
     * @return  self
     */ 
    public function set_skill($_skill)
    {
        $this->_skill = $_skill;

        return $this;
    }
}