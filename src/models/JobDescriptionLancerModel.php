<?php 

class JobDescriptionLancerModel {
    
    public $jd_id,
           $jd_title,
           $jd_price_type,
           $jd_price,
           $jd_description,
           $jd_updated_at,
           $jd_quotes,
           $jd_client;

    /**
     * Get the value of jd_id
     */ 
    public function getJd_id()
    {
        return $this->jd_id;
    }

    /**
     * Set the value of jd_id
     *
     * @return  self
     */ 
    public function setJd_id($jd_id)
    {
        $this->jd_id = $jd_id;

        return $this;
    }

           /**
            * Get the value of jd_title
            */ 
           public function getJd_title()
           {
                      return $this->jd_title;
           }

           /**
            * Set the value of jd_title
            *
            * @return  self
            */ 
           public function setJd_title($jd_title)
           {
                      $this->jd_title = $jd_title;

                      return $this;
           }

           /**
            * Get the value of jd_price
            */ 
           public function getJd_price()
           {
                      return $this->jd_price;
           }

           /**
            * Set the value of jd_price
            *
            * @return  self
            */ 
           public function setJd_price($jd_price)
           {
                      $this->jd_price = $jd_price;

                      return $this;
           }

           /**
            * Get the value of jd_description
            */ 
           public function getJd_description()
           {
                      return $this->jd_description;
           }

           /**
            * Set the value of jd_description
            *
            * @return  self
            */ 
           public function setJd_description($jd_description)
           {
                      $this->jd_description = $jd_description;

                      return $this;
           }

           /**
            * Get the value of jd_updated_at
            */ 
           public function getJd_updated_at()
           {
                      return $this->jd_updated_at;
           }

           /**
            * Set the value of jd_updated_at
            *
            * @return  self
            */ 
           public function setJd_updated_at($jd_updated_at)
           {
                      $this->jd_updated_at = $jd_updated_at;

                      return $this;
           }

           /**
            * Get the value of jd_quotes
            */ 
           public function getJd_quotes()
           {
                      return $this->jd_quotes;
           }

           /**
            * Set the value of jd_quotes
            *
            * @return  self
            */ 
           public function setJd_quotes($jd_quotes)
           {
                      $this->jd_quotes = $jd_quotes;

                      return $this;
           }

           /**
            * Get the value of jd_client
            */ 
           public function getJd_client()
           {
                      return $this->jd_client;
           }

           /**
            * Set the value of jd_client
            *
            * @return  self
            */ 
           public function setJd_client($jd_client)
           {
                      $this->jd_client = $jd_client;

                      return $this;
           }

           /**
            * Get the value of jd_price_type
            */ 
           public function getJd_price_type()
           {
                      return $this->jd_price_type;
           }

           /**
            * Set the value of jd_price_type
            *
            * @return  self
            */ 
           public function setJd_price_type($jd_price_type)
           {
                      $this->jd_price_type = $jd_price_type;

                      return $this;
           }
}