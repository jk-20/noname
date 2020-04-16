<?php 

class Paginate{


    public $current_page;
    public $item_per_page;
    public $item_total_count;


    public function __construct($current_page=1, $items_per_page=4, $item_total_count=0){

        $this->current_page =(int)$current_page;
        $this->items_per_page =(int)$items_per_page;
        $this->item_total_count =(int)$item_total_count;

    }


    public function next(){

        return $this->current_page + 1;
    }

    public function previous(){

        return $this->current_page - 1;
    }

}








?>