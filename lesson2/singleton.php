<?trait Singleton{
	
	protected static $sample;
	public static function getSample(){
		if(static::$sample === null){
			self::$sample = new self;
	}
	return self::$sample;
}
private function __construct(){}
private function __clone(){}
private function __wakeup(){}
}
class MySingleton{
	use Singleton;
}?>