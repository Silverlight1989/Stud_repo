<?
class Route
{
	static function start()
	{
		$controller_name = 'Main';
		$page_name = 'index';
		$id='';
		$routes= explode('/',$_SERVER['REQUEST_URI']);
		if (!empty($routes[1]
		{
			$controller_name = $routes[1];
		}//получили имя контроллера
		if ( !empty($routes[2]))
		{
			$page_name = $routes[2];
		}
		$model_name = strtolower('Model_'.$controller_name);
		//$action_name = 'action_'.$action_name;
		
		$controller = new $controller_name($model_name,$page_name,$id);
        $action = 'action_index';
        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            echo 'ошибка роутера';
        }
    }
    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
?>