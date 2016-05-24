<?php

class BaldursPhotographyCookieConsent extends KokenPlugin {

	function __construct()
	{
		$this->require_setup = true;
		$this->register_hook('before_closing_body', 'render');
	}

	function render()
	{

		$message		= $this->data->cookie_consent_message;
		$dismiss		= $this->data->cookie_consent_dismiss;
		$learnMore		= $this->data->cookie_consent_learnmore;
		$link			= $this->data->cookie_consent_link;
		$theme			= $this->data->cookie_consent_theme;
		$target			= $this->data->cookie_consent_target;
		$cookiedomain	= $this->data->cookie_consent_domain;
		$cookiepath		= $this->data->cookie_consent_path;
		$cookieexp		= $this->data->cookie_consent_expirydays;
		$path			= $this->get_path();

		echo <<<OUT
<script type="text/javascript">
	window.cookieconsent_options = {
		message: '{$message}',
		dismiss: '{$dismiss}',
		learnMore: '{$learnMore}',
		link: '{$link}',
		target: '_{$target}',
		theme: '{$path}/styles/{$theme}.min.css',
		domain: '{$cookiedomain}',
		path: '{$cookiepath}',
		expiryDays: '{$cookieexp}'
	}
</script>
<script type="text/javascript" src="{$path}/cookieconsent.min.js"></script>
OUT;
	}
}
