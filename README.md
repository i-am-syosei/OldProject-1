# 2022C12(elements) トレンド掲示板

pythonのAPIであるpyTrendsからSQLDBへデータを格納し、
PHP上で表示する掲示板 http://xs227928.xsrv.jp/trends/main.php
|ディレクトリ|説明|
|----|----|
|trends|HPを構成するPHPが格納されている|
|trends/login|新規登録、ログイン機能|
|elements.sql|SQLのテーブルや詳細。pythonを起動してからデータを格納する。そのため、pythonを起動してからでないと動作を行うことができない。|
|pysql|GoogleトレンドをSQLDBへ格納する(日本語、アメリカ、インド)|
|run.sh|Server上でcronを動かすときに使用している|
|.htaccess|URL中の拡張子を隠す。|

##  確認事項  
###   Python
#####   サーバー上での実行環境はAnacondaを使用しています。python3.0での動作確認済み。

## 使用API
#### pytrends:         https://pypi.org/project/pytrends/
#### pandas:           https://pandas.pydata.org/docs/reference/index.html
#### mysql-connector:  https://dev.mysql.com/doc/connector-python/en/
