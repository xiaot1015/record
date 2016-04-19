### 第四节 php mysql pdo 的基础知识，以及一些简单的优化原则
众所周知 mysql 只有innodb完美的支持事务，pdo扩展的优势就是能进行预编译和bindparam
至于代码就不在这里在写了。
pdo 的应用场景有限，在性能方面比直连差很多。

##mysql 的优化的基本原则

1， 尽量不使用连表查询
2， 如果使用join 小结果驱动大结果
3， 模糊查询不使用like ‘%%’ ，使用 name >= 'de' and name < 'df' (待实测)
4, limit 基数过大 建议使用between

另外对于mysql 优化常用的方式

explain sql

show profile for query 1 ; 帮助检查慢查询sql
show variables like '%slow%' ;
show variables like '%partition%' ; 查询分区
show variables like 'datadir'; 文件位置

## mysql 关于mysql 深入学习 查看以下链接。

