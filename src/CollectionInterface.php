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

interface CollectionInterface extends \ArrayAccess, \Countable, \IteratorAggregate 
{
    public function set($key, $value);

    public function get($key, $default = null);

    public function replace(array $parameters = array());

    public function add($parameters = null);

    public function all();

    public function has($key);

    public function remove($key);

    public function clear();

    public function keys();

}
