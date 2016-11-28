<?php
class HashNode{
    public $key;
    public $value;
    public $next;
    public function __construct($key,$value,$next = null){
        $this->key = $key;
        $this->value = $value;
        $this->next = $next;
    }
}
class HashTable{
    protected $bucket;
    protected $size = 8;
    public function __construct(){
        $this->bucket = new SplFixedArray($this->size);
    }
    private function hashfunc($key){
        $strlen = strlen($key);
        $hashval = 0;
        for($i = 0 ;$i<$strlen ;$i++){
            $hashval += ord($key{$i});
        }
        return $hashval % $this->size;
    }
    public function insert($key,$val){
        $idx = $this->hashfunc($key);
        if(isset($this->bucket[$idx])){
            $this->bucket[$idx] = new HashNode($key,$val,$this->bucket[$idx]);
        }else{
            $this->bucket[$idx] = new HashNode($key,$val);
        }
    }
    public function find($key){
        $idx = $this->hashfunc($key);
        $current = $this->bucket[$idx];
        while($current){
            if($current->key == $key){
                return $current->value;
            }
            $current = $current->next;
        }
        return null;
    }
}
$obj = new HashTable();
$obj->insert("key1","value1");
$obj->insert("key2","value3");
$obj->insert("key3","value3");
$obj->insert("key11","value3sssssssssssss");

$fh = fopen('a.dat','wb');
$bin = pack("a*LL","b111sfglsfg",123,412);
echo strlen($bin)."\n";
fwrite($fh,$bin,strlen($bin));
fclose($fh);
$fh1 = fopen('a.dat','r');
$data = fread($fh1,filesize('a.dat'));
$ret = unpack("a10name/Lage/Lage2",$data);
print_r($ret);
fclose($fh1);
