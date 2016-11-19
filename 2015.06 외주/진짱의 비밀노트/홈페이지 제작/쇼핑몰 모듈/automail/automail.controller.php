<?php
/**
 * vi:set sw=4 ts=4 noexpandtab fileencoding=utf8:
 * @class  automailController
 * @author NURIGO(contact@nurigo.net)
 * @brief  automailController
 */
class automailController extends automail
{
	function sendMail($target_module, $config_key, $email_address, $keywords = NULL)
	{
		$args->target_module = $target_module;
		$args->config_key = $config_key;
		$output = executeQuery('automail.getConfig', $args);
		$config = $output->data;
		if(!$config) return;

		$mail_content = $config->mail_content;
		if($keywords) $mail_content = $this->mergeKeywords($config->mail_content, $keywords);

		$oMail = new Mail();
		$oMail->setTitle($config->mail_title);
		$oMail->setContent($mail_content);
		$oMail->setSender($config->sender_name, $config->sender_email);
		$oMail->setReceiptor($email_address, $email_address);
		$oMail->send();
	}
}
/* End of file automail.controller.php */
/* Location: ./modules/automail/automail.controller.php */
