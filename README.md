# QUELCODE PHP+DB総合課題

## ディレクトリ解説

```
quelcode-php
├── html ....................... ドキュメントルート
├── mysql
│   ├── mysql .................. 起動すると作られる。データ永続化用
│   ├── mysqlvolume ............ mysqlコンテナにマウントされる。ホストとのファイル受け渡し用
│   ├── Dockerfile ............. mysqlコンテナのDockerファイル
│   ├── init.sql ............... 初回起動時に実行されるSQLファイル
│   └── my.cnf ................. mysqlコンテナの設定ファイル
├── php
│   ├── Dockerfile ............. phpコンテナのDockerファイル
│   └── php.ini ................ phpの設定ファイル
├── .gitignore
├── db-definition.xlsx.......... データベース定義書
├── docker-compose.yml.......... Docker-Composeの設定ファイル
└── README.md
```

## データベース接続情報
MySQL バージョン 5.7.x


### コンテナ内部から接続する場合
```
host:mysql
port:3306
user:test
password:test
dbname:test
```

### Macから接続する場合
```
host:localhost
port:13306
user:test
password:test
dbname:test
