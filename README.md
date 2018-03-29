## 安装步骤

### step0 下载composer.phar
```
wget https://raw.githubusercontent.com/composer/getcomposer.org/1b137f8bf6db3e79a38a5bc45324414a6b1f9df2/web/installer -O - -q | php -- --quiet
```

### step1 安装vendor拓展文件
在运行此命令前，需先在github获取[*Personal access tokens*](https://github.com/settings/tokens)
```
php composer.phar config --global github-oauth.github.com <TOKEN>
php composer.phar update
```
### step2 检查环境是否支持yii2框架
需在环境变量中添加php安装路径
```
php requirements.php
```
### step3 初始化环境
```
php init
```
### step4 数据迁移(migrate)
需先配置数据库信息 *common/config/main-local.php*
```
php yii migrate
```
### step5 生产环境优化自动加载
```cmd
php composer.phar dump-autoload --optimize
```