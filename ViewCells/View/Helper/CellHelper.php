<?
App::uses('Helper', 'View');
App::uses('Cell', 'ViewCells.Controller/Cell');

/**
 * Class CellHelper
 */
class CellHelper extends Helper {

	public function element($name, $data = [], $options = []) {
		$controller = $name.'Cell';
		list($plugin, $class) = pluginSplit($controller, true);
		$directory = explode('/', $controller);
		$class = array_pop($directory);
		$directory = implode('/', $directory);

		App::uses($class, $plugin.'Controller/Cell/'.$directory);
		/* @var Cell $cell */
		$cell = new $class();
		$cell->theme = $this->theme;

		if (!empty($this->_View->viewVars['CellOptions'][$name]))
			$options = Hash::merge($options, ['settings' => $this->_View->viewVars['CellOptions'][$name]]);

		return $cell->cell($name, $data, $options);
	}
}
