

# トレンド掲示板

このプロジェクトは、Pythonの`pyTrends`を利用してGoogleトレンドのデータを取得し、SQLデータベースに格納する仕組みを提供します。格納されたデータはPHPを用いたウェブ掲示板上で表示・管理されます。

## 構成

### ディレクトリ構成
| ディレクトリ/ファイル | 説明 |
|----|----|
| `trends/` | ウェブサイトのPHPファイルを格納 |
| `trends/login/` | 新規登録・ログイン機能を提供 |
| `pysql/` | Pythonスクリプトを格納（Googleトレンドのデータを取得し、SQLデータベースに格納） |
| `elements.sql` | データベースのテーブル定義と詳細情報 |
| `run.sh` | 定期実行用のスクリプト（cronジョブで使用） |
| `.htaccess` | URLの拡張子を隠すための設定ファイル |
| `README.md` | 本プロジェクトの説明 |

## 動作環境

- **Python**: `Python 3.x` (Anaconda 環境推奨)
- **PHP**: `PHP 7.x 以上`
- **MySQL**: `MySQL 5.7 以上`

## セットアップ手順

1. 必要なPythonパッケージをインストール
    ```sh
    pip install pytrends pandas mysql-connector-python
    ```
2. `elements.sql` をMySQLにインポート
    ```sh
    mysql -u <username> -p <database_name> < elements.sql
    ```
3. 環境変数設定 (`trends/env.php`)
    ```php
    define('DB_HOST', 'ホスト名');
    define('DB_NAME', 'データベース名');
    define('DB_USER', 'ユーザー名');
    define('DB_PASS', 'パスワード');
    ```
4. Pythonスクリプトを実行（Googleトレンドデータを取得）
    ```sh
    ./run.sh
    ```
5. PHPサーバーを起動
    ```sh
    php -S localhost:8000 -t trends
    ```
6. `http://localhost:8000` にアクセスして動作確認

## 使用API

- **pyTrends**: [公式ドキュメント](https://pypi.org/project/pytrends/)
- **Pandas**: [リファレンス](https://pandas.pydata.org/docs/reference/index.html)
- **MySQL Connector**: [公式ドキュメント](https://dev.mysql.com/doc/connector-python/en/)
