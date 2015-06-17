<?
App::uses('Helper', 'View');
App::uses('Cell', 'ViewCells.Controller/Cell');

/**
 * Class CellHelper
 */
class CellHelper extends Helper {

	public function element($name, $data = array()) {
		$class = $name.'Cell';
		list($plugin, $class) = pluginSplit($class, true);

		App::uses($class, $plugin.'Controller/Cell');
		if (App::load($class)) {
			$namespace = explode('/', $class);
			$class = array_pop($namespace);
			/* @var Cell $cell */
			$cell = new $class();
			return $cell->element($name, $data);
		}
		throw new Exception('Cell('.$name.') not found!');
	}
}
