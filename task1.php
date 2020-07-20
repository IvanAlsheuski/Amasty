<?php
class First
{
    public function getClassname() {
        echo "First\n"; 
        
    }
    public function getLetter() {
    	if(get_class($this) == 'First')
    	{
    		echo "A\n";
    	} 
    	else{
    		echo "B\n";
    	}
        
    }
}
class Second extends First
{
    public function getClassname() {
        echo "Second\n";
    }
}
$first = new First;
$first->getClassname();
$first->getLetter();

$cecond = new Second;
$cecond->getClassname();
$cecond->getLetter();

?>