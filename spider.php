<?php
    //运行计划任务

    $url_list = [
        'http://www.bj.chinanews.com/focus/1.html',
        'http://www.bj.chinanews.com/focus/2.html',
        'http://www.bj.chinanews.com/focus/3.html',
        'http://www.bj.chinanews.com/focus/4.html',
        'http://www.bj.chinanews.com/focus/5.html',
        'http://www.bj.chinanews.com/focus/6.html',
        'http://www.bj.chinanews.com/focus/7.html',
        'http://www.bj.chinanews.com/focus/8.html',
        'http://www.bj.chinanews.com/focus/9.html',
        'http://www.bj.chinanews.com/focus/10.html',
        'http://www.bj.chinanews.com/focus/11.html',
    ];

    foreach ($url_list as $k=>$v)
    {
        $html_content = file_get_contents($v);
        $file = 'news_html/'.$k.'.html';
        file_put_contents($file,$html_content);      //将内容保存在本地文件，减少网络请求
        echo $file. '抓取成功';echo "\n";
    }






