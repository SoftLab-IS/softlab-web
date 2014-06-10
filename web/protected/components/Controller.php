<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	/**
	 * Returns set of rules for specified $type and $name.
	 * 
	 * For controllers $name is 'controllername'. For modules 'modulename'.
	 * For controllers inside module is 'modulename/controllername'.
	 * 
	 * If there is $name = 'allow' with value 'all', all actions are allowed.
	 * 
	 * @param $type string Type of the rules (backendAccess or frontendAccess).
	 * @param $name string Name of the controller or module for which rules are needed.
	 * 
	 * @returns empty array if no user is logged in or array with specified rules.
	 */
	protected function getSessionRules($type, $name)
	{

		if (!Yii::app()->user->isGuest)
		{
			if (isset(Yii::app()->session[$type]['allow']) && (Yii::app()->session[$type]['allow'] == 'all'))
				return array(array('allow', 'users' => array('@')));
			
			
			if (isset(Yii::app()->session[$type][$name]))
				return Yii::app()->session[$type][$name];
			else
				return array();
		}
		else
		{
			return array();
		}
	}
}
