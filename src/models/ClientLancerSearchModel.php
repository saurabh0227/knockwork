<?php

class ClientLancerSearchModel {
    public $id,
           $first_name,
           $last_name,
           $country,
           $image_url,
           $earn,
           $feedback,
           $description;

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
            * Get the value of first_name
            */ 
           public function getFirst_name()
           {
                      return $this->first_name;
           }

           /**
            * Set the value of first_name
            *
            * @return  self
            */ 
           public function setFirst_name($first_name)
           {
                      $this->first_name = $first_name;

                      return $this;
           }

           /**
            * Get the value of last_name
            */ 
           public function getLast_name()
           {
                      return $this->last_name;
           }

           /**
            * Set the value of last_name
            *
            * @return  self
            */ 
           public function setLast_name($last_name)
           {
                      $this->last_name = $last_name;

                      return $this;
           }

           /**
            * Get the value of country
            */ 
           public function getCountry()
           {
                      return $this->country;
           }

           /**
            * Set the value of country
            *
            * @return  self
            */ 
           public function setCountry($country)
           {
                      $this->country = $country;

                      return $this;
           }

           /**
            * Get the value of earn
            */ 
           public function getEarn()
           {
                      return $this->earn;
           }

           /**
            * Set the value of earn
            *
            * @return  self
            */ 
           public function setEarn($earn)
           {
                      $this->earn = $earn;

                      return $this;
           }

           /**
            * Get the value of feedback
            */ 
           public function getFeedback()
           {
                      return $this->feedback;
           }

           /**
            * Set the value of feedback
            *
            * @return  self
            */ 
           public function setFeedback($feedback)
           {
                      $this->feedback = $feedback;

                      return $this;
           }

           /**
            * Get the value of description
            */ 
           public function getDescription()
           {
                      return $this->description;
           }

           /**
            * Set the value of description
            *
            * @return  self
            */ 
           public function setDescription($description)
           {
                      $this->description = $description;

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