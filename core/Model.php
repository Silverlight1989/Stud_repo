<?
abstract class Model{
	//базовый класс модели
	protected $data;
	public function __construct(){
		include_once CONFIG_DIR . 'default.php';
		$this-> data = $data;
		}
	protected function adminData(){
		include_once CONFIG_DIR . 'admin.php';
		$this-> data['basket_view'] = false;
		$this-> data['admin']=$admin;
		}
	}?>