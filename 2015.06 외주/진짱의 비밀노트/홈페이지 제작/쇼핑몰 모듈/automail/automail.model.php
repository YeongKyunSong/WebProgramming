<?php
/**
 * vi:set sw=4 ts=4 noexpandtab fileencoding=utf8:
 * @class  automailModel
 * @author NURIGO(contact@nurigo.net)
 * @brief  automailModel
 */
class automailModel extends automail 
{

	/**
	 * @brief constructor
	 */
	function init() 
	{
	}

	function getModuleConfig() {
		if (!$GLOBALS['__automail_config__']) {
			$oModuleModel = &getModel('module');
			$config = $oModuleModel->getModuleConfig('automail');
			$GLOBALS['__automail_config__'] = $config;
		}
		return $GLOBALS['__automail_config__'];
	}

	function getSetup($target_module, $config_key, &$content)
	{
		$oEditorModel = &getModel('editor');
		$config = $oEditorModel->getEditorConfig(0);
		// set editor options.
		$option->skin = $config->editor_skin;
		$option->content_style = $config->content_style;
		$option->content_font = $config->content_font;
		$option->content_font_size = $config->content_font_size;
		$option->colorset = $config->sel_editor_colorset;
		$option->allow_fileupload = true;
		$option->enable_default_component = true;
		$option->enable_component = true;
		$option->disable_html = false;
		$option->height = 200;
		$option->enable_autosave = false;
		$option->primary_key_name = 'noti_srl';
		$option->content_key_name = 'mail_content';

		$editor = $oEditorModel->getEditor(0, $option);
		Context::set('editor', $editor);

		$args->target_module = $target_module;
		$args->config_key = $config_key;
		$output = executeQuery('automail.getConfig', $args);
		$config = $output->data;
		if(!$config)
		{
			$config = new stdClass();
			$config->target_module = $target_module;
			$config->config_key = $config_key;
		}
		Context::set('config', $config);

		// Set a template file
		$oTemplate = &TemplateHandler::getInstance();
		$tpl = $oTemplate->compile($this->module_path.'tpl', 'mailsetup');
		$content .= $tpl;

		return new Object();
	}
}
/* End of file automail.model.php */
/* Location: ./modules/automail/automail.model.php */
