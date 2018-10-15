<?php

class ClientDetailCategoryModel {
    public $category_id,
           $category_title,
           $category_icon_url,
           $category_description;

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

           /**
            * Get the value of category_title
            */ 
           public function getCategory_title()
           {
                      return $this->category_title;
           }

           /**
            * Set the value of category_title
            *
            * @return  self
            */ 
           public function setCategory_title($category_title)
           {
                      $this->category_title = $category_title;

                      return $this;
           }

           /**
            * Get the value of category_description
            */ 
           public function getCategory_description()
           {
                      return $this->category_description;
           }

           /**
            * Set the value of category_description
            *
            * @return  self
            */ 
           public function setCategory_description($category_description)
           {
                      $this->category_description = $category_description;

                      return $this;
           }

           /**
            * Get the value of category_icon_url
            */ 
           public function getCategory_icon_url()
           {
                      return $this->category_icon_url;
           }

           /**
            * Set the value of category_icon_url
            *
            * @return  self
            */ 
           public function setCategory_icon_url($category_icon_url)
           {
                      $this->category_icon_url = $category_icon_url;

                      return $this;
           }
}