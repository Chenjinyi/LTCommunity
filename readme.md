# LTCommunity



![image1c09d4ee0d4ea0cc.png](https://sz.ali.ftc.red/ftc/2018/08/27/image1c09d4ee0d4ea0cc.png)

### 版本

	目前版本： 0.1.1  预览版



### 简介

	使用Laravel+Tabler框架开发搭建的社区网站



### 名字来源

	使用Laravel+Tabler框架开发搭建的社区网站



### 许可证

	请遵守 GPL3.0 



### 国际化

	暂不考虑



### 安装方法

#### 环境要求：

PHP> = 7.1.3
OpenSSL PHP扩展
PDO PHP扩展
Mbstring PHP扩展
Tokenizer PHP扩展
XML PHP扩展
Ctype PHP扩展
JSON PHP扩展
Composer

#### 安装教程：

~~~shell
//克隆存储库，到你的网站目录
git clone git@github.com:Chenjinyi/LTCommunity.git 
cd LTCommunity
//更改配置文件，复制.env.example 变成 .env 并编辑.env里面的信息
//.env配置可参考：https://www.jianshu.com/p/b80c0dc9ee0e
cp .env.example .env
vim .env
//安装扩展
composer install
//生成APP key（保证安全性）
php artisan key:generate
//运行数据库迁移
php artisan migrate

~~~

#### 最后请配置 URL 重写规则（伪静态）

Apache自带配置，请跳过这一步

下面以 Nginx 为例：

1. 找到你的 Nginx 站点配置文件（也就是你这个域名的 `server {}` 块）
2. 在 `server {}` 块中适当的地方添加如下规则：

```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```



#### 安装完成

 不出意外的话，你已经完成了 LTCommunity的安装。



### 更新

​        0.1.1 Laravel 更新到5.7

​	0.1.0 完成基础功能

		 添加文章编写，删除，发布

		 添加注册，登陆

		 添加个人主页

		 添加文章评论



### 问题反馈

	请提交Issue或发送邮件到 chenjinyi666@gmail.com



### 功能

用户系统		

- [x] 登陆
- [x] 注册
- [x] 更改用户名
- [x] 更改密码
- [x] 个人主页
- [ ] 找回密码
- [ ] 邮箱验证
- [ ] 手机验证

文章系统

- [x] 发布文章
- [x] 编辑文章
- [x] 删除文章

评论系统

- [x] 文章评论
- [ ] 文章点赞