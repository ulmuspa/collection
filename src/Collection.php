<?php
/*
 * This file is part of Ulmuspa.
 *
 * Copyright (c) 2018-2019 Ulmus Pumila
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ulmuspa;

use ArrayIterator;

/**
 * Collection is a container for key/value pairs.
 */

class Collection implements CollectionInterface
{

    /**
     * The storage of collection 
     *
     * @var array 
     */

    protected $items = []; 


    /**
     * Constructor 
     *
     * @access public 
     * @param  array  $items 
     * @return void 
     */

    public function __construct(array $items = [])
    {
        $this->replace($items);
    }

    /**
     * Sets collection item 
     *
     * @access public 
     * @param  string  $key 
     * @param  mixed   $value 
     * @return void 
     */

    public function set($key, $value)
    {
        $this->items[$key] = $value instanceof CollectionInterface ? $value->all() : $value; 
    }

    /**
     * Returns a item by key 
     *
     * @access public 
     * @param  string $key 
     * @param  mixed  $default The default value if the item key does not exist
     * @return mixed 
     */

    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : $default; 
    }

    /**
     * Returns the items 
     *
     * @access public 
     * @param  void 
     * @return array 
     */

    public function all()
    {
        return $this->items;
    }


    /**
     * Returns the collection keys 
     *
     * @access public 
     * @param  void 
     * @return array 
     */

    public function keys()
    {
        return array_keys($this->items);    
    }

    /**
     * Replaces the current items by a new set 
     *
     * @access public 
     * @param  array  $items 
     * @return void 
     */ 

    public function replace(array $items = [])
    {
        foreach($items as $key => $value){
            $this->set($key, $value);
        }
    }

    /**
     * Adds items 
     *
     * @access public 
     * @param  mixed $items 
     * @return void 
     */

    public function add($items = null) 
    {
	if($items instanceof CollectionInterface){
        	$this->items = array_replace($this->items, $items->all()); 

 	}elseif(is_array($items)){
        	$this->items = array_replace($this->items, $items); 
	}
    }

    /**
     * Returns true if the item is defined 
     *
     * @access public 
     * @param  string $key 
     * @return boolean 
     */

    public function has($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Removes a item 
     *
     * @access public 
     * @param  string $key 
     * @return void 
     */

    public function remove($key)
    {
        unset($this->items[$key]); 
    }


    /**
     * Returns the items number of collection 
     *
     * @access public 
     * @param  void 
     * @return int 
     */

    public function count()
    {
        return count($this->items);
    }

    /**
     * Returns an iterator of collection 
     *
     * @access public 
     * @param  void 
     * @return ArrayIterator
     */

    public function getIterator()
    {
        return new ArrayIterator($this->items); 
    }

    /**
     * Remove all items from the collection 
     *
     * @access public 
     * @param  void 
     * @return void 
     */

    public function clear()
    {
        $this->items = [];
    }

    /**
     * Returns true if the collection have a given key 
     *
     * @access public 
     * @param  string $key 
     * @return boolean 
     */

    public function offsetExists($key)
    {
        return $this->has($key);
    }

    /**
     * Returns a item by key 
     *
     * @access public 
     * @param  sting $key 
     * @return mixed 
     */

    public function offsetGet($key)
    {
        return $this->get($key); 
    }


    /**
     * Set collection item 
     *
     * @access public 
     * @param  string  $key 
     * @param  mixed   $value 
     * @return void 
     */ 

    public function offsetSet($key, $value)
    {
        $this->set($key, $value); 
    }

    /**
     * Removes a item from the collection 
     *
     * @access public 
     * @param  string $key 
     * @return void 
     */

    public function offsetUnset($key)
    {
        $this->remove($key);
    }
}
