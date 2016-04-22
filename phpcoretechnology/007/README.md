### redis 相关
想比较memcached 只是简单的k-v存储
redis 的功能更加强大。
1，redis 支持多种数据类型。 string   list（双端链表）  set （集合）  hash 等等  至于各自的特性，以及使用暂且不提
2，redis 支持对 list ，set， storted set 等进行sort 排序
3，redis 可以支持 multi 命令 来执行事务，  当接受 multi 命令之后  之后的操作 完成之后 需要 执行 exec 命令进行提交，才会执行对应的命令。
4， 数据持久化  内存快照： 将包括增量的数据一并写入磁盘，肯能会阻塞。   append-only-file（aof） 将每一次操作的命令记录到文件中，redis 的重启的时候读取aof保存的文件，以恢复数据。

任何nosql 都会涉及到占用大量内存的情况，redis 通过虚拟内存。将访问少的数据写到磁盘上，以减少占用内存。




