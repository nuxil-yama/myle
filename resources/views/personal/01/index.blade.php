<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">

	<title>{{$meta['name']}} {{$meta['company']}}</title>
	<meta name="Description" content="">
	<meta name="Keywords" content="">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="{{url('dist/template/01/css/')}}/reset.css" rel="stylesheet">
	<link href="{{url('dist/template/01/css/')}}/slick-theme.css" rel="stylesheet">
	<link href="{{url('dist/template/01/css/')}}/slick.css" rel="stylesheet">
	<link href="{{url('dist/template/01/css/')}}/base.css" rel="stylesheet">

</head>

<body>

	<main>
		<div id="wrap">
			<div class="block-mv mv pc" style="background-image: url({{$meta['profile']}});">
				<div class="inner">
					<div class="in scroll-anim to-anim-right">
						<p class="ttl">{{$meta['catch_copy']}}</p>
						<p class="comment">{!!nl2br(htmlspecialchars($meta['sub_catch_copy']))!!}</p>
						<p class="company">{{$meta['company']}}</p>
						<p class="name"><span>{{$meta['name_en']}}</span>{{$meta['name']}}</p>
					</div>
				</div>
				<div class="line"></div>
				<div class="en">{{$meta['catch_copy']}}</div>
			</div>
			<div class="block-mv mv sp">
				<div class="img" style="background-image: url({{$meta['profile']}});">
					<div class="line"></div>
				</div>
				<div class="inner">
					<div class="en">{{$meta['catch_copy']}}</div>
					<div class="in scroll-anim to-anim-right">
						<p class="ttl">{{$meta['catch_copy']}}</p>
						<p class="comment">{!!nl2br(htmlspecialchars($meta['sub_catch_copy']))!!}</p>
						<p class="company">{{$meta['company']}}</p>
						<p class="name"><span class="pc">{{$meta['name_en']}}</span>{{$meta['name']}}<span class="sp">{{$meta['name_en']}}</span></p>
					</div>
				</div>
			</div>
			<div class="block-contents">
				<div class="box-ico flex f-wrap">
					<a href="{{$meta['facebook']}}" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_facebook.png" alt=""></a>
					<a href="{{$meta['instagram']}}" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_instagram.png" alt=""></a>
					<a href="{{$meta['line']}}" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_line.png" alt=""></a>
					<a href="{{$meta['twitter']}}" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_twitter.png" alt=""></a>
					<a href="{{$meta['tiktok']}}" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_tiktok.png" alt=""></a>
					{{-- <a href="#" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_snapchat.png" alt=""></a> --}}
					<a href="{{$meta['youtube']}}" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_youtube.png" alt=""></a>
					{{-- <a href="#" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_whats_app.png" alt=""></a> --}}
					{{-- <a href="#" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_be.png" alt=""></a> --}}
					{{-- <a href="#" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_in.png" alt=""></a> --}}
					{{-- <a href="#" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_dribbble.png" alt=""></a> --}}
					{{-- <a href="#" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_pinterest.png" alt=""></a> --}}
					{{-- <a href="#" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/ico_spotify.png" alt=""></a> --}}
				</div>
				<div class="box-img">
					<div class="bg scroll-anim" style="background-image: url({{url('dist/template/01/')}}/img/detail/bg_gradation01.jpg);"></div>
					<div class="inner">
						<div class="img">
							<img src="{{$meta['profile']}}" alt="">
						</div>
						<div class="pad">
							<p class="name">
								{{$meta['name_en']}}
							</p>
							<p class="en">IT’S AN HONOR TO MEET YOU.<br>
								THANK YOU FOR YOUR CONTINUED SUPPORT.</p>
						</div>
					</div>
				</div>
				<div class="box-profile">
					<p class="company">{{$meta['company']}}</p>
					<p class="name">{{$meta['name']}}</p>
					<p class="ruby">{{$meta['name_kana']}}</p>
					<p class="label">連絡先</p>
					<ul>
						<li class="tel">
							<a href="tel:{{$meta['tel']}}">
								{{$meta['tel']}}
								<small>電話番号</small>
							</a>
						</li>
						<li class="address">
							{{$meta['address']}}
							<small>住所</small>
						</li>
					</ul>
				</div>
				<div class="box-message">
					<p class="label">MESSAGE</p>
					<div class="slider">
						<div class="box">
							<div class="bg" style="background-image: url({{$meta['profile']}});"></div>
							<div class="inner">
								<div class="img">
									<img src="{{$meta['profile']}}" alt="">
								</div>
								<p class="ttl">{{$meta['message_title']}}</p>
								<p class="txt">
									{!!nl2br(htmlspecialchars($meta['message_body']))!!}
								</p>
							</div>
						</div>
						{{-- <div class="box">
							<div class="bg" style="background-image: url({{$meta['profile']}});"></div>
							<div class="inner">
								<div class="img">
									<img src="{{$meta['profile']}}" alt="">
								</div>
								<p class="ttl">アドバイザーとして、自身にどんな強みがあると思いますか？</p>
								<p class="txt">
									お客様が“何でも本音で相談できてしまう関係”を築けることだと思います。私は過去1,000件以上の資産形成のアドバイスをしてきましたが、お客様からプライベートの付き合いや、親友と呼べるような関係になった方もいらっしゃいました。<br>
									<br>
									なぜそこまでお客様との関係性を大切にしているかと言うと、多くのお客様にとって投資が未知のものだからです。そんな中で「心の支え」というと大袈裟かもしれませんが、遠慮せずに何でも頼ってほしいという想いがあるからです。<br>
									<br>
									資産形成の相談で自分の感じていることや不安を正直に言えない、というのは本末転倒ですし、私自身、お客様の本音の部分をお聞きして、それに対するベストなアンサーやご提案をさせていただくことを大切にしています。
								</p>
							</div>
						</div>
						<div class="box">
							<div class="bg" style="background-image: url({{$meta['profile']}});"></div>
							<div class="inner">
								<div class="img">
									<img src="{{$meta['profile']}}" alt="">
								</div>
								<p class="ttl">アドバイザーとして、自身にどんな強みがあると思いますか？</p>
								<p class="txt">
									お客様が“何でも本音で相談できてしまう関係”を築けることだと思います。私は過去1,000件以上の資産形成のアドバイスをしてきましたが、お客様からプライベートの付き合いや、親友と呼べるような関係になった方もいらっしゃいました。<br>
									<br>
									なぜそこまでお客様との関係性を大切にしているかと言うと、多くのお客様にとって投資が未知のものだからです。そんな中で「心の支え」というと大袈裟かもしれませんが、遠慮せずに何でも頼ってほしいという想いがあるからです。<br>
									<br>
									資産形成の相談で自分の感じていることや不安を正直に言えない、というのは本末転倒ですし、私自身、お客様の本音の部分をお聞きして、それに対するベストなアンサーやご提案をさせていただくことを大切にしています。
								</p>
							</div>
						</div> --}}
					</div>
				</div>
				<div class="box-btn">
					<a href="mailto:{{$meta['email']}}" class="contact opacity"><img src="{{url('dist/template/01/')}}/img/common/btn_contact.png"
							alt="お問い合わせはこちら"></a>
					<a href="#" class="insta opacity" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/btn_insta.png"
							alt="インスタグラムをフォロー"></a>
					<a href="#" class="line opacity" target="_blank"><img src="{{url('dist/template/01/')}}/img/common/btn_line.png"
							alt="LINEの友達を追加する"></a>
				</div>
				<div class="logo center">
					<img src="{{url('dist/images/logo.svg')}}" width="144" alt="">
				</div>
			</div>
		</div>
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{url('dist/template/01')}}/js/slick.js"></script>
	<script src="{{url('dist/template/01')}}/js/common.js"></script>
	<script src="{{url('dist/template/01')}}/js/jquery.inview.js"></script>
	<script>
		$(window).on('load', function () {
			$('.scroll-anim').on('inview', function (event, isInView) {
				if (isInView) {
					$(this).addClass('active');
				}
			});
		});
	</script>
</body>

</html>