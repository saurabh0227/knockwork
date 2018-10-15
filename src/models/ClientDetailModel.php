<?php

class ClientDetailModel {
    public $client_id,
           $user_registration_id,
           $first_name,
           $last_name,
           $image_url,
           $address_id,
           $country,
           $spend;

    /**
     * Get the value of client_id
     */ 
    public function getClient_id()
    {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     *
     * @return  self
     */ 
    public function setClient_id($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

           /**
            * Get the value of user_registration_id
            */ 
           public function getUser_registration_id()
           {
                      return $this->user_registration_id;
           }

           /**
            * Set the value of user_registration_id
            *
            * @return  self
            */ 
           public function setUser_registration_id($user_registration_id)
           {
                      $this->user_registration_id = $user_registration_id;

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
            * Get the value of address_id
            */ 
           public function getAddress_id()
           {
                      return $this->address_id;
           }

           /**
            * Set the value of address_id
            *
            * @return  self
            */ 
           public function setAddress_id($address_id)
           {
                      $this->address_id = $address_id;

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
            * Get the value of spend
            */ 
           public function getSpend()
           {
                      return $this->spend;
           }

           /**
            * Set the value of spend
            *
            * @return  self
            */ 
           public function setSpend($spend)
           {
                      $this->spend = $spend;

                      return $this;
           }
}