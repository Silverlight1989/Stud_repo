<?php
//
// Конттроллер страницы чтения.
//

class C_Auth extends C_Base
{
	//
	// Конструктор.
	//
	public function __construct(){
		parent::__construct();
	}
	
	public function before(){
		parent::before();
	}
	
	public function action_login(){
		$this->title .= '::Авторизация';
		$mUsers = M_Users::Instance();
		$mUsers->Logout();
		
		if($this->isPost())
		{
			if($mUsers->Login($_POST['login'], $_POST['password'], isset($_POST['remember'])))
				$this->redirect('/');
		}
		$this->content = $this->Template('v/v_login.php');	
	}
}