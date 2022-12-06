<?php

namespace theme_congress;

use theme_congress\navdrawer;

class navdrawer
{


    /**
     * @param $title string
     * @param $submenu array
     * @param $url string
     * @param $icon string
     * @return array
     */
    public static function add_item($title , $submenu = null, $url = '#', $icon = 'far fa-circle') {
        $item = [
            'title' => $title,
            'url' => $url,
            'icon' => $icon
        ];

        if ($submenu) {
            $item['has_submenu'] = count($submenu);
            $item['submenu'] = $submenu;
        }

        return $item;
    }

    /**
     * Iterate through all folders within the local folder and get all navdrawer arrays
     * @return array|void
     */
    public static function render_navdrawer_items() {
        global $CFG;

        $path = $CFG->dirroot . '/local/';

        if (!is_dir($path)) {
            exit('Invalid directory path');
        }

        $folders = [];
        $i = 0;
        foreach (scandir($path) as $file) {
            if (is_dir($path . $file)) {
                if ($file !== '.' && $file !== '..') {
                    $folders[$i]['path'] = $path . $file;
                    $folders[$i]['plugin'] = 'local_' . $file;
                    $i++;
                }
            }
        }

        $items = [];
        for ($x = 0; $x < count($folders); $x++){
            require_once($folders[$x]['path'] . '/lib.php');
            $function = $folders[$x]['plugin'] . '_navdrawer_items';
            $data = $function();
            $items = array_merge_recursive($items, $data);
        }
        array_values($items);

        return $items;
    }

}