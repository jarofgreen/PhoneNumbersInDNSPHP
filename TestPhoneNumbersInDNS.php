<?php
/**
 * @license BSD License
 */

require 'PhoneNumbersInDNS.php';

class TestPhoneNumbersInDNS extends PHPUnit_Framework_TestCase {

	public function thingsThatShouldBeNullData() {
		return array(
			array('ouhteueu'),   // random rubbish
			array('v=spf1 a mx'), // a spf record
			array('v=phone1'), // phone1 with no numbers
			array('v=phone1 44'), // phone1 with no numbers
			array('v=phone1 ee'), // phone1 with no numbers
			array('v=phone1 ee 800345455'), // phone1 with no numbers
			array('v=phone1 44 80uu0345455'), // phone1 with no numbers,
			array('v=phone2'), // the future doesn't exist yet
		);
	}

	/**
	 * @dataProvider thingsThatShouldBeNullData()
	 */
	public function testThingsThatShouldBeNull($txt) {
		$this->assertNull(getPhoneNumberFromDNSTextString($txt));
	}


	public function thingsData() {
		return array(
			array('v=phone1 44 3700100222 BBC Scotland','44','3700100222','BBC Scotland'),
			array('v=phone1 44 3700100222 ','44','3700100222','3700100222'),
		);
	}

	/**
	 * @dataProvider thingsData()
	 */
	public function testThings($txt, $country, $number, $name) {
		$o = getPhoneNumberFromDNSTextString($txt);
		$this->assertFalse(is_null($o));
		$this->assertEquals($country, $o['country']);
		$this->assertEquals($number, $o['number']);
		$this->assertEquals($name, $o['name']);
	}

	
	
}
