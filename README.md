# swoole_smtp
基于Swoole和SMTP协议的邮件发送PHP代码
主要思路：
  > 需要安装swoole扩展
  > 创建一个同步的swoole的TCP客户端
  > 网易邮箱开起SMTP服务并获得授权码
  > 用户名和密码需要通过base64处理
  
  通过这段代码掌握smtp协议和socket，该段代码可已在cli网页都可以运行。
