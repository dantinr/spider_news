<?php

    $user = 'root';
    $pass = '123456abc';

    $dbh = new PDO('mysql:host=localhost;dbname=news', $user, $pass);


    $key_word = $_GET['wd'];        //搜索的关键词

    //$key_word = addslashes($_GET['wd']); //搜索的关键词  转义单引号 防止sql注入

    echo "您要搜索的关键词为: ".$key_word;echo '</br>';


    //去数据库中查找标题包含 关键词的 记录
    //$sql = 'select * from p_news where title like "% :key %"';
    $sql = 'select * from p_news where title like ?';       // ? : %关键词%


    // PDO预处理 防止SQL注入
    $stmt = $dbh->prepare($sql);
    //参数绑定
    $param = [
        '%'.$key_word.'%'
    ];
    $stmt->execute($param);
    $error = $stmt->errorInfo();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);   //
    $row_num = $stmt->rowCount();                          //

    //输出 结果
    echo '<hr>';
    echo "与 ".$key_word." 有关的新闻共 ". $row_num . "条";echo '</br>';
    echo "<ul>";
    foreach ($res as $k=>$v)
    {
        echo '<li><a target="_blank" href="'.$v['link'].'">'.$v['title'].'</a></li>';
    }
    echo "</ul>";
