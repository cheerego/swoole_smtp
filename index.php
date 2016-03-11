<?php
/**
 * Created by PhpStorm.
 * User: placeless
 * Date: 16/3/11
 * Time: 下午4:20
 */

$client = new swoole_client(SWOOLE_SOCK_TCP);

$from = "xxxxxx@163.com";
$to = 'xxxx@qq.com';
$sqm = 'xxxx';
$content = 'asdasda';


if (!$client->connect('smtp.163.com', 25)) {
    exit("connect failed. Error: {$client->errCode}\n");
}
echo $client->recv(); //220

$client->send("HELO smtp.163.com\r\n");
echo $client->recv();//250

$client->send("AUTH LOGIN\r\n");//334
echo $client->recv();//334

$client->send(base64_encode($from)."\r\n");//开启smtp的网易邮箱
echo $client->recv();//334

$client->send(base64_encode($sqm)."\r\n");//网易邮箱授权码
echo $client->recv();//335

$client->send("MAIL FROM:<$from>\r\n");//
echo $client->recv();//250

$client->send("RCPT TO:<$to>\r\n");//目标邮箱
echo $client->recv();//250

$client->send("DATA\r\n");
echo $client->recv();//250
$subject ="From:$from\r\n";
$subject .= "To:$to\r\n";
$subject .="Subject:$content\r\n";
$client->send("$subject\r\n.\r\n");
echo $client->recv();//250
$client->send("QUIT\r\n");
echo $client->recv();
$client->close();


