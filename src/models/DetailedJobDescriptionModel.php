<?php

class DetailedJobDescriptionModel {
    public $jd_id,
           $jd_title,
           $jd_updated_at,
           $quotes,
           $jd_duration,
           $jd_budget,
           $job_type,
           $jd_descriptions,
           $required_skills,
           $client_detail;

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
            * Get the value of quotes
            */ 
           public function getQuotes()
           {
                      return $this->quotes;
           }

           /**
            * Set the value of quotes
            *
            * @return  self
            */ 
           public function setQuotes($quotes)
           {
                      $this->quotes = $quotes;

                      return $this;
           }

           /**
            * Get the value of jd_duration
            */ 
           public function getJd_duration()
           {
                      return $this->jd_duration;
           }

           /**
            * Set the value of jd_duration
            *
            * @return  self
            */ 
           public function setJd_duration($jd_duration)
           {
                      $this->jd_duration = $jd_duration;

                      return $this;
           }

           /**
            * Get the value of jd_budget
            */ 
           public function getJd_budget()
           {
                      return $this->jd_budget;
           }

           /**
            * Set the value of jd_budget
            *
            * @return  self
            */ 
           public function setJd_budget($jd_budget)
           {
                      $this->jd_budget = $jd_budget;

                      return $this;
           }

           /**
            * Get the value of job_type
            */ 
           public function getJob_type()
           {
                      return $this->job_type;
           }

           /**
            * Set the value of job_type
            *
            * @return  self
            */ 
           public function setJob_type($job_type)
           {
                      $this->job_type = $job_type;

                      return $this;
           }

           /**
            * Get the value of jd_descriptions
            */ 
           public function getJd_descriptions()
           {
                      return $this->jd_descriptions;
           }

           /**
            * Set the value of jd_descriptions
            *
            * @return  self
            */ 
           public function setJd_descriptions($jd_descriptions)
           {
                      $this->jd_descriptions = $jd_descriptions;

                      return $this;
           }

           /**
            * Get the value of required_skills
            */ 
           public function getRequired_skills()
           {
                      return $this->required_skills;
           }

           /**
            * Set the value of required_skills
            *
            * @return  self
            */ 
           public function setRequired_skills($required_skills)
           {
                      $this->required_skills = $required_skills;

                      return $this;
           }

           /**
            * Get the value of client_detail
            */ 
           public function getClient_detail()
           {
                      return $this->client_detail;
           }

           /**
            * Set the value of client_detail
            *
            * @return  self
            */ 
           public function setClient_detail($client_detail)
           {
                      $this->client_detail = $client_detail;

                      return $this;
           }
}