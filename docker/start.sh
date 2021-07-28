#!/bin/bash
php-fpm
echo "cron starting…" && (cron) && : > /var/log/cron.log && tail -f /var/log/cron.log
