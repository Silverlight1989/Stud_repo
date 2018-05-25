<?
abstract class Good{
	private $cost;
	
	public function setCost($cost){
		$this->cost=$cost
}
public function getCost(){
return $this->cost;	
}

abstract public function toCount();

public function finalCost(){
	return $this->toCount()*0.2;
}

class GoodDigital extends Good{
	
	public function toCount(){
		return $this->getCost*0.5;
	}
}


class GoodPiece extends Good{
public function toCount(){
	return $this->getCost;
	}
}	

class Good_By_Mass extends Good{
	
	private $mass;
	
	public function setMass($mass){
		$this->mass = $mass;
	}
	public function getMass(){
		return $this->mass;
	}
	
public function toCount(){
	return $this->getCost()* $this->getMass();
	}
}	?>