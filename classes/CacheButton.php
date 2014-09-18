<?php



class CacheButton extends System
{
    public function emptyPageCache($arrButtons)
    {
        if (Input::post('FORM_SUBMIT') == 'tl_content' && isset($_POST['test']))
        {
            $this->import("Automator");
            $this->Automator->purgePageCache();
        }

        $arrButtons['test'] = '<input type="submit" name="test" id="test" class="tl_submit" accesskey="a" value="Seitencache leeren"> ';

        return $arrButtons;
    }

    public function addCacheButtonToDCA($strName)
    {
        if($strName == "tl_content")
        {
            $GLOBALS['TL_DCA']['tl_content']['edit'] = array(
                'buttons_callback' => array
                (
                    array('CacheButton', 'emptyPageCache')
                )
            );
        }
    }
}