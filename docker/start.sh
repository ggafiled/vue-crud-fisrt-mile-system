#!/bin/bash
php-fpm
echo "cron starting…" && (cron) && : > /var/log/app/cron.log && tail -f /var/log/app/cron.log
