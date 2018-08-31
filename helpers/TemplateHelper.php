<?php
/**
 *
 */
class TemplateHelper
{

    public static function createTemplate(String $templateName, stdClass $values)
    {
        $header = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/header.html');
        if($templateName == "edit") {
            $emptyTemplate = file_get_contents(TEMPLATE_DIRECTORY . '/' . $templateName . '.php');
        } else {
            $emptyTemplate = file_get_contents(TEMPLATE_DIRECTORY . '/' . $templateName . '.html');
        }
        $footer = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/footer.html');
        $result = $header . $emptyTemplate . $footer;
        foreach ($values as $key => $value) {
            // If the key is found inside the template, we replace the key with the content coming from the DB
            // If not, we do nothing to allow for greater flexibility
            if(strpos($result, '%%' . strtoupper($key) . '%%')) {
                $result = str_replace('%%' . strtoupper($key) . '%%', $value, $result);
            }
        }
        return $result;
    }

    public static function createEdit($values)
    {
        $editPage = include_once('./views/edit.php');
        return $editPage;
    }

    public static function createUpdate($values)
    {
        $updatePage = include_once('./views/update.php');
        return $updatePage;
    }

}
