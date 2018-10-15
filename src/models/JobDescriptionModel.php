<?php

    class JobDescriptionModel {
        public $jd_id,
               $jd_title,
               $jd_description,
               $jd_created_at,
               $jd_updated_at,
               $jd_duration,
               $jd_budget,
               $job_type,
               $quotes_count,
               $clientDetail,
               $category,
               $sub_category;

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
                * Get the value of jd_created_at
                */ 
               public function getJd_created_at()
               {
                              return $this->jd_created_at;
               }

               /**
                * Set the value of jd_created_at
                *
                * @return  self
                */ 
               public function setJd_created_at($jd_created_at)
               {
                              $this->jd_created_at = $jd_created_at;

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
                * Get the value of quotes_count
                */ 
               public function getQuotes_count()
               {
                              return $this->quotes_count;
               }

               /**
                * Set the value of quotes_count
                *
                * @return  self
                */ 
               public function setQuotes_count($quotes_count)
               {
                              $this->quotes_count = $quotes_count;

                              return $this;
               }

               /**
                * Get the value of clientDetail
                */ 
               public function getClientDetail()
               {
                              return $this->clientDetail;
               }

               /**
                * Set the value of clientDetail
                *
                * @return  self
                */ 
               public function setClientDetail($clientDetail)
               {
                              $this->clientDetail = $clientDetail;

                              return $this;
               }

               /**
                * Get the value of category
                */ 
               public function getCategory()
               {
                              return $this->category;
               }

               /**
                * Set the value of category
                *
                * @return  self
                */ 
               public function setCategory($category)
               {
                              $this->category = $category;

                              return $this;
               }

               /**
                * Get the value of sub_category
                */ 
               public function getSub_category()
               {
                              return $this->sub_category;
               }

               /**
                * Set the value of sub_category
                *
                * @return  self
                */ 
               public function setSub_category($sub_category)
               {
                              $this->sub_category = $sub_category;

                              return $this;
               }
    }