<?php
/*
 * This file is part of the PommProject's ModelManager package.
 *
 * (c) 2014 - 2015 Grégoire HUBERT <hubert.greg@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PommProject\ModelManager\Model;

use PommProject\Foundation\ResultIterator;
use PommProject\ModelManager\Exception\ModelException;
use PommProject\ModelManager\Model\FlexibleEntity\FlexibleEntityInterface;

/**
 * CollectionIteratorInterface
 *
 * Iterator for query results.
 *
 * @package   ModelManager
 * @copyright 2014 - 2015 Grégoire HUBERT
 * @author    Grégoire HUBERT <hubert.greg@gmail.com>
 * @license   MIT/X11 {@link http://opensource.org/licenses/mit-license.php}
 */
interface CollectionIteratorInterface
{
    /**
     * get
     *
     * @see     ResultIterator
     * @return  FlexibleEntityInterface
     */
    public function get($index);

    /**
     * parseRow
     *
     * Convert values from Pg.
     *
     * @access  protected
     * @param   array          $values
     * @return  FlexibleEntityInterface
     * @see     ResultIterator
     */
    public function parseRow(array $values);

    /**
     * registerFilter
     *
     * Register a new callable filter. All filters MUST return an associative
     * array with field name as key.
     *
     * @access public
     * @param  callable   $callable the filter.
     * @return CollectionIterator $this
     * @throws ModelException
     */
    public function registerFilter($callable);

    /**
     * clearFilters
     *
     * Empty the filter stack.
     */
    public function clearFilters();

    /**
     * extract
     *
     * Return an array of entities extracted as arrays.
     *
     * @access public
     * @return array
     */
    public function extract();

    /**
     * slice
     *
     * see @ResultIterator
     *
     * @access public
     * @param  string   $name
     * @return array
     */
    public function slice($name);
}
