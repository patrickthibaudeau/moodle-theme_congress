<?php

namespace theme_congress;

class events
{
    public static function redirect_user_to_home_page() {
        global $CFG;
        $config = get_config('theme_congress');
        if ($config->redirect_url) {
            redirect($CFG->wwwroot . $config->redirect_url);
        }
    }
}