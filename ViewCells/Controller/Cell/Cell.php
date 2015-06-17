<?

/**
 * Class Cell
 *
 */
class Cell extends View {

	var $uses = [];

	/**
	 * Constructor
	 */
	public function __construct() {
		foreach ($this->uses as $use) {
			$this->{$use} = ClassRegistry::init($use);
		}
		parent::__construct();
	}

	public function element($name, $data = array(), $options = array()) {
		$this->display();
		return parent::element($name, $data, $options);
	}

	public function display() { }

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
