<?php
/**
 * vi:set sw=4 ts=4 noexpandtab fileencoding=utf8:
 * @class  automailAdminController
 * @author NURIGO(contact@nurigo.net)
 * @brief  automailAdminController
 */
class automailAdminController extends automail 
{
	/**
	 * @brief constructor
	 */
	function init() 
	{
	}

	/**
	 * @brief saving config values.
	 **/
	function procAutomailAdminInsert() 
	{
		$args = Context::gets('config_srl','target_module','config_key','sender_name','sender_email','mail_title','mail_content');

		if($args->config_srl)
		{
			$output = executeQuery('automail.updateConfig', $args);
			if(!$output->toBool()) return $output;
			$this->setMessage('success_updated');
		}
		else
		{
			$args->config_srl = getNextSequence();
			$output = executeQuery('automail.insertConfig', $args);
			if(!$output->toBool()) return $output;
			$this->setMessage('success_registed');
		}
		$returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'module', Context::get('module'), 'act', 'dispAutomailAdminModify');
		$this->setRedirectUrl($returnUrl);
	}
}
/* End of file automail.admin.controller.php */
/* Location: ./modules/automail/automail.admin.controller.php */
