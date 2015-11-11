<?

/**
 * Class TestCell
 */
class TestCell extends Cell {

	/**
	 * Return any settings for this cell which can be overridden by the controller or view
	 * @return array
	 */
	public function settings () {
		return [
			'title' => 'My Hardcoded Title',
			'data' => [
				'foo' => 'bar',
				'bar' => 'foo',
			],
		];
	}

	public function beforeRender() {
		$this->set('title', $this->settings['title']);
		$this->set('data', print_r($this->settings['data'], true));
	}
}
