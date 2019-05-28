<?php

function pagination($page, $pages)
{
    if ($pages > 1) {
        $render = '<nav><ul class="pagination">';

        for ($i = 1; $i <= $pages; $i++) {
            $isActive = ($page == $i) ? 'active' : "";
            $render .= '<li class="' . $isActive . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
        }

        $render .= '</ul></nav>';

        return $render;
    }

    return '';
}