<?php

class Node{
  public $next;
  public $data;
  function Node($data = NULL , $next = NULL)
  {
    $this->next = $next;
    $this->data = $data;
  }
}

class LList{
  private $head = NULL;
  function LList()
  {
    $this->head = new Node();
  }
  function push($data)
  {
    $temp_node = new Node($data , $this->head);
    $this->head = $temp_node;
  }
  function pop()
  {
    $data = $this->head->data;
    $this->head = $this->head->next;
    return $data;
  }
  function print_list()
  {
    $cur = $this->head;
    while($cur)
    {
      echo "<p>{$cur->data}</p>";
      $cur = $cur->next;
    }
  }
}

$lst = new LList();
$lst->push(20);
$lst->push(13);
$lst->push(23);
$lst->push(2);
$lst->push(11);
$lst->print_list();
echo "<p>{$lst->pop()}</p>";
$lst->print_list();





 ?>
