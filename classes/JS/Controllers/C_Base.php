<?php
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы
	protected $needLogin;	// необходима ли авторизация
	protected $user;		// авторизованный пользователь || null

	//
	// Конструктор.
	//
	function __construct()
	{	
		$this->needLogin = false;
		$this->user = M_Users::Instance()->Get();
	}
	
	protected function before()
	{
		if($this->needLogin && $this->user === null)
			$this->redirect('/auth/login');
	
		$this->title = 'Название сайта';
		$this->content = '';
	}
	
	//
	// Генерация базового шаблонаы
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content);	
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}