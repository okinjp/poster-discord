# poster-discord
POST "content" for discord webhook from GET request

## 動作要件
PHP5.3以上(実際の動作確認はPHP7以降のみ)

## 使い方
poster.phpをHTTPサーバー上でPHPが実行可能なディレクトリに任意の名前で設置してください
your-default-discord-webhook-urlを書き換えることで投稿先のwebhookを設定できます

### 例
http://example.com/poster.php?content=投稿内容(必須)&url=webhook-url(省略時は設定したアドレス)
これでGETリクエスト，つまりブラウザでページを開く処理と同じ処理でPOSTを使うDiscordのWebhookを扱えます．
