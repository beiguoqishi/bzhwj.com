#!/bin/sh
while true;do
 rsync -avP /home/lpt/admin.u2l.me/webroot/static/kindeditor/attached/image/* /home/lpt/bzhwj.com/static/kindeditor/attached/image/  
 echo "success\n";
 sleep 20
done
