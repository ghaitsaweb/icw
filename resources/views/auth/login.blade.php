<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{env('APP_NAME')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="themes/dimension/assets/css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="themes/dimension/assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="themes/dimension/assets/css/noscript.css" /></noscript>
		<link rel="manifest" href="manifest.json">

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="msapplication-starturl" content="/">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:url" content="{{url()->current()}}">
        <meta name="twitter:title" content="@yield('title','Parker POS')">
        <meta name="twitter:description" content="@yield('description',"Parker POS is an progressive web app point of sales system powered by Stripe!")">

        <meta name="twitter:creator" content="@mastashake08">
        <meta name="twitter:site" content="@mastashake08">
        <!-- Facebook OG -->
        <meta property="og:title" content="@yield('title','Parker POS')" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{url()->current()}}" />

        <meta name="og:description" content="@yield('description',"Parker POS is an progressive web app point of sales system powered by Stripe!")">
    </head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">

                    </header>
                    <article id="contact">
                        <h2 class="major">Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="field">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="name">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <ul class="actions">
                                <li><button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif</li>

                            </ul>
                        </form>
                    </article>

				<!-- Main -->


				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; ICW 2022.</p>
					</footer>

			</div>

		<!-- BG -->
		

		<!-- Scripts -->
			<script src="themes/dimension/assets/js/jquery.min.js"></script>
			<script src="themes/dimension/assets/js/skel.min.js"></script>
			<script src="themes/dimension/assets/js/util.js"></script>
			<script src="themes/dimension/assets/js/main.js"></script>

	</body>
</html>
