<?php
/**
 * Field query
 *
 * @uses Elastica_Query_Abstract
 * @category Xodoa
 * @package Elastica
 * @author Nicolas Ruflin <spam@ruflin.com>
 * @link http://www.elasticsearch.com/docs/elasticsearch/rest_api/query_dsl/field_query/
 */
class Elastica_Query_Field extends Elastica_Query_Abstract
{
	protected $_field = '';
	protected $_queryString = '';

	/**
	 * Creates field query object. Calls setField and setQuery with argument
	 *
	 * @param string $field OPTIONAL field for object
	 * @param string $queryString OPTIONAL Query string for object
	 */
	public function __construct($field = '', $queryString = '') {
		$this->setField($field);
		$this->setQueryString($queryString);
	}

	/**
	 * Sets the field
	 *
	 * @param string $field Field
	 * @return Elastica_Query_Field Current object
	 */
	public function setField($field) {
		$this->_field = $field;
		return $this;
	}

	/**
	 * Sets a new query string for the object
	 *
	 * @param string $queryString Query string
	 * @return Elastica_Query_Field Current object
	 */
	public function setQueryString($queryString) {
		if (!is_string($queryString)) {
			throw new Elastica_Exception_Invalid('Parameter has to be a string');
		}

		$this->_queryString = $queryString;
		return $this;
	}

	/**
	 * Converts query to array
	 *
	 * @return array Query array
	 * @see Elastica_Query_Abstract::toArray()
	 */
	public function toArray() {
		return array(
			'field' => array(
				$this->_field => array(
					'query' => $this->_queryString
				)
			)
		);
	}
}
