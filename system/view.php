<?

class View
{
    public static function render($filePath, $data = array())
    {
        extract($data);
        ob_start();
        require_once("mvc/view" . $filePath);
        $content = ob_get_clean();
        require_once("theme/default.php");
    }
    public static function renderPartial($filePath, $data = array())
    {
        extract($data);
        require_once(getcwd() . "/mvc/view" . $filePath);
    }

}

class ViewLogin
{
    public static function render($filePath, $data = array())
    {
        extract($data);
        ob_start();
        require_once("mvc/view" . $filePath);
        $contentlogin = ob_get_clean();
        require_once("theme/defaultLogin.php");
    }

}

class ViewAdmin
{
    public static function render($filePath, $data = array())
    {
        extract($data);
        ob_start();
        require_once("mvc/view" . $filePath);
        $content = ob_get_clean();
        require_once("theme/default_admin.php");
    }

    public static function renderPartial($filePath, $data = array())
    {
        extract($data);
        require_once(getcwd() . "/mvc/view" . $filePath);
    }
}

class ViewForget
{
    public static function render($filePath, $data = array())
    {
        extract($data);
        ob_start();
        require_once("mvc/view" . $filePath);
        $contentlogin = ob_get_clean();
        require_once("theme/default_forget.php");
    }

}
