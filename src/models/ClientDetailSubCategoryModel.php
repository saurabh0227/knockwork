<?php
 
 class ClientDetailSubCategoryModel {
     public $sub_category_id,
            $sub_category_title,
            $sub_category_icon_url;


     /**
      * Get the value of sub_category_id
      */ 
     public function getSub_category_id()
     {
          return $this->sub_category_id;
     }

     /**
      * Set the value of sub_category_id
      *
      * @return  self
      */ 
     public function setSub_category_id($sub_category_id)
     {
          $this->sub_category_id = $sub_category_id;

          return $this;
     }

            /**
             * Get the value of sub_category_title
             */ 
            public function getSub_category_title()
            {
                        return $this->sub_category_title;
            }

            /**
             * Set the value of sub_category_title
             *
             * @return  self
             */ 
            public function setSub_category_title($sub_category_title)
            {
                        $this->sub_category_title = $sub_category_title;

                        return $this;
            }

            /**
             * Get the value of sub_category_icon_url
             */ 
            public function getSub_category_icon_url()
            {
                        return $this->sub_category_icon_url;
            }

            /**
             * Set the value of sub_category_icon_url
             *
             * @return  self
             */ 
            public function setSub_category_icon_url($sub_category_icon_url)
            {
                        $this->sub_category_icon_url = $sub_category_icon_url;

                        return $this;
            }
 }