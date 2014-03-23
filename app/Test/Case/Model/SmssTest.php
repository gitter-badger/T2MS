<?php
App::uses('Smss', 'Model');

/**
 * Smss Test Case
 *
 */
class SmssTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.smss'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Smss = ClassRegistry::init('Smss');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Smss);

		parent::tearDown();
	}

}
