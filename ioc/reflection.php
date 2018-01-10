<?php
class B {

}
class A {
	public $a = null;
	public function __construct($str = '',B $b){
	
	}

	public function get($prop = ''){
		if(isset($this->$prop)){
			return $this->$prop;
		}else{
			return null;
		}
	}
}
//$a = new A();

$ref_class = new ReflectionClass('A');

echo $ref_class->getName() . "\n";
$ref_class_method = $ref_class->getMethod('__construct');
$params = $ref_class_method->getParameters();
foreach($params as $key => $value){
	echo $key . '-->' . $value->getClass() . "\n";
}

