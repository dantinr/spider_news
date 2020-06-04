<?php

    $redis = new Redis();
    $redis->connect('127.0.0.1');
    $redis->auth('123456abc');  //使用密码连接 redis


    $key = 'miaosha:1234';              //秒杀商品
    $users_set = 'miaosha_users';       //参与过秒杀的用户集合
    $number = $redis->get($key);        //检查库存

    //商品库存不足 ，提示活动结束
    if($number<1)
    {
        $response = [
            'errno' => 4005,
            'msg'   => "活动结束"
        ];

        die(json_encode($response));
    }


    //判断用户是否已参与过  根据uid判断  可根据 cookie  或 session 相关的用户信息获取
    $uid = 8888;
    $status = $redis->sIsMember($users_set,$uid);       //检查用户是否已参与过活动

    if($status)
    {
        $response = [
            'errno' => 4003,
            'msg'   => "已参与活动，请把机会留给别人"
        ];

        die(json_encode($response));
    }



    //减库存
    $redis->decr($key);     //库存 -1

    //记录 用户，防止重复秒杀
    $redis->sAdd($users_set,$uid);          //将用户加入Redis集合中记录

    $response = [
        'errno' => 0,
        'msg'   => '参与秒杀成功，请尽快支付'
    ];


    die(json_encode($response));