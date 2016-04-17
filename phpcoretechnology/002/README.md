## 第二章 http协议 
http协议是经典的问答式的设计。我们在header 头中可以约定各种参数。 
介绍几个平时少用的head头。
content-range：影响的资源范围， 可以用来界定断点续传这样的功能
accetp-coding 约定编码格式。
也可以自定义一些报头。

header在爬虫和灌水类似的功能上有重要的作用。
常用的辅助工具有fiddler

tcp／udp   的区别
1，两种协议适配不同的硬件终端
2，tcp 流模式 稳定  如文本 程序 文件等
3，udp 在处理类似图像，声音等对可靠性要求没那么高的业务可以用udp
upd结构比较简单，tcp 要复杂一些
tcp 保证数据顺序
tcp 保证数据准确性


##socket 编程
一个比较好用的php socket 框架，php swoole
socket 的流程，服务端  第一创建， 第二绑定端口和ip  第三 监听端口， 第四 接受client端数据 第五 read client data 第六 处理或者返回结果
client 端 创建 链接  发送给服务端数据  获取服务端返回的结果  
发送数据  socket_write   接受数据 socket_read




