<?php

class LancerSearchModel {
    public $f_id,
           $ur_id,
           $first_name,
           $last_name,
           $phone_no,
           $email_address,
           $image_url,
           $country,
           $description,
           $earning
           //$feedback
		   ;

    /**
     * Get the value of f_id
     */ 
    public function getF_id()
    {
        return $this->f_id;
    }

    /**
     * Set the value of f_id
     *
     * @return  self
     */ 
    public function setF_id($f_id)
    {
        $this->f_id = $f_id;

        return $this;
    }

           /**
            * Get the value of ur_id
            */ 
           public function getUr_id()
           {
                      return $this->ur_id;
           }

           /**
            * Set the value of ur_id
            *
            * @return  self
            */ 
           public function setUr_id($ur_id)
           {
                      $this->ur_id = $ur_id;

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
            * Get the value of phone_no
            */ 
           public function getPhone_no()
           {
                      return $this->phone_no;
           }

           /**
            * Set the value of phone_no
            *
            * @return  self
            */ 
           public function setPhone_no($phone_no)
           {
                      $this->phone_no = $phone_no;

                      return $this;
           }

           /**
            * Get the value of email_address
            */ 
           public function getEmail_address()
           {
                      return $this->email_address;
           }

           /**
            * Set the value of email_address
            *
            * @return  self
            */ 
           public function setEmail_address($email_address)
           {
                      $this->email_address = $email_address;

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
            * Get the value of earning
            */ 
           public function getEarning()
           {
                      return $this->earning;
           }

           /**
            * Set the value of earning
            *
            * @return  self
            */ 
           public function setEarning($earning)
           {
                      $this->earning = $earning;

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
}