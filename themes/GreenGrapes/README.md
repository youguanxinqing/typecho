# GreenGrapes

根据自己的喜好做的一些修改。这里感谢原作者**hongweipeng**。

现用于我的博客[有关心情](http://youguanxinqing.xyz)

024.5.13
- 修改“点赞”为“喜欢”

019.3.24
 - 修改头像、背景图片，整理文件目录

019.1.26
 - 修改去除`<br>`的js代码，由原生js改为jquery实现，并从header.php移到js/home.js文件中
 - 增加`post-article`的个数判断，避开其对点赞功能的影响

019.1.18
 - 修改主题样式，以加深灰色主题为主
 - 增加归档页面

019.1.8
 - 加深灰色主题中灰色的深度
 - 增加js，去除使用`<!-- more -->`时自动添加的`<br>`
 - 修改引用块（blockquote）的样式

019.1.7 
 - 增加点赞按钮 
 - 增加表格下边距（margin-bottom）,同时放弃在bootstrap.min.css中修改样式，转而在main.css中修改


-----
以下为原创作者说明（截止019.1.6）：

typecho 绿色主题

![image](https://github.com/hongweipeng/GreenGrapes/raw/master/screenshot.png)

预览：[https://www.hongweipeng.com](https://www.hongweipeng.com)

## 特点
* 头像设计，突出中间的图片，使你脱颖而出。
* header背景颗粒感突出。
* 支持自定义头像即测拉显示名称。
* 支持高分辨率视网膜屏幕，自适应手机及平板。
* 立体式标签云。

## 主题安装
1. 下载Typecho主题，得到一个文件夹
2. 整个文件夹上传至usr/themes/目录下,将文件夹命名为 `GreenGrapes` ，没改的话可能会是 `GreenGrapes-master` 或者 `GreenGrapes-v1.x` ，这都会导致主题无法找到
3. 登陆自己的博客后台，在“控制台”的下拉菜单中选择“外观”选项进入已安装主题列表
4. 在相应的主题点击“启用”即可使用

## Todo
- [x] 侧边栏项目可选是否显示
- [x] 主题配色扩充

## 适配插件
主题会判断插件是否存在，并合理的进行展示。插件不存在也不影响主题的使用。

- [Links](http://www.imhan.com/archives/typecho_links_20141214/) ：友情链接；
- [TeStat](https://github.com/hongweipeng/TeStat)：浏览数、点赞统计插件；

