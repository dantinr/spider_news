## 万度新闻爬虫

- spider.php 为爬虫
- regexp.php 为数据提取
- spider.php 与 regexp.php 均可在命令行模式中使用,可配合计划任务使用
- 数据库见 db.sql
- 计划任务 */3 * * * * cd /wwwroot/wandu &&  /usr/local/php/bin/php spider.php && /usr/local/php/bin/php regexp.php
## License
@copyleft 可随意修改代码及分发