<?php

class PageLancerModel{
    public $page,$count,$total_count,$list;
    

    /**
     * Get the value of page
     */ 
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the value of page
     *
     * @return  self
     */ 
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get the value of count
     */ 
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the value of count
     *
     * @return  self
     */ 
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get the value of total_count
     */ 
    public function getTotal_count()
    {
        return $this->total_count;
    }

    /**
     * Set the value of total_count
     *
     * @return  self
     */ 
    public function setTotal_count($total_count)
    {
        $this->total_count = $total_count;

        return $this;
    }


    /**
     * Get the value of list
     */ 
    public function getList()
    {
        return $this->list;
    }

    /**
     * Set the value of list
     *
     * @return  self
     */ 
    public function setList($list)
    {
        $this->list = $list;

        return $this;
    }
}