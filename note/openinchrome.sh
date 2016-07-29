#!/bin/bash
fpath=$1
if [ -f $fpath ];then
    `open -a /Applications/Google\ Chrome.app/ $fpath`
fi
echo "done\n"
