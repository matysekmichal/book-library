<?php

$page = ($_GET['page']) ?? 1;

/**
 * Renderowanie listy ze stronami
 **/
function pagination($page, $pages)
{
    if ($pages > 1) {
        $render = '<nav><ul class="pagination">';

        $prevCond = ($page > 1) ?? false;
        $prev = ($prevCond) ? '?page=' . ($page - 1) : '';
        $prevDisabled = !$prevCond ? 'class="disabled"' : '';
        $render .= '<li ' . $prevDisabled . '><a href="' . $prev . '"><</a></li>';

        for ($i = 1; $i <= $pages; $i++) {
            $isActive = ($page == $i) ? 'active' : "";
            $render .= '<li class="' . $isActive . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
        }

        $nextCond = ($page > 0 && $page < $pages) ?? false;
        $next = $nextCond ? '?page=' . ($page + 1) : '';
        $nextDisabled = !$nextCond ? 'class="disabled"' : '';
        $render .= '<li ' . $nextDisabled . '><a href="' . $next . '">></a></li>';

        $render .= '</ul></nav>';

        return $render;
    }

    return '';
}