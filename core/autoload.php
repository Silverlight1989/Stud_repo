<?
spl_autoload_register(function($classname){
	
	$class_dir=[CORE_DIR, LIB_DIR, MODEL_DIR,CLASS_DIR];
	$s=false;
	foreach ($class_dir as value){
		$f=$value.$classname.'.php';
		if(file_exists($f)){
			$s=true;
			include_once $f;
		}
		}	
		if(!$s){
			echo 'Не найден'.$classname;
		}	
})?>