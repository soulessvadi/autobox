<!-- Page footer -->
<footer class="page-footer">

<div class="footer-top">
	<div class="page-wrapper">
		<div class="page-container">

			<div class="two-cols">
				<div class="col-left">

					<a href="{{ url('/') }}" class="logo-block">
						<span class="logo"><img src="{{ url('/public/img/content/logo.png') }}" alt="Autobox"><span class="slogan">{{ $_footer->text_18 }}</span></span>
						<div class="website">
							<span>{{ $_footer->text_1 }}</span>
						</div>
					</a>

					<div class="website-description">
						<img src="{{ url('/public/img/content/johan.jpg') }}" alt="AUTOBOX">
						<div class="text">
							<p>{{ $_footer->text_2 }}</p>
							<p>{{ $_footer->text_3 }}</p>
						</div>
					</div>

				</div>
				<div class="col-right">

					<div class="contacts">
						<h4 class="title">{{ $_footer->text_4 }}</h4>
						<div class="contact-block">
							<div class="contact">
								<span class="contact__title">{{ $_footer->text_5 }}</span>
								<span class="contact__value">{{ $_footer->text_6 }}</span>
							</div>
							<div class="contact">
								<span class="contact__title">{{ $_footer->text_7 }}</span>
								<span class="contact__value">{{ $_footer->text_8 }}</span>
							</div>
							<div class="contact">
								<span class="contact__title">{{ $_footer->text_9 }}</span>
								<span class="contact__value">{{ $_footer->text_10 }}</span>
							</div>
							<div class="contact">
								<span class="contact__title">{{ $_footer->text_11 }}</span>
								<span class="contact__value">{{ $_footer->text_12 }}</span>
							</div>
						</div>
					</div>

					<div class="website-description">
						<img src="{{ url('/public/img/content/johan.jpg') }}" alt="{{ $_footer->text_14 }}">
						<div class="text">
							<p>{!! $_footer->text_13 !!}</p>
							<p>{!! $_footer->text_14 !!}</p>
						</div>
					</div>

				</div>
			</div>

			<div class="footer-menu">
				@foreach($_footmenu as $menu)
					@if(!SIGNEDIN && !$menu->signedin_only || SIGNEDIN)
						<a href="{{ !strlen($menu->alias) ? 'javascript:void(0)' : url($menu->alias) }}"  class="{{ $menu->classes }}">{{ $menu->name }}</a>
					@endif
				@endforeach
			</div>

			<div class="footer-menu footer-menu--small">
				@foreach($_footsubmenu as $menu)
					@if(!SIGNEDIN && !$menu->signedin_only || SIGNEDIN)
						<a href="{{ !strlen($menu->alias) ? 'javascript:void(0)' : url($menu->alias) }}"  class="{{ $menu->classes }}">{{ $menu->name }}</a>
					@endif
				@endforeach
			</div>

		</div>
	</div>
</div>

<div class="footer-bottom">
	<div class="page-wrapper">
		<div class="page-container">

			<div class="two-cols">
				<div class="col-left">

					<div class="text-seo">
						<p>{!! $_footer->text_13 !!}</p>
						<p>{!! $_footer->text_14 !!}</p>
					</div>

				</div>
				<div class="col-right">

					<div class="social-links">
						@if($_socials->fb_link)
						<a href="{{ $_socials->fb_link }}" class="social-link link-facebook">
							<span class="icons-container">
								<span class="icon icon-facebook"></span>
								<span class="icon icon-facebook"></span>
							</span>
						</a>
						@endif
						@if($_socials->tw_link)
						<a href="{{ $_socials->tw_link }}" class="social-link link-twitter">
							<span class="icons-container">
								<span class="icon icon-twitter"></span>
								<span class="icon icon-twitter"></span>
							</span>
						</a>
						@endif
						@if($_socials->yt_link)
						<a href="{{ $_socials->yt_link }}" class="social-link link-youtube">
							<span class="icons-container">
								<span class="icon icon-youtube"></span>
								<span class="icon icon-youtube"></span>
							</span>
						</a>
						@endif
						@if($_socials->ins_link)
						<a href="{{ $_socials->ins_link }}" class="social-link link-instagram">
							<span class="icons-container">
								<span class="icon icon-instagram"></span>
								<span class="icon icon-instagram"></span>
							</span>
						</a>
						@endif
						@if($_socials->sk_link)
						<a href="skype:{{ $_socials->sk_link }}?call" class="social-link link-skype">
							<span class="icons-container">
								<span class="icon icon-skype"></span>
								<span class="icon icon-skype"></span>
							</span>
						</a>
						@endif
						@if($_socials->gp_link)
						<a href="{{ $_socials->gp_link }}" class="social-link link-google-plus">
							<span class="icons-container">
								<span class="icon icon-google-plus"></span>
								<span class="icon icon-google-plus"></span>
							</span>
						</a>
						@endif
						@if($_socials->in_link)
						<a href="{{ $_socials->in_link }}" class="social-link link-linkedin">
							<span class="icons-container">
								<span class="icon icon-linkedin"></span>
								<span class="icon icon-linkedin"></span>
							</span>
						</a>
						@endif
					</div>

					<div class="security-links">
						<a href="https://www.yelp.com/biz/autobox24-kerpen" class="yelp">
							<img title="Recommended Reviews on Yelp" alt="Autobx24.com Recommended Reviews on Yelp" border="0" src="{{ url('/public/img/content/banners/yelp_autobox24.png') }}"></a>
						<a href="https://safeweb.norton.com/report/show?url=www.autobox24.com" rel="nofollow" target="_blank" class="norton">
							<img title="Original car Parts Safe website by Norton" alt="Autobx24.com Genuine Auto Parts" border="0" src="{{ url('/public/img/content/banners/norton_genuine_car_spare_parts.png') }}"></a>
						<a href="https://www.mcafeesecure.com/verify?host=autobox24.com" rel="nofollow" target="_blank" class="mcafee">
							<img title="Autobx24.com Genuine Auto Parts safe website" alt="Autobx24.com Genuine Auto Parts" border="0" src="{{ url('/public/img/content/banners/mcafees.png') }}"></a>
						<a href="https://www.trustedsite.com/site/autobox24.com/" rel="nofollow" target="_blank" class="trust">
							<img title="Trust Website" alt="Trust Website" border="0" src="{{ url('/public/img/content/banners/trustedsite.png') }}"></a>
					</div>

					<div class="copyright">
						<div class="copyright-container">
							<a href="javascript:void(0)" class="sitemap-link">{{ $_footer->text_15 }}</a>
							<span>{{ $_footer->text_16 }}</span>
					</div>
					<a href="https://kaminskiy-design.com.ua/" rel="me" target="_blank" title="{{ $_footer->text_19 }}" class="website-development">{{ $_footer->text_17 }}</a></div>

				</div>
			</div>

		</div>
	</div>
</div>

</footer>
