### 第一章 面向对象思想的核心
# 保证程序的健壮行， 需要一些魔术方法来完成。 
# 魔术方法 __get __set
对象的属性一般都是私有的， 但是通过外部访问的时候需要通过__get __set 来处理
assert() 函数。当程序出现错误时终止执行。
__toString() 魔术方法 序列化输出，如果加入这个魔术方法，则可以在程序中echo一个对象 
```php
class person{
    private $name = "xiaot";
    private $sex = "man";
    function __toString(){
        return $this->name."|".$this->sex;

    }

}
$obj = new a();
echo $obj;
```
#php traints 关键字的用法。
```php
traints hello{
    public function sayhello(){
        return "hello";
    }
}
traints world{
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
```
###php 反射api
反射api 在php 中可以使用其他的方式代替， 如call_user_function() get_class() 等等函数
反射api 在java 中 应用广泛，一般可以通过反射api拿到一个类型的所有方法，和所有的属性。 这种情况下导致不安全的因素，
在php中应用不够广泛。 php的spl 中有使用反射api这种机制。

为什么c 和 c++ 中没有反射api 呢？


### 长链接和短链接
tcp链接也被称为3次握手和4次握手，请求一次后关闭这种情况为段链接。 请求之后 不关闭链接。持续保存则为常长链接。
