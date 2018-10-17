<?php

    class CategoriesModel {
        public $categories_id,
               $categories_title,
               $categories_image_url,
               $categories_description
               //$popularity_status
               ;

        /**
         * Get the value of categories_id
         */ 
        public function getCategories_id()
        {
                return $this->categories_id;
        }

        /**
         * Set the value of categories_id
         *
         * @return  self
         */ 
        public function setCategories_id($categories_id)
        {
                $this->categories_id = $categories_id;

                return $this;
        }

               /**
                * Get the value of categories_title
                */ 
               public function getCategories_title()
               {
                              return $this->categories_title;
               }

               /**
                * Set the value of categories_title
                *
                * @return  self
                */ 
               public function setCategories_title($categories_title)
               {
                              $this->categories_title = $categories_title;

                              return $this;
               }

               /**
                * Get the value of categories_image_url
                */ 
               public function getCategories_image_url()
               {
                              return $this->categories_image_url;
               }

               /**
                * Set the value of categories_image_url
                *
                * @return  self
                */ 
               public function setCategories_image_url($categories_image_url)
               {
                              $this->categories_image_url = $categories_image_url;

                              return $this;
               }

               /**
                * Get the value of categories_description
                */ 
               public function getCategories_description()
               {
                              return $this->categories_description;
               }

               /**
                * Set the value of categories_description
                *
                * @return  self
                */ 
               public function setCategories_description($categories_description)
               {
                              $this->categories_description = $categories_description;

                              return $this;
               }


               /**
                * Get the value of popularity_status
                */ 
               public function getPopularity_status()
               {
                              return $this->popularity_status;
               }

               /**
                * Set the value of popularity_status
                *
                * @return  self
                */ 
               public function setPopularity_status($popularity_status)
               {
                              $this->popularity_status = $popularity_status;

                              return $this;
               }
    }