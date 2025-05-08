Typecho-Vercel
----

让[Typecho](//github.com/typecho/typecho)运行在[Vercel](//vercel.com)平台上的项目。

## 当前版本 | Current Version

1.2.1, 基于typecho 1.2.1 (Jun 6, 2023) 稳定版，(PS. 让版本号统一吧，好记)

## 快速上手 | Quick Start

1. 点击本项目，fork到你自己的github账号下。建议fork成私有项目

2. 登陆vercel.com(记得关联自己的github)，点击[New Project](//vercel.com/new)，选中fork的项目，点击import

3. 在创建里点击 Environment Variables展开，设置以下变量 [<font color="#f00">PS: 如果没有，请直接跳过该步</font>]：

| 字段 | 值 | 说明 |
| --- | --- | --- |
|DRIVER|数据库连接类型|可选值： Pdo_Mysql / Pdo_Pgsql / Mysqli / Pgsql，默认：Pdo_Mysql|
|HOST|数据库地址|必填，数据库地址|
|DATABASE|数据库名|必填，数据库名称|
|USER|数据库用户名|必填，数据库用户名|
|PASSWORD|数据库密码|必填，数据库密码|
|PORT|数据库端口|可选，数据库端口，默认：3306|
|CHARSET|数据库编码|可选，数据库编码，默认：utf8bm4|
|TABLE_PREFIX|表前缀|可选，表前缀，默认：typecho_|
|ENGINE|数据库引擎|可选，数据库引擎，默认：InnoDB|

4. 点击 Deploy，进行部署，平台会自动部署

5. 部署完成后，点击查看，即可看到部署后的网站，但此时应该会显示503，Database Query Empty

6. 开始申请数据库，再设置变量，请参考下方的 [<font color="#FF0000">申请数据库</font>]

7. 这里建议绑定你自己的域名再进行下一步，具体请见下面 [<font color="#f00">绑定域名</font>] 一节

8. 手动访问 [https://你的域名/install.php]()，点击下一步，可以看到数据库的所有信息都填好啦，

9. 再下一步，填写管理员帐号密码和邮箱，再下一步，即可完成安装

10. 恭喜你，安装成功，enjoy it!

### 申请数据库 | Apply Database

  在vercel项目主页菜单上选择 Storage，官方可选的数据库有不少，但是建议选择 [Supabase](//Supabase.com)

  点击他右边的Create
    
  在弹窗中再右下角的“Accept and Create”
    
  然后会弹出 Create Database 窗口，在 Primary Region 中选择，因为vercel默认的函数区域是北美，这里可以默认 “Washington, D.C., USA (East)”
    
  然后选最下面的 free plan ( 0.5G内存 / 50K 月活 / 500 MB数据库容量 / 5GB带宽 / 1GB文件存储)，作为博客，非常够用

  点击contiune，再点create，稍等片刻，显示 “Database Created Successfully” 说明数据库创建成功

  此时界面上会显示你刚才创建的数据库，点击进去，会看到类似下面的内容

  ```env
    POSTGRES_URL="************"
    POSTGRES_PRISMA_URL="*******************"
    ...
  ```
    
  点击右边的 "Show secret"，只复制行一行，类似 

  ``` POSTGRES_URL="postgres://<用户名>:<密码>@<服务器地址>:<端口号>/postgres?sslmode=require&supa=base-pooler.x"```

  这里面，记住对应的值，然后访问supabase[创建数据库](https://supabase.com/dashboard/project/eermcakjytvtacsdfhld/database/schemas)，点击页面中的 ”Create a new table“，在弹出窗口填一个名字，我们随便起，叫 typecho 吧，然后右下角 create 即可

  这样，我们就可以得到数据库信息，如下：

  | key | value |
  | --- | --- |
  |DRIVER|Pdo_Pgsql|
  |HOST|服务器地址|
  |DATABASE|刚才起了名字，填 typecho|
  |USER|上一步的用户名|
  |PASSWORD|上一步的密码|
  |PORT|上一步的端口号，默认应该是6543|

  这些数据得到之后，到vercel的项目主页上面，点击Settings，然后点击Environment Variables，然后添加上这些数据，然后点击Save，就好了，可以用 "Add Another"，一次填写多个。

### 绑定域名 | Binding Domain

  因为vercel的子域名被墙了，所以你需要准备一个域名，绑定

  在项目主页上右边有 Domains 按钮，点击之后，在右边的输入框输入你的域名，然后点击 Add Domain

  然后在右边的输入框输入你的域名

  然后点击 Add Domain

  在域名管理中给域名添加记录，可以添加 A记录，也可以添加CNAME，建议添加CNAME，因为VERCEL会自动切换节点

  CNAME 记录的值是 came.verel-dns.com / A记录 的值是 76.76.21.21

  二选一即可，VERCEL验证过后会自动帮你申请证书

### 特别感谢 | Special Thanks

[https://typecho.org](https://typecho.org)

[https://vercel.com](https://vercel.com)]

## 许可 | License

<summary>MIT License</summary>

    


















