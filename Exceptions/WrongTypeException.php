<?php
/*
 * Ci\UtilityBundle provides a set of reusable php/symfony utilities
 * (C) 2014 TeeAge-Beatz UG
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
 */

/**
 * thrown if an argument has the wrong type
 */
namespace Ci\UtilityBundle\Exceptions;

use Ci\UtilityBundle\Traits\DebugPrinter;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Exceptions
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 */
class WrongTypeException extends \Exception {
	use DebugPrinter;
	
	/**
	 * constructor
	 * 
	 * @param	string	$name
	 * @param	object	$param
	 * @param	string	$expected
	 */
	public function __construct($name, $param, $expected) {
		$this->message = "the parameter '\$".$name."(".$this->_toDebugString($param).")' is of type '".$this->_getType($param)."', ".$expected." expected!";
	}
}