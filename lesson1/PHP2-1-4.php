
<?//задание 6
class A {
    public function foo() {
        static $x = 0;
			echo ++$x;
    }
}
class B extends A {
}
	$a1 = new A;
	$b1 = new B;
	$a1->foo(); //1, первый вывод увеличенного значения x внутри класса a 
	$b1->foo(); //11, первый вывод увеличенного значения x внутри класса b
	$a1->foo();//112,  второй вывод увеличенного значения x внутри класса a  
	$b1->foo();//1122,  второй вывод увеличенного значения x внутри класса b 
?>	