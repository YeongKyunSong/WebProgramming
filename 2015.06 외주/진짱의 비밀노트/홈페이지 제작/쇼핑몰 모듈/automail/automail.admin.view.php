<?php
/**
 * vi:set sw=4 ts=4 noexpandtab fileencoding=utf8:
 * @class  automailAdminView
 * @author NURIGO(contact@nurigo.net)
 * @brief  automailAdminView
 */ 
class automailAdminView extends automail 
{
	function init() 
	{
		// 템플릿 설정
		$this->setTemplatePath($this->module_path.'tpl');
	}
}
/* End of file automail.admin.view.php */
/* Location: ./modules/automail/automail.admin.view.php */
