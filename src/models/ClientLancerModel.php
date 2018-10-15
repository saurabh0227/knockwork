<?php
class ClientLancerModel{
    public $first_name,$last_name,$country,$total_spend,$feedback;

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
     * Get the value of total_spend
     */ 
    public function getTotal_spend()
    {
        return $this->total_spend;
    }

    /**
     * Set the value of total_spend
     *
     * @return  self
     */ 
    public function setTotal_spend($total_spend)
    {
        $this->total_spend = $total_spend;

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