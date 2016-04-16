<?PHP
trait hello{
    public function sayhello(){
        return "hello";
    }
}
trait world{
    public function sayworld(){
        return "world";
    }
}
class say{
    use hello,world;
    public function sayhelloworld(){
        echo $this->sayhello()."|".$this->sayworld();
    }
}
$obj = new say();
$obj->sayhelloworld();


exit;
class A{
    private $name = 'xiaotao';
    private $sex = 'man';
    public function __toString(){
        return $this->name ."|".$this->sex;
    }
    public function index(){
        $arr = array("name"=>'xiaotao','sex'=>1);
        $json = json_encode($arr);
        $person = json_decode($json);
        var_dump($person);
        echo $person;
    }
}
$obj = new A();
echo $obj ;
echo PHP_EOL;

