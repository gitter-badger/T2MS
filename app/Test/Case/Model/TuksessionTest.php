<?php
App::uses('Tuksession', 'Model');

/**
 * Tuksession Test Case
 *
 */
class TuksessionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tuksession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tuksession = ClassRegistry::init('Tuksession');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tuksession);

		parent::tearDown();
	}

}
