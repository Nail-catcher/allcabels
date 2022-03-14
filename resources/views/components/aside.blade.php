<aside></aside>

<aside>
	<div class="aside__top">
		<a href="/" class="logo">
			<img src="{{ asset('images/logo.svg') }}" alt="">
		</a>
		<div class="aside__nav">
			<ul>
				<li>
					<a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
						<svg><use xlink:href="{{ asset('images/svg/sprite.symbol.svg#home') }}" /></svg>
						<span>Главная</span>
					</a>
				</li>
				<li>
					<a href="/manufacture" class="{{ request()->is('manufacture*') ? 'active' : '' }}">
						<svg><use xlink:href="{{ asset('images/svg/sprite.symbol.svg#manufacture') }}" /></svg>
						<span>Заводы</span>
					</a>
				</li>
				<li>
					<a href="/cabels" class="{{ request()->is('cabels*') ? 'active' : '' }}">
						<svg><use xlink:href="{{ asset('images/svg/sprite.symbol.svg#cabels') }}" /></svg>
						<span>Кабели</span>
					</a>
				</li>
				<li>
					<a href="/instruction" class="{{ request()->is('instruction*') ? 'active' : '' }}">
						<svg><use xlink:href="{{ asset('images/svg/sprite.symbol.svg#faq') }}" /></svg>
						<span>Инструкция системы</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="aside__footer">
		<div class="aside__footer-callback">
			<strong>У вас есть идеи по улучшению?</strong>
			<p> Поделитесь с нами</p>
			<a href="#" class="btn btn-primary">Написать <img src="{{ asset('/images/svg/plane.svg') }}" alt=""></a>
		</div>
		<div class="copyright">
			<p>© 2022 год. Allcables.pro</p>
		</div>
		<a class="developers" href="http://affetta.ru" target="_blank">
			<p>Сделано в AFFETTA</p>
			<img src="{{ asset('images/svg/affetta.svg') }}" alt="">
		</a>
	</div>
</aside>