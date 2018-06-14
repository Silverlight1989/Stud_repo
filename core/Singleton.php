<?
trait Singleton
{
	private static $single=false;
	
	private function __construct()
	{
	}
	 private function __clone()      //запрещаем клонирование
    {
    }
    private function __wakeup()  //запрещаем восстановление ресурсов объекта
    {
    }
    public static function connect(){
        if(self::$single===false){      //если не создавали класс
            self::$single=new PDO('mysql:host='.SQL_SERVER.';port='.SQL_PORT.';dbname='.dbname,SQL_USER,SQL_PASS,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);   //то создаем
        }
        return self::$single;
    }
}
© 2018 GitHub, Inc.
}?>