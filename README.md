# weibo

# 一个小的bug 看这里 https://segmentfault.com/a/1190000005811347

# 数据库操作命令  php artisan migrate

#出现以下错误
    解决语法错误  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes (SQL: alter table `users` add unique
    `users_email_unique`(`email`))
    看
    AppServiceProvider.php