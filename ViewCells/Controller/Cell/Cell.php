<?

/**
 * Class Cell
 *
 */
class Cell extends View {

	var $uses = [];
	var $settings = [];

	/**
	 * Constructor
	 */
	public function __construct(Controller $controller = null) {
		foreach ($this->uses as $use) {
			$this->{$use} = ClassRegistry::init($use);
		}
		parent::__construct($controller);
	}

	public function element($name, $data = array(), $options = array()) {
		$this->settings = Hash::merge($this->settings(), (array)Hash::get($options, 'settings'));
		if (isset($this->settings['query']['joins'])) {
			$joins = [];
			foreach ($this->settings['query']['joins'] as $key => $value) {
				$joins[] = $value;
			}
			$this->settings['query']['joins'] = $joins;
		}

		$this->beforeRender();
		$this->set($this->settings);

		if ($this->view)
			$name = $this->view;

		return parent::element($name, $data, $options);
	}

	public function settings() { return []; }

	public function beforeRender() { }

	public function _getElementFileName($name) {
		list($plugin, $name) = $this->pluginSplit($name);

		$paths = $this->_paths($plugin);
		$exts = $this->_getExtensions();
		foreach ($exts as $ext) {
			foreach ($paths as $path) {
				if (file_exists($path . 'Cells' . DS . $name . $ext)) {
					return $path . 'Cells' . DS . $name . $ext;
				}
			}
		}
		return false;
	}
}
