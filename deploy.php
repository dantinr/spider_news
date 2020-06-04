<?php
    echo "自动上线";

    //通知服务器 自动上线  让服务器执行 git pull

    //让 php 执行shell 命令

    $cmd = 'cd /www/1906/wandu && git pull';
    $res = shell_exec($cmd);

    var_dump($res);
