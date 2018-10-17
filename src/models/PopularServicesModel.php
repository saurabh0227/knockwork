<?php

class PopularServicesModel {
    public $id,
           $title,
           $image_url;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

           /**
            * Get the value of title
            */ 
           public function getTitle()
           {
                      return $this->title;
           }

           /**
            * Set the value of title
            *
            * @return  self
            */ 
           public function setTitle($title)
           {
                      $this->title = $title;

                      return $this;
           }

           /**
            * Get the value of image_url
            */ 
           public function getImage_url()
           {
                      return $this->image_url;
           }

           /**
            * Set the value of image_url
            *
            * @return  self
            */ 
           public function setImage_url($image_url)
           {
                      $this->image_url = $image_url;

                      return $this;
           }
}