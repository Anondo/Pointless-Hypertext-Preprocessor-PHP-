<?php

class Node{
  public $data;
  public $right_child;
  public $left_child;
  function Node($data = NULL , $right_child = NULL , $left_child = NULL)
  {
    $this->data = $data;
    $this->$right_child = $right_child;
    $this->$left_child = $left_child;
  }
}
class Tree{
  private $root;
  function Tree()
  {
    $this->root = new Node();
  }
  function plant($data)
  {
    if($this->root->data == NULL)
       $this->root->data = $data;

    else
    {
      $parent = $this->root;
      $current = $parent;
      while(1)
      {

        if($parent->left_child == NULL || $parent->right_child == NULL)
        {
          $parent->left_child = new Node();
          $parent->right_child = new Node();
        }
        if($data < $current->data)
           $current = $parent->left_child;
        else
           $current = $parent->right_child;
        if($current->data == NULL)
        {
          $current->data = $data;
          break;
        }
        else
          $parent = $current;
      }
    }

  }
  function search($data)
  {
    $found = false;
    $cur =$this->root;
    while($cur->data != NULL)
    {
      echo "<p>Comparing with {$cur->data}</p>";
      if($data < $cur->data)
        $cur = $cur->left_child;
      else if($data > $cur->data)
        $cur = $cur->right_child;
      else if($data == $cur->data)
      {
        $found = true;
        break;
      }
    }
    if($found)
      echo "<p>Found</p>";
    else
      echo "<p>Not Found</p>";
  }
}

$bst = new Tree();
$bst->plant(20);
$bst->plant(10);
$bst->plant(100);
$bst->plant(50);
$bst->plant(16);
$bst->plant(5);
$bst->search(5);

 ?>
