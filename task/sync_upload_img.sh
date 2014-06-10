#!/bin/sh
while true;do
 rsync -avP /home/www/admin.u2l.me/webroot/static/kindeditor/attached/image/* /home/www/www.bzhwj.com/static/kindeditor/attached/image/  
 echo "success\n";
 sleep 20
done
