<?php
/*
 * Circle\UtilityBundle provides a set of reusable php/symfony utilities
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
 * test case for exceptions
 */
namespace Circle\UtilityBundle\Tests\Container;

use Circle\UtilityBundle\Container\ImmutableContainer;
use Circle\UtilityBundle\Interfaces\Container;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Container
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Circle\UtilityBundle\Container\ImmutableContainer
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class ImmutableContainerTest extends \PHPUnit_Framework_TestCase {
	private function createOne(array $array = array()) {
		return new ImmutableContainer($array);
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::__construct
	 */	
	public function construct() {
		$this->assertInstanceOf("Circle\UtilityBundle\Container\ImmutableContainer", $this->createOne());
		return $this->createOne(array(
			"test"	=>	1,
			"test2"	=>	2.0,
			"test3"	=>	true,
			"test4"	=>	new \stdClass,
			"test5"	=>	array(),
			"test6"	=>	"test"
		));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::get
	 * @uses	Circle\UtilityBundle\Container\ImmutableContainer::has
	 * @depends	construct
	 */
	public function get(Container $container) {
		$this->assertEquals(1, $container->get("test"));
		$this->assertEquals(2.0, $container->get("test2"));
		$this->assertEquals(true, $container->get("test3"));
		$this->assertEquals(new \stdClass(), $container->get("test4"));
		$this->assertEquals(array(), $container->get("test5"));
		$this->assertEquals("test", $container->get("test6"));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::has
	 * @uses	Circle\UtilityBundle\Container\ImmutableContainer::get
	 * @uses	Circle\UtilityBundle\Traits\DebugPrinter
	 * @uses	Circle\UtilityBundle\Exceptions\NoKeyException
	 * @uses	Circle\UtilityBundle\Exceptions\Exceptions
	 * @depends	construct
	 * 
	 * @expectedException Circle\UtilityBundle\Exceptions\NoKeyException
	 */
	public function has(Container $container) {
		$container->get("test7");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::toArray
	 * @depends	construct
	 */
	public function toArray(Container $container) {
		$this->assertequals(array(
			"test"	=>	1,
			"test2"	=>	2.0,
			"test3"	=>	true,
			"test4"	=>	new \stdClass,
			"test5"	=>	array(),
			"test6"	=>	"test"
		), $container->toArray());
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::contains
	 * @depends	construct
	 */
	public function containsElement(Container $container) {
		$this->assertTrue($container->contains(2.0));
		$this->assertFalse($container->contains('doesNotContain'));
	}
}