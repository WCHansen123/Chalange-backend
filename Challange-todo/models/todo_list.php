<?php


class todo_list
{
    private $name, $list_item;

    function __construct($name, $list_item)
    {
        $this->name = $name;
        $this->list_item = [$list_item];
    }


    function getName() {
        return $this->name;
    }

    function getList_item() {
        return $this->list_item;
    }
}