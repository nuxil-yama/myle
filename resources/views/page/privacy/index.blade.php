@extends('layouts.common')

@section('title', '')
@section('keywords', '')
@section('description', '')

@section('pageCss')
<link href="{{url('static/assets/css/page/tokushoho.min.css')}}" rel="stylesheet">
<style>
    h1 {
        text-align: center;
    }
</style>
@endsection

@include('layouts.head')

@include('layouts.header')


@section('content')
<main>
    <div class="sec-terms-of-service">
        <div class="base">
            <h1 class="ttl-page center">
                プライバシーポリシー
            </h1>
            <div class="inner">
                <p>【１】プライバシーポリシーの適用範囲<br>
                    当プライバシーポリシーは、当サイトにおいて、弊社が個人より収集する個人情報の取り扱いに関して適用されます。</p>
                <p>【２】個人情報の定義<br>
                    プライバシーポリシーにおける個人情報とは、個人情報保護法に定める生存する個人情報であり、氏名、住所、電話番号等特定の個人を 識別可能なものをいいます。<br>
                    また、特定の個人と結びついて使用されるメールアドレス等の情報および、それらに付随するそのほか個人に関連する属性情報も含みます。</p>
                <p>【３】個人情報の取得<br>
                    弊社は、個人情報を取得する際には、必要な範囲で、適法かつ公正な手段によって取得いたします。<br>
                    弊社が個人より収集する個人情報は、当サイト内で弊 社が提供するサービス等によって異なります。<br>
                    サービスによっては、個人のメールアドレス、住所、氏名、電話番号等の情報や、年齢、性別、嗜好、興味等の統 計的な情報を収集する場合もあります。</p>
                <p>【４】個人情報の利用<br>
                    弊社が個人より収集した個人情報はおもに次の目的でし使用します。<br>
                    また、当サイトにおいて弊社が提供するサービス等をよりよいものとするために、これらの目的以外で、個人より同意を得た範囲内において個人情報を利用する場合があります。<br>
                    ・サービス内容の変更や開発<br>
                    ・メールマガジンの配信<br>
                    ・キャンペーン等のメールによる案内<br>
                    ・ダイレクトメールの送付<br>
                    ・当ウェブサイトの利用状況等の調査の実施、それらを利用した統計データの作成や開示<br>
                    ・個人からの問い合わせに対する対応<br>
                    ・他企業ならびにシステムとの連携<br>
                    ・提携に際し、サービス等の提供に関する情報<br>
                    弊社は提供いただいた個人情報をもとに、統計データを作成し開示を行う場合は、個人を特定できない表現において統計データを作成し開示します。<br>
                    その際、弊社は統計データの利用・開示について、特定の個人との関係において何ら制限を受けないものとします。
                </p>
                <p>【５】個人情報の第三者への開示<br>
                    弊社は原則として、個人情報を第三者に開示することはありません。<br>
                    但し、以下のような場合、その必要性の有無を十分検討した上で、個人情報を開示することがあります。<br>
                    <br>
                    『人の生命、身体、財産の保護のために必要がある場合で、個人の同意を得ることが困難である場合法令に基づき、警察、裁判所等の公的機関より開示協力もしくは提供義務が定められている場合個人を特定識別することのできない情報そのほか、サービスを提供するために必要であると弊社が合理的に判断した場合』
                </p>
                <p>【６】免責事項<br>
                    当サイトより、リンクを設定している事業者ならびに個人のウェブサイトにおける個人情報等の保護について責任を追うものではありません。<br>
                    リンク先のウェブサイトにおける個人情報の収集に関しては、リンク先のウェブサイトの個人情報の取り扱いを必ずご参照ください。<br>
                    当サイトで掲載している画像や動画の著作権・肖像権等は各権利所有者に帰属致します。<br>
                    当サイトに存在する、文章・画像・動画等の著作物の情報を無断転載することを禁止します。<br>
                    当サイトのコンテンツ・情報につきまして、可能な限り正確な情報を掲載するよう努めておりますが、誤情報が入り込んだり、情報が古くなっていることもございます。<br>
                    当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。</p>
                <p>【7】広告の配信について<br>
                    当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。<br>
                    このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。<br>
                    このトラフィックデータは匿名で収集されており、個人を特定するものではありません。<br>
                    この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。</p>
                <p>【8】プライバシーポリシーの更新について<br>
                    当サイトは、個人情報に関して適用される日本の法令を遵守するとともに、本ポリシーの内容を適宜見直しその改善に努めます。<br>
                    それらの改訂は当ページでお知らせいたします。</p>
            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{url('static/assets')}}/js/modernizr.js"></script>
<script src="{{url('static/assets')}}/js/common.min.js"></script>

<script>
    var ua = navigator.userAgent
    var sp = (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)
    if (sp) new ViewportExtra(375)
</script>
@endsection

@section('pageJs')
@endsection

{{-- @include('layouts.footer') --}}