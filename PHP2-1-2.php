<?//Задание 5
class A {
	public function foo() {
		static $x = 0;
			echo ++$x;
}
}

$a1 = new A();
$a2 = new A();

$a1->foo();//1
$a2->foo();//12
$a1->foo();//123
$a2->foo();//1234 имеют место 4 последовательных вызова переменной $x внутри класса A

?>