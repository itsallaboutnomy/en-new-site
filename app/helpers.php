<?php

if (! function_exists('_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function _asset($path, $secure = null)
    {

        if(env('APP_ASSETS') == 'local'){
            return app('url')->asset($path, $secure);
        } else {
            return app('url')->asset("public/".$path, $secure);
        }
    }
}
