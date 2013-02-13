#!/bin/bash
i=0
#/usr/bin/php /var/www/bcci/cron/live.php
while [ $i -lt 2 ]; do
 #/usr/bin/php /var/www/bcci/cron/result.php
 #/usr/bin/php /var/www/bcci/cron/live.php
 sleep 30
  i=$(( i + 1 ))
done
