<?php
/**
 * @version		$Id: JextYaShare.php 31 may 2011 $
 * @package		JExt
 * @copyright	Copyright (C) 2009-2011 JExt. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 */


// No direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * Yandex share plugin
 */
class plgContentJextYaShare extends JPlugin
{
    private $ya_share_code;

    private $view;

    /**
     * Constructor
     *
     * @access      protected
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     * @since       1.5
     */
    function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);

        $this->view = JRequest::getCmd('view');

        $this->ya_share_code = '
                <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                <div class="yashare-auto-init" data-yashareL10n="'.$this->params->def('language', 'ru').'" data-yashareType="'.$this->params->def('elementStyle_type', 'button').'" data-yashareQuickServices="'.$this->params->def('quickServices', 'yaru,vkontakte,facebook,twitter,odnoklassniki,moimir').'"></div>
                 ';
     }

  /*  function onContentAfterTitle($context, &$article, &$params, $limitstart)
    {

        if ($this->view == 'article' && $this->params->def('position', 1) == "3") {
            echo $this->ya_share_code;
        }
    }      */

    function onContentAfterDisplay($context, &$article, &$params, $limitstart)
    {
        if ($this->view == 'article' && $this->params->def('position', 1) == "1") {
            return $this->ya_share_code;
        }
    }

    function onContentBeforeDisplay($context, &$article, &$params, $limitstart)
    {
        if ($this->view == 'article' && $this->params->def('position', 1) == '2') {
            return $this->ya_share_code;
        }
    }


}