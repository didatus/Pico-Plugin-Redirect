<?php

class Redirect {
    public function before_read_file_meta(&$headers) {
        $headers['redirect'] = 'Redirect';
    }

    public function file_meta(&$meta) {
        if(isset($meta['redirect']) && !empty($meta['redirect'])) {
            header('Location: ' . $meta['redirect']);
            exit();
        }
    }

    public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page) {
        $old_pages = $pages;
        $pages = array();
        foreach ($old_pages as $key => $page) {
            if(!empty($page['title'])) {
                $pages[] = $page;
            }
        }
    }
}
