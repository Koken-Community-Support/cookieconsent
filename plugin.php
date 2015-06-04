<?php

class BaldursPhotographyCookieConsent extends KokenPlugin {

	function __construct()
	{
		$this->require_setup = true;
		$this->register_hook('before_closing_body', 'render');
	}

	function render()
	{

		$message	= $this->data->cookie_consent_message;
		$dismiss	= $this->data->cookie_consent_dismiss;
		$learnMore	= $this->data->cookie_consent_learnmore;
		$link		= $this->data->cookie_consent_link;
		$theme		= $this->data->cookie_consent_theme;
		$path		= $this->get_path();

		echo <<<OUT
<script type="text/javascript">
	window.cookieconsent_options = {
		message: '{$message}',
		dismiss: '{$dismiss}',
		learnMore: '{$learnMore}',
		link: '{$link}',
		theme: '{$path}/styles/{$theme}.css'
	}
</script>
<script type="text/javascript" src="{$path}/cookieconsent.js"></script>
OUT;
	}
}
