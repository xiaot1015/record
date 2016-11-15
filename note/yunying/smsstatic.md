###  短信统计
当前MIS中短信统计是从平台日志中拉取，平台短信日志统一存放在 远程 服务器上。文件目录在
> /home/xiaoju/data/sms/predator-agg/sfc 

* 拉取方式 通过expect 脚本

```bash```
#!/usr/bin/expect -f
set timeout 3
set year [lindex $argv 0]
set monty [lindex $argv 1]
set day [lindex $argv 2]
set localpath [lindex $argv 3]

#scp file 
spawn scp rd@ip:/home/sfc/f.log.$year$monty$day $localpath
expect "assword"
send "password\r\n"
sleep 2
interact
#send "exit\n"
```

拉倒本地之后再进行脚本解析

```bash```
#!/bin/sh
source ~/.bash_profile
path=`pwd`
localpath=$path'/smslog/'
if [ ! -d $localpath ];then
    `mkdir $localpath`
fi
#####################################################
####baiwu:1  guodu:2 zhuwang:3 anxinjie:4 maikade:5
#####################################################
year=$1
month=$2
day=$3
nowdate=$year$month$day
#nowdate=`date -d "-1 day" +%Y%m%d`
fall=$localpath'_mt.log.'$nowdate
fresult=$localpath'sms.'$nowdate'.csv'
falljobid=$localpath'falljobid.log'
fnojobid=$localpath'nojobid.log.'$nowdate
### record total number 
ftotal=$localpath'smstotal.'$nowdate'.csv'

> $fresult
> $falljobid
> $fnojobid
> $ftotal

###  total count  ###
`awk -F '\\\|\\\|' '{if(NF>10){print $9}}' $fall > $falljobid`
guodunum=0
baiwunum=0
zhuwangnum=0
maikadenum=0
anxinjienum=0
yewunum=`awk -F '\\\|\\\|' '{if($2=="100600007"){print $0}}' $fall | wc -l`
yewuchaifen=`awk -F '\\\|\\\|' '{if($2=="100600007" && length($5) > 70){print $0}}' $fall | wc -l`
yingxiaonum=`awk -F '\\\|\\\|' '{if($2=="300900006"){print $0}}' $fall | wc -l`
yingxiaochaifen=`awk -F '\\\|\\\|' '{if($2=="300900006" && length($5) > 70){print $0}}' $fall | wc -l`

guoduchaifen=0
echo 'guoduchaifen:'$guoduchaifen
baiwuchaifen=0
echo 'baiwuchaifen:'$baiwuchaifen
zhuwangchaifen=0
echo 'zhuwangchaifen:'$zhuwangchaifen
anxinjiechaifen=0
echo 'anxinjiechaifen:'$anxinjiechaifen
maikadechaifen=0
echo 'maikadechaifen:'$maikadechaifen

`echo $anxinjienum','$anxinjiechaifen','$baiwunum','$baiwuchaifen','$guodunum','$guoduchaifen','$maikadenum','$maikadechaifen','$zhuwangnum','$zhuwangchaifen','$yewunum','$yewuchaifen','$yingxiaonum','$yingxiaochaifen > $ftotal`
### guodu ###
for line in ` cat $falljobid | sort | uniq`
do
   echo $line
   anum=`awk -F '\\\|\\\|' '{if($9=='$line' && $5==""){print $5}}' $fall | wc -l`
   #if [[ $anum -gt 0 ]];then
   `echo $anum','$line',1,0' >> $fresult `
  # fi
  # if [[ $anum -gt 0 ]];then
   anum=`awk -F '\\\|\\\|' '{if($9=='$line' && $5!=""){print $5}}' $fall | wc -l`
   `echo $anum','$line',0,0' >> $fresult `
  # fi
   if [[ $line -lt 1 ]];then
       `awk -F '\\\|\\\|' '{if($9=='$line' ){print $9,$5}}' $fall >> $fnojobid `
   fi
done
```

解析出来的日志存在csv里面再有脚本导入库。

#### 当前存在的问题
1, 日志文件过大或者过多时，在拉取时会存在丢失的可能。通过脚本执行拉取时会中断，手动执行命令没有问题。
  【解决办法】 使用xiaoju账户，拉取和解析分开。
2, 短信日志缺少对应的统计字段(JOBID)
* 业务短信传入的jobid因为服务的原因没有被记录下来，导致统计数据无法细分。
* 运营短信在使用jobid时因传的太长而丢失
  【解决办法】 推动查出api短信sdk解决jobid丢失问题。修复运营短信jobid过长问题。








