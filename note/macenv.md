### mac 环境搭建  软件安装
该文档中所有软件和命令都是基于max os 系统

#### 翻墙软件 xx-next 

#### brew 安装mac 软件
**brew 类似ubuntu 的apt-get 自动搜索软件库并且安装**

```bash```
ruby -e "$(curl -fsSL https://raw.github.com/mxcl/homebrew/go)"
```
在item 里面输入上面的命令 

通过brew 安装软件    
> brew install git
>  
> brew services start nginx 启动命令
> 
> brew install mysql  安装命令

brew 基本命令
> brew list           列出已安装的软件
> 
> brew update     更新brew
> 
> brew home       用浏览器打开brew的官方网站
> 
> brew info         显示软件信息
> 
> brew deps        显示包依赖

#### php + nginx + mysql 环境
安装完成软件之后 配置环境。
首先安装依赖

> brew tap homebrew/dupes
> brew tap josegonzalez/homebrew-php

安装php

> brew install php55 --with-imap --with-tidy --with-debug --with-mysql --with-fpm
> 

将php-fpm 加入开机启动

> mkdir -p ~/Library/LaunchAgents
cp /usr/local/opt/php54/homebrew.mxcl.php54.plist ~/Library/LaunchAgents/
launchctl load -w ~/Library/LaunchAgents/homebrew.mxcl.php54.plist

mac nginx 配置php时需要 将fastcgi_param 参数替换成$document_root

```bash```
location / {
              if (!-e $request_filename) {
                    rewrite  ^/admin.php(.*)$  /admin.php?s=$1  last;
                  break;
              }
              fastcgi_pass   127.0.0.1:9000;
              fastcgi_index  index.php;
              fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
              include        fastcgi_params;
}
```


```php```
function test(){
    $a = "hello world";
    echo $a;
}
```

#### chrome markdown 插件  markdown preview plus 
* 安装之后 需要在扩展管理里面勾选 允许访问url的选项 

```bash```
a=$1
echo $a
`ps aux | grep php`
if [ -f $a ];then
   `cp $a ./`
fi
```

#### 安装sublime text 3 和 markdown editing 插件
[sublime text 3](https://www.sublimetext.com/3)  点击下载

#### shell 文件转码命令
iconv -f gbk -t utf8 filename

dos2unix filename    



