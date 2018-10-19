<?php

class SubCategoriesModel {
    public $sub_categories_id,
           $category_id,
           $sub_categories_title,
           $sub_categories_icon_url;

    /**
     * Get the value of sub_categories_id
     */ 
    public function getSub_categories_id()
    {
        return $this->sub_categories_id;
    }

    /**
     * Set the value of sub_categories_id
     *
     * @return  self
     */ 
    public function setSub_categories_id($sub_categories_id)
    {
        $this->sub_categories_id = $sub_categories_id;

        return $this;
    }

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
            * Get the value of sub_categories_title
            */ 
           public function getSub_categories_title()
           {
                      return $this->sub_categories_title;
           }

           /**
            * Set the value of sub_categories_title
            *
            * @return  self
            */ 
           public function setSub_categories_title($sub_categories_title)
           {
                      $this->sub_categories_title = $sub_categories_title;

                      return $this;
           }

           /**
            * Get the value of sub_categories_icon_url
            */ 
           public function getSub_categories_icon_url()
           {
                      return $this->sub_categories_icon_url;
           }

           /**
            * Set the value of sub_categories_icon_url
            *
            * @return  self
            */ 
           public function setSub_categories_icon_url($sub_categories_icon_url)
           {
                      $this->sub_categories_icon_url = $sub_categories_icon_url;

                      return $this;
           }
}