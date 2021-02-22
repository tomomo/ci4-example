# CI4-Example

[CodeIgniter4](https://www.codeigniter.com/)を勉強しながらサンプルをたくさん作っておくプロジェクト

## 初期設定
```sh
composer install
docker exec -it ci4-example_apache-php74 php spark migrate --all
```
### ファイルアップロード機能
http://localhost/examples/fileupload

指定したファイルを`writable/uploads`へアップロードする。

### お知らせを作成する機能
http://localhost/infrmations

よくあるお知らせ編集機能
