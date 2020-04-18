# phpBB 3.3 微信分享

## Description

本项目调用微信JSSDK实现微信分享的网址和图片设置，基于微信本身的限制：

- 分享没办法自动触发，需要用户在微信中自行点击分享按钮才有效
- 你需要自行提供服务器API完成分享链接的签名

目前测试过的版本只有phpBBv3.3

## 安装

Clone into phpBB/ext/sharepai/oss:

    git clone https://github.com/snaill/phpbb-extension-share.git phpBB/ext/sharepai/share

Go to "ACP" > "Customise" > "Extensions" and enable the "Wechat Share" extension.

## 特别说明

本项目基于[_Vinny_](https://github.com/vinny)的[vinny/shareOn](https://github.com/vinny/share-on/)扩展v2.0.1修改而成。

## License

[GPLv3](LICENSE)