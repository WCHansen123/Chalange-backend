<?php

class list_item
{
    private $content;
    private $status;
    private $date_time;

    function __construct($content, $status, $date_time)
    {
        $this->content = $content;
        $this->status = $status;
        $this->date_time = $date_time;
    }


    function getContent() {
        return $this->content;
    }

    function getStatus() {
        return $this->status;
    }

    function getDate_time() {
        return $this->date_time;
    }

}