<?php

use Illuminate\Support\Facades\App;

if(!function_exists('translate')) {
    function translate($key)
    {
        $local = app()->getLocale();
        App::setLocale($local);
        // $lang_array = include('E:\mywork\Gamal\hospital\lang/' . $local . '/messages.php');
        $lang_array = include(base_path('lang/' . $local . '/messages.php'));

        $processed_key = ucfirst(str_replace('_', ' ', remove_invalid_charcaters($key)));

        if (!array_key_exists($key, $lang_array)) {
            $lang_array[$key] = $processed_key;
            $str = "<?php return " . var_export($lang_array, true) . ";";
            file_put_contents(base_path('lang/' . $local . '/messages.php'), $str);

            $result = $processed_key;
        } else {
            $result = __('messages.' . $key);
        }
        return $result;
    }
}
