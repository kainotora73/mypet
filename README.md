<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## MyPET

ペットの餌の時間を記録するペット管理サイトです。
朝昼夜3食の時間をグラフで可視化することにより、ペットの生活習慣病の予防、改善に貢献できます。
レスポンシブ対応しているのでスマホからもご確認いただけます。


画像



## 使用技術

- [html]
- [css]
- - [bootstrap 4.6.0]
- [Laravel 8.47.0]
パッケージ
- [PHP 7.3.24]
- [MySQL 8.0]
- [jquery 3.6.0]
- [GCP]
- [Docker/Docker-compose]
- [Google chart API]


## 機能一覧
- [ユーザー登録、ログイン機能]
- - [ゲストログイン機能]
- - [パスワードリセット機能]
- [ペット登録]
- [時間記録機能(Ajax)]
- [チャート機能(Ajax)]

## 課題
今後実装を考えているのは、
家族で飼っているペットの餌の記録を家族内で共有できるようにすること。
今回作成した管理アプリケーションはユーザビリティを意識し、ボタン一つで記録〜蓄積されたデータをグラフで表示、というシンプルな作りになっております。
ペットの健康管理をさらに詳しく記録していきたい方向けに、年齢、体長、体重等の個体情報や、餌の種類、一日の体調の良し悪しを記録できるラジオボタンの実装をしたアプリケーションも開発して行きたいと考えております。
