<?php

class kokenCookieConsent extends kokenPlugin {
	function __construct() {
		$this->require_setup = true;
		$this->register_hook('before_closing_body', 'render');
	}
	function render() {
		$path = $this->get_path();
		echo <<<OUT
		<script>
			window.cookieconsent_options = {
				message: '{$this->data->cookie_consent_message}',
				dismiss: '{$this->data->cookie_consent_dismiss}',
				learnMore: '{$this->data->cookie_consent_learnmore}',
				link: '{$this->data->cookie_consent_link}',
				theme: '{$path}/styles/{$this->data->cookie_consent_theme}'
			}
		</script>
		<script type="text/javascript" src="{$path}/cookieconsent.js"></script>
		OUT;
	}
}
