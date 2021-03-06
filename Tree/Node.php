<?php
/**
 * basic node interface
 */
namespace Circle\UtilityBundle\Tree;

use Circle\UtilityBundle\Interfaces\GenericType;
use Circle\UtilityBundle\Interfaces\Printable;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * describes a node for a tree with all needed
 * basic functions declared
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tree
 * @copyright	TeeAge-Beatz UG 2014
 */
interface Node extends GenericType, Printable {
	/**
	 *
	 * adds a child at position $key
	 *
	 * @param 	string										$key
	 * @param	Circle\UtilityBundle\Tree\Node					$node
	 * @return 	$this
	 */
	public function addChild($key, Node $node);
	
	/**
	 *
	 * returns the child of position $key and throws an exception
	 * if no child exists at the given index
	 *
	 * @param 	string										$key
	 * @throws	Circle\UtilityBundle\Exceptions\NoKeyException
	 * @return	Circle\UtilityBundle\Tree\Node
	 */
	public function getChild($key);
	
	/**
	 *
	 * checks if a child at position $key exists
	 *
	 * @param	string										$key
	 * @return	boolean
	 */
	public function hasChild($key);
	
	/**
	 * 
	 * returns the parent node
	 * 
	 * @return	Circle\UtilityBundle\Tree\Node
	 */
	public function getParent();
	
	/**
	 * 
	 * returns all childnodes of this node
	 * 
	 * @param	Doctrine\Common\Collections\ArrayCollection
	 * @return	Doctrine\Common\Collections\ArrayCollection
	 */
	public function getAllChildren(ArrayCollection $arrayCollection);
}