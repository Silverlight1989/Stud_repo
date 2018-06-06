<?require_once "tests/BaseTest.php";
class CategoriesControllerTest extends BaseTest
public function testIndex($a)
 {$cc= new CategoriesController();
 $ccResult=$cc->index($a);{

$this->assertNotNull($ccResult);
$this->assertHasKey("subcategories", $ccResult);
$this->assertHasKey("goods", $ccResult);
}
public function providerCategoriesController(){
	return array (array (["id" => 0]),
				array (["id" => 1]),
				array (["id" => 2]),);
	}
 }?>