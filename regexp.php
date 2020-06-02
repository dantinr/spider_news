<?php

    $user = 'root';
    $pass = '123456abc';
    $dbh = new PDO('mysql:host=localhost;dbname=news', $user, $pass);

    //提取页面数据


    for($i=0;$i<=10;$i++)
    {
        $file = 'news_html/'.$i.'.html';     // [0-10].html
        $content = file_get_contents($file);

        $pattern = '/<ul class="branch_list_ul paging">(.*)<\/ul>/Us';

        preg_match_all($pattern,$content,$matches);
        //echo '<pre>';print_r($matches);echo '</pre>';

        //匹配的结果
        $list = $matches[1][0];
        //echo $list;

        //$pattern = '/<a href="(.*)" >/U';
        $pattern = '/<a href="(.*)" >(.*)<\/a>/U';
        preg_match_all($pattern,$list,$matches2);
        //echo '<pre>';print_r($matches2);echo '</pre>';die;

        //获取新闻链接
        $news_links = $matches2[1];
        $new_title = $matches2[2];

        $base_url = 'http://www.bj.chinanews.com';
        foreach ($news_links as $k=>$v)
        {

            $link = $base_url.$v;
            //echo $new_title[$k] . "： ".$link;echo '</br>';
            $add_time = time();

            //中文转码
            //$title = $new_title[$k];
            $title = iconv('gb2312','UTF-8',$new_title[$k]);

            $sql = "insert into p_news (`title`,`link`,`add_time`) values ('{$title}','{$link}',$add_time)";
            echo $sql;echo "\n";
            $dbh->query($sql);
        }
    }





