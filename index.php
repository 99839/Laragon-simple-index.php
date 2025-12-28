<?php
$DomainPostFix = 'test';

if (!empty($_GET['q'])) {
    switch ($_GET['q']) {
        case 'info':
            phpinfo();
            exit;
            break;
    }
}

function stringToColor($string) {
    $rgb = substr(dechex(crc32($string)), 0, 6);

    $darker = 1;
    list($R16, $G16, $B16) = str_split($rgb, 2);
    $R = sprintf('%02X', floor(hexdec($R16) / $darker));
    $G = sprintf('%02X', floor(hexdec($G16) / $darker));
    $B = sprintf('%02X', floor(hexdec($B16) / $darker));

    return '#' . $R . $G . $B;
}
function getGreeting() {
    $currentTime = new DateTime('now', new DateTimeZone('Asia/Shanghai'));
    $hours = (int)$currentTime->format('H');

    if ($hours < 12) {
        return "Good morning";
    } elseif ($hours < 18) {
        return "Good afternoon";
    } else {
        return "Good evening";
    }
}

function get_svg($icon_name, $attrs = array())
{
    if (!$icon_name)
        return '';

    $default_attrs = array(
        'class' => 'svg-icon',
        'width' => '1em',
        'height' => '1em',
        'fill' => 'currentColor'
    );

    $attrs = array_merge($default_attrs, $attrs);

    $attrs_string = '';
    foreach ($attrs as $key => $value) {
        $attrs_string .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }

    $svg_path = '';
    $view_box = '0 0 24 24'; //viewBox

    switch ($icon_name) {
        case 'folder':
            $view_box = '0 0 16 16';
            $svg_path = '<path fill-rule="evenodd" d="M3.5 1.5a3 3 0 0 0-3 3V11a3 3 0 0 0 3 3h9a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-5l-.621-.621A3 3 0 0 0 4.757 1.5zm1.25 5a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/>';
            break;
        case 'php':
            $view_box = '0 0 128 128';
            $svg_path = '<path d="M64 30.332C28.654 30.332 0 45.407 0 64s28.654 33.668 64 33.668c35.345 0 64-15.075 64-33.668S99.346 30.332 64 30.332m-5.982 9.81h7.293v.003l-1.745 8.968h6.496q6.132 0 8.458 2.139q2.328 2.14 1.398 6.93l-3.053 15.7h-7.408l2.902-14.929q.495-2.546-.365-3.473q-.86-.925-3.658-.925h-5.828L58.752 73.88h-7.291zM26.73 49.114h14.133q6.379 0 9.305 3.348q2.925 3.347 1.758 9.346q-.481 2.472-1.625 4.52t-2.99 3.745q-2.202 2.06-4.891 2.936q-2.691.876-6.858.875h-6.294l-1.745 8.97h-7.35zm57.366 0h14.13q6.378 0 9.303 3.348h.002q2.926 3.347 1.76 9.346q-.48 2.472-1.623 4.52t-2.992 3.745q-2.2 2.06-4.893 2.936q-2.69.876-6.855.875h-6.295l-1.744 8.97h-7.35zm-51.051 5.325l-2.742 14.12h4.468q4.446.001 6.622-1.673q2.174-1.675 2.937-5.592q.728-3.762-.666-5.309t-5.584-1.547zm57.363 0l-2.744 14.12h4.47q4.446.001 6.622-1.673q2.173-1.675 2.935-5.592q.73-3.762-.664-5.309t-5.584-1.547z"/>';
            break;

        case 'python':
            $svg_path = '<path d="M21.57 9.429c-.354-1.355-1-2.42-2.355-2.42H17.41v2.13c0 1.645-1.42 3.032-2.936 3.032H9.665c-1.322 0-2.355 1.13-2.355 2.452v4.55c0 1.257 1.13 2.032 2.355 2.451c1.485.452 2.936.549 4.775 0c1.194-.355 2.356-1.032 2.356-2.452v-1.807h-4.743v-.58h7.162c1.355 0 1.904-.968 2.355-2.42c.484-1.581.484-3.033 0-4.936m-6.84 9.033c.485 0 .904.42.904.904s-.42.903-.903.903c-.484.032-.904-.42-.904-.903c-.032-.484.387-.904.904-.904m-5.29-6.904h4.775c1.322 0 2.355-1.097 2.355-2.452V4.621c0-1.258-1.097-2.226-2.356-2.452c-1.58-.225-3.323-.225-4.774 0c-2.033.355-2.356 1.097-2.356 2.452v1.807h4.775v.58H5.342c-1.355 0-2.581.872-2.936 2.42c-.452 1.807-.452 2.936 0 4.808c.355 1.42 1.13 2.42 2.549 2.42h1.549v-2.162c-.033-1.581 1.355-2.936 2.936-2.936m-.29-6.356a.923.923 0 0 1-.904-.903c0-.484.42-.904.903-.904s.904.42.904.904s-.42.903-.904.903"/>';
            break;

        case 'html5':
            $svg_path = '<path d="m12 17.56l4.07-1.13l.55-6.1H9.38L9.2 8.3h7.6l.2-1.99H7l.56 6.01h6.89l-.23 2.58l-2.22.6l-2.22-.6l-.14-1.66h-2l.29 3.19zM4.07 3h15.86L18.5 19.2L12 21l-6.5-1.8z"/>';
            break;

        case 'nodejs':
            $view_box = '0 0 128 128';
            $svg_path = '<path d="M64.36.006c-1.045 0-2.091.27-3.027.812l-49.82 28.75l53.63 98.38a6.1 6.1 0 0 0 2.244-.757l50.17-28.97a6.07 6.07 0 0 0 2.607-3.05L64.934.042c-.19-.018-.38-.037-.572-.037zm1.9.32l35.65 61.39l16.86-31.02a6 6 0 0 0-1.211-.926L67.389.82a6 6 0 0 0-1.125-.492zm-55.6 29.79a6.06 6.06 0 0 0-2.518 4.9v57.95a6.06 6.06 0 0 0 1.15 3.537l19.36-33.38l-18-33.01zm108.8 1.408l-16.97 31.21l18.03 31.06q.057-.406.059-.824V35.02a6.05 6.05 0 0 0-1.123-3.496zm-90.25 32.63L9.98 97.304a6 6 0 0 0 1.186.906l50.16 28.97a6.1 6.1 0 0 0 2.682.786l-34.79-63.82z"/>';
            break;

        case 'typescript':
            $svg_path = '<g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="16.5" height="16.5" x="3.75" y="3.75" rx="2"/><path d="M17.25 11.25h-2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-2m-4.75-6v6m-2-6h4"/></g>';
            break;

        case 'wordpress':
            $svg_path = '<path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10s10-4.49 10-10S17.51 2 12 2M3.01 12c0-1.3.28-2.54.78-3.66l4.29 11.75c-3-1.46-5.07-4.53-5.07-8.09M12 20.99c-.88 0-1.73-.13-2.54-.37l2.7-7.84l2.76 7.57c.02.04.04.09.06.12c-.93.34-1.93.52-2.98.52m1.24-13.21c.54-.03 1.03-.09 1.03-.09c.48-.06.43-.77-.06-.74c0 0-1.46.11-2.4.11c-.88 0-2.37-.11-2.37-.11c-.48-.02-.54.72-.05.75c0 0 .46.06.94.09l1.4 3.84l-1.97 5.9l-3.27-9.75c.54-.02 1.03-.08 1.03-.08c.48-.06.43-.77-.06-.74c0 0-1.46.11-2.4.11c-.17 0-.37 0-.58-.01C6.1 4.62 8.86 3.01 12 3.01c2.34 0 4.47.89 6.07 2.36c-.04 0-.08-.01-.12-.01c-.88 0-1.51.77-1.51 1.6c0 .74.43 1.37.88 2.11c.34.6.74 1.37.74 2.48c0 .77-.3 1.66-.68 2.91l-.9 3zm6.65-.09a8.99 8.99 0 0 1-3.37 12.08l2.75-7.94c.51-1.28.68-2.31.68-3.22c0-.33-.02-.64-.06-.92"/>';
            break;

        case 'laravel':
            $svg_path = '<path d="M21.7 6.53c.01.02.01.05.01.08v4.29c0 .1-.06.22-.15.27l-3.61 2.08v4.11c0 .11-.05.21-.15.27l-7.52 4.33c-.02.01-.04.04-.06.04H10s0-.03-.04-.04l-7.52-4.33a.32.32 0 0 1-.15-.27V4.5c0-.05 0-.08.01-.1c0-.01.01-.02.01-.03c0-.02.01-.03.02-.05c0-.01.01-.02.02-.03l.03-.03l.03-.03c.01-.01.02-.02.03-.02L6.2 2.04c.1-.04.22-.04.3 0l3.78 2.17c.01.01.02.01.03.02l.03.03l.03.03c.01.01.02.02.02.03c.01.02.02.03.02.05c0 .01.01.02.01.03c.01.03.01.05.01.1v8l3.14-1.78V6.61c0-.03 0-.06.01-.08l.01-.03s.01-.03.02-.05c0-.01.01-.02.02-.03l.03-.03l.03-.03c.01-.01.02-.02.03-.02l3.78-2.17c.08-.06.2-.06.3 0l3.76 2.17c.01 0 .02.01.03.02l.03.03l.03.03c.01.01.01.02.02.03c.01.02.01.05.02.05s.01 0 .01.03m-.61 4.19V7.15l-3.14 1.8v3.55zm-3.76 6.46V13.6l-6.9 3.94v3.61zM2.91 5v12.18l6.9 3.97v-3.61l-3.6-2.04H6.2c-.01 0-.02 0-.03-.03c-.01 0-.02-.01-.03-.02l-.03-.03c-.01-.01-.01-.02-.02-.03c-.01-.02-.01-.03-.02-.04c0-.02-.01-.03-.01-.04c-.01-.01-.01-.03-.01-.04V6.82zm3.45-2.32L3.23 4.5l3.13 1.78L9.5 4.5zm3.45 10.2V5L6.67 6.82v7.87zm7.83-8.08L14.5 6.61l3.14 1.8l3.13-1.8zm-.31 4.15l-3.14-1.8v3.57l3.14 1.78zM10.12 17L17 13.06l-3.12-1.8L7 15.23z"/>';
            break;

        case 'drupal':
            $svg_path = '<path d="M20.47 14.65c0 .64-.22 1.71-.64 2.45c-.43.75-.75.96-1.39.96c-.74-.11-2.13-2.24-3.08-2.34c-1.18 0-3.63 2.45-5.65 2.45c-1.17 0-1.6-.22-1.92-.43c-.64-.43-.85-1.07-.85-1.92c0-1.6 1.49-2.98 3.3-2.98c2.35 0 3.94 2.34 5.12 2.24c.95 0 2.87-1.92 3.83-1.92c.96-.21 1.28.84 1.28 1.49m-3.84-9.37c-1.06-.64-2.02-.96-3.09-1.6c-.63-.43-1.49-1.38-2.23-2.24c-.31 1.39-.53 1.92-1.07 2.35c-1.06.74-1.6 1.06-2.55 1.49C6.94 5.7 3 8.05 3 13.16S7.37 22 12.05 22c4.8 0 8.95-3.5 8.95-8.73c.21-5.22-3.73-7.57-4.37-7.99"/>';
            break;

        case 'joomla':
            $svg_path = '<path d="M21.93 4.711a2.624 2.624 0 0 0-5.222-.37l-.026-.015c-2.146-.967-3.954.747-3.954.747L7.947 9.878l1.89 1.819l3.848-3.781c1.797-1.797 2.775-.58 2.775-.58c1.353 1.142.047 2.495.047 2.495l1.936 1.866c1.58-1.708 1.672-3.198 1.191-4.383a2.624 2.624 0 0 0 2.295-2.603"/><path d="m19.659 16.779l.014-.027c.968-2.146-.746-3.953-.746-3.953l-4.805-4.782l-1.82 1.89l3.781 3.848c1.797 1.797.581 2.776.581 2.776c-1.143 1.353-2.496.046-2.496.046l-1.865 1.936c1.707 1.58 3.197 1.673 4.382 1.192a2.624 2.624 0 1 0 2.974-2.926"/><path d="m14.163 12.303l-3.849 3.78c-1.797 1.798-2.775.582-2.775.582c-1.353-1.143-.047-2.496-.047-2.496l-1.936-1.866c-1.58 1.707-1.672 3.198-1.192 4.383a2.624 2.624 0 1 0 2.927 2.974l.026.014c2.146.968 3.954-.747 3.954-.747l4.78-4.805z"/><path d="M7.915 10.245c-1.797-1.797-.58-2.776-.58-2.776c1.142-1.353 2.495-.046 2.495-.046l1.866-1.936C9.99 3.907 8.5 3.814 7.313 4.295A2.624 2.624 0 1 0 4.34 7.22l-.014.027c-.968 2.146.746 3.953.746 3.953l4.805 4.781l1.82-1.889z"/>';
            break;

        case 'symfony':
            $svg_path = '<path d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m4.37 3.7c1.02-.03 1.78.43 1.84 1.14c.01.31-.17.91-.79.93c-.47.02-.79-.27-.8-.68c-.01-.16.26-.67.26-.76c-.01-.27-.41-.28-.52-.27c-1.5.05-1.9 2.07-2.22 3.72l-.14.87c.84.13 1.46-.03 1.8-.25c.48-.31-.14-.63-.06-.99c.08-.37.41-.54.67-.55c.37-.01.63.37.62.76c-.03.64-.86 1.52-2.53 1.48c-.22 0-.41-.02-.59-.04c-.61 3.1-.99 4.94-2.35 6.52c-1.17 1.39-2.36 1.6-2.89 1.62c-1 .04-1.67-.49-1.67-1.2c-.03-.68.57-1.06.97-1.07c.53-.02.9.37.91.81c.02.37-.18.49-.31.56c-.07.07-.22.15-.21.3c0 .07.07.22.29.21c.42-.01.69-.22.89-.36c.96-.8 1.34-2.21 1.83-4.77c.26-1.45.45-2.38.73-3.3c-.68-.51-1.1-1.15-2.01-1.38c-.63-.19-1.01-.04-1.28.3c-.31.41-.21.93.09 1.24c1.15 1.28 1.49 1.84 1.36 2.6c-.2 1.21-1.64 2.13-3.34 1.61c-1.45-.45-1.72-1.47-1.55-2.04c.16-.49.55-.59.94-.47c.42.13.58.63.46 1.02c-.02.04-.22.41-.27.53c-.09.31.33.52.62.61c.65.2 1.28-.14 1.43-.67c.15-.48-.15-.82-.28-.95c-.89-.98-1.51-1.85-1.21-2.83c.12-.37.36-.77.72-1.04c.75-.55 1.57-.65 2.34-.41c1.01.27 1.49.94 2.12 1.45c.35-1.02.84-2.03 1.57-2.88c.66-.77 1.54-1.33 2.56-1.37"/>';
            break;

        case 'nextjs':
            $view_box = '0 0 32 32';
            $svg_path = '<path d="M24.306 4.019H19.5L16 9.556l-3-5.537H2L16 28L30 4.019zm-18.825 2h3.363L16 18.406l7.15-12.387h3.363L16.001 24.031z"/>';
            break;

        case 'vue':
            $svg_path = '<path d="M14.5 3L12 7.156L9.857 3H2l10 18L22 3zM4.486 4.5h2.4L12 13.8l5.107-9.3h2.4L12 18.021z"/>';
            break;

        case 'angular':
            $svg_path = '<path d="m12 2.5l8.84 3.15l-1.34 11.7L12 21.5l-7.5-4.15l-1.34-11.7zm0 2.1L6.47 17h2.06l1.11-2.78h4.7L15.45 17h2.05zm1.62 7.9h-3.23L12 8.63z"/>';
            break;

        case 'react':
            $view_box = '0 0 48 48';
            $svg_path = '<path fill="none" stroke-linecap="round" stroke-linejoin="round" d="M11.44 24.76c21.734 0 11.732 18.335 23.027 18.335c3.876 0 5.24-2.934 5.24-2.934M11.44 4.5v39" stroke-width="1"/><path fill="none" stroke-linecap="round" stroke-linejoin="round" d="M8.293 4.5h16.011c6.054 0 10.96 4.535 10.96 10.13q0 0 0 0c0 5.594-4.906 10.13-10.96 10.13H11.46M8.293 43.5h6.293" stroke-width="1"/>';
            break;

        case 'cakephp':
            $svg_path = '<path d="M0 13.875v3.745c0 2.067 5.37 3.743 12 3.743V17.62c-6.63 0-12-1.68-12-3.743zm21.384 2.333L12 13.875v3.745l9.384 2.333C23.02 19.313 24 18.503 24 17.62v-3.745c0 .882-.98 1.692-2.616 2.333M12 10.133v3.742c-6.627 0-12-1.677-12-3.744V6.38c0-2.064 5.37-3.743 12-3.743c6.625 0 12 1.68 12 3.744v3.75c0 .883-.98 1.69-2.616 2.334L12 10.13z"/>';
            break;

        default:
            return '';
    }

    return '<svg xmlns="http://www.w3.org/2000/svg"' . $attrs_string . ' viewBox="' . $view_box . '">' . $svg_path . '</svg>';
}

function darkenColor($color) {
    if (strpos($color, '#') === 0) {

        $hex = str_replace('#', '', $color);

        if (strlen($hex) == 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        $r = max(0, hexdec(substr($hex, 0, 2)) - 40);
        $g = max(0, hexdec(substr($hex, 2, 2)) - 40);
        $b = max(0, hexdec(substr($hex, 4, 2)) - 40);

        return sprintf("#%02x%02x%02x", $r, $g, $b);
    }

    return $color;
}

function generateSiteInfoCards($DomainPostFix) {
    $Directories = glob(dirname(__FILE__) . '/*', GLOB_ONLYDIR);
    $temp = [];
    foreach ($Directories as $key => $value) {
        $temp[] = basename($value);
    }
    natcasesort($temp);

    foreach ($temp as $Dir) {
        if (basename($Dir) == 'asset' || basename($Dir) == 'vendor') {
            continue;
        }
        $FirstChar = strtoupper(substr($Dir, 0, 1));

        // Use detectProjectPlatform to detect platform information
        $platformInfo = detectProjectPlatform($Dir, $DomainPostFix);
        $app_name = $platformInfo['platform'];
        $admin_link = $platformInfo['admin_link'];

        echo '<div class="col-sm-6 col-md-4 col-lg-3"><div class="card u-flex u-justify-space-between u-items-center mx-1 my-2 p-1 u-round-sm">';
        echo '<div class="u-flex u-items-center u-justify-center avatar avatar--sm text-gray-000 mr-1 u-flex-grow-0">';
        echo get_svg($platformInfo['icon'], array(
            'class' => 'svg-icon',
            'width' => '1em',
            'height' => '1em',
        'fill' => darkenColor(stringToColor(strtolower($Dir)))
        ));
        echo '</div>';
        echo '<a class="u-flex u-items-center text-dark u-flex-grow-1" href="https://' . basename($Dir) . '.' . $DomainPostFix . '" target="_blank">';
        echo '<span class="site-name u u-C capitalize">' . basename($Dir) . '</span></a>';

        // Show platform information for all platforms including 'Other'
        if (!empty(trim($app_name))) {
            if (!empty($admin_link)) {
                // With admin link: show platform name + "admin" (clickable)
                echo '<a class="u-flex u-flex-column leading-none text-dark u-flex-grow-0 u u-C u-text-center" href="' . htmlspecialchars($admin_link, ENT_QUOTES, 'UTF-8') . '" target="_blank">';
                echo '<span class="text-xs leading-normal font-light" style="color: #ccc;">' . htmlspecialchars(trim($app_name), ENT_QUOTES, 'UTF-8') . '</span>admin';
                echo '</a>';
            } else {
                // Without admin link: show only platform name (not clickable, gray color)
                echo '<span class="u-flex u-flex-column leading-normal u-flex-grow-0 u-text-center text-xs font-light u-cursor-pointer" style="color: #ccc;">';
                echo htmlspecialchars(trim($app_name), ENT_QUOTES, 'UTF-8');
                echo '</span>';
            }
        }

        echo '</div></div>';
    }
}

if (!function_exists('detectProjectPlatform')) {
    function detectProjectPlatform($folderPath, $domainPostFix = '') {
        $platform = 'Other';
        $icon = 'folder';
        $admin_link = '';
        $baseUrl = 'https://' . basename($folderPath) . '.' . $domainPostFix;

        // Platform detection (check WordPress first via wp-admin)
        $isWordPress = false;
        if (file_exists($folderPath . '/wp-admin') || file_exists($folderPath . '/wp-config.php') || file_exists($folderPath . '/wp-load.php')) {
            $platform = 'WordPress';
            $icon = 'wordpress';
            $admin_link = $baseUrl . '/wp-admin';
            $isWordPress = true;
        } elseif (file_exists($folderPath . '/artisan') && is_dir($folderPath . '/app') && file_exists($folderPath . '/composer.json')) {
            $platform = 'Laravel';
            $icon = 'laravel';
        } elseif ((file_exists($folderPath . '/core') || file_exists($folderPath . '/web/core')) && file_exists($folderPath . '/composer.json')) {
            $platform = 'Drupal';
            $icon = 'drupal';
            $admin_link = $baseUrl . '/user';
        } elseif (file_exists($folderPath . '/administrator') && file_exists($folderPath . '/configuration.php')) {
            $platform = 'Joomla';
            $icon = 'joomla';
            $admin_link = $baseUrl . '/administrator';
        } elseif (file_exists($folderPath . '/bin/console') && file_exists($folderPath . '/composer.json')) {
            $platform = 'symfony';
            $icon = 'solar:settings-bold';
        } elseif (file_exists($folderPath . '/bin/cake') && file_exists($folderPath . '/composer.json')) {
            $platform = 'CakePHP';
            $icon = 'cakephp';
        } elseif (file_exists($folderPath . '/app.py') || file_exists($folderPath . '/main.py') || file_exists($folderPath . '/manage.py') || (is_dir($folderPath . '/static') && file_exists($folderPath . '/requirements.txt'))) {
            $platform = 'Python';
            $icon = 'python';
        } elseif (file_exists($folderPath . '/package.json') && file_exists($folderPath . '/next.config.js')) {
            $platform = 'Next.js';
            $icon = 'nextjs';
        } elseif (file_exists($folderPath . '/package.json') && file_exists($folderPath . '/vue.config.js')) {
            $platform = 'Vue.js';
            $icon = 'vue';
        } elseif (file_exists($folderPath . '/package.json') && file_exists($folderPath . '/angular.json')) {
            $platform = 'Angular';
            $icon = 'angular';
        } elseif (file_exists($folderPath . '/package.json') && file_exists($folderPath . '/react')) {
            $platform = 'React';
            $icon = 'react';
        } else {
            // Detect by file extensions if no framework detected
            $phpFiles = glob($folderPath . '/*.php');
            $tsFiles = array_merge(
                glob($folderPath . '/*.ts') ?: [],
                file_exists($folderPath . '/tsconfig.json') ? [$folderPath . '/tsconfig.json'] : []
            );
            $jsFiles = file_exists($folderPath . '/package.json') ? [$folderPath . '/package.json'] : [];
            $pyFiles = glob($folderPath . '/*.py');
            $htmlFiles = glob($folderPath . '/*.html');
            $indexHtml = file_exists($folderPath . '/index.html');

            if (!empty($phpFiles)) {
                $platform = 'PHP';
                $icon = 'php';
            } elseif (!empty($pyFiles)) {
                $platform = 'Python';
                $icon = 'python';
            } elseif (!empty($htmlFiles) || $indexHtml) {
                $platform = 'HTML5';
                $icon = 'html5';
            } elseif (!empty($tsFiles)) {
                $platform = 'TypeScript';
                $icon = 'typescript';
            } elseif (!empty($jsFiles)) {
                $platform = 'Node.js';
                $icon = 'nodejs';
            }
            // If still no match, it remains 'Other'
        }

        return [
            'platform' => $platform,
            'icon' => $icon,
            'admin_link' => $admin_link
        ];
    }
}

function getMySQLServerVersion() {
    error_reporting(0);
    $laraconfig = parse_ini_file('../usr/laragon.ini');

    $link = mysqli_connect('localhost', 'root', $laraconfig['MySQLRootPassword']);
    if (!$link) {
        $link = mysqli_connect('localhost', 'root', '');
    }
    if (!$link) {
        echo 'MySQL not running!';
    } else {
        printf(" %s\n", htmlspecialchars(mysqli_get_server_info($link)));
    }
}

function generatePhpProbeContent() {
    // Server Information Section
    $serverInfo = [
        'Server Software' => htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'N/A'),
        'Server IP' => htmlspecialchars($_SERVER['SERVER_ADDR'] ?? 'N/A'),
        'Server Name' => htmlspecialchars($_SERVER['SERVER_NAME'] ?? 'N/A'),
        'Server Port' => htmlspecialchars($_SERVER['SERVER_PORT'] ?? 'N/A'),
        'Server Protocol' => htmlspecialchars($_SERVER['SERVER_PROTOCOL'] ?? 'N/A'),
        'Server Time' => date('Y-m-d H:i:s'),
        'Server OS' => php_uname(),
        'CPU Model' => (function() {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                return shell_exec('wmic cpu get name') ? trim(explode("\n", shell_exec('wmic cpu get name'))[1]) : 'N/A';
            } else {
                return file_exists('/proc/cpuinfo')
                    ? trim(explode(':', explode("\n", file_get_contents('/proc/cpuinfo'))[4])[1])
                    : 'N/A';
            }
        })(),
        'Memory Total' => (function() {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $memory = shell_exec('wmic OS get TotalVisibleMemorySize /Value') ?
                    trim(explode('=', shell_exec('wmic OS get TotalVisibleMemorySize /Value'))[1]) : 0;
            } else {
                $memory = file_exists('/proc/meminfo') ?
                     trim(str_replace('kB', '', explode(':', explode("\n", file_get_contents('/proc/meminfo'))[0])[1])) : 0;
            }
            if (is_numeric($memory)) {
                $memoryGB = round($memory / (1024 * 1024), 2); // KB → GB转换
                return $memoryGB . ' GB';
            }
        return 'N/A';
        })(),
        'MySQL Version' => (function() {
            ob_start();
            getMySQLServerVersion();
            $version = ob_get_clean();
            return htmlspecialchars($version);
        })(),
        'Document Root' => htmlspecialchars($_SERVER['DOCUMENT_ROOT'] ?? 'N/A'),
    ];

    echo '<div class="col-sm-6 col-md-6 col-lg-6">';
    echo '<h3 class="text-dark u-items-center my-2">Server Information</h3>';
    echo '<div class="u-flex u-flex-column">';

    $i = 0;
    foreach ($serverInfo as $label => $value) {
        $bgClass = ($i % 2 === 0) ? 'u-round-sm" style="background: hsla(0,0%,0%,0.05)' : '';
        echo '<div class="item u-flex p-1 ' . $bgClass . '">';
        echo '<span class="u-flex u-items-center u-basis-30p">' . $label . '</span>';
        echo '<span class="u-flex u-items-center u-basis-70p">' . $value . '</span>';
        echo '</div>';
        $i++;
    }

    echo '</div></div>';

    // PHP Configuration Section
    $phpConfig = [
        'PHP Version' => phpversion(),
        'PHP SAPI' => php_sapi_name(),
        'Include Path' => defined('DEFAULT_INCLUDE_PATH') ? DEFAULT_INCLUDE_PATH : 'N/A',
        'Zend Engine' => zend_version(),
        'Safe Mode' => ini_get('safe_mode') ? 'On' : 'Off',

        'Memory Limit' => ini_get('memory_limit'),
        'Max Execution Time' => ini_get('max_execution_time') . ' seconds',
        'Post Max Size' => ini_get('post_max_size'),
        'Upload Max Filesize' => ini_get('upload_max_filesize'),
        'Max Input Time' => ini_get('max_input_time') . ' seconds',
        'Max Input Vars' => ini_get('max_input_vars') ?: 'N/A',
        'GD Version' => function_exists('gd_info')
                    ? gd_info()['GD Version']
                    : 'Not Installed',
    ];

    echo '<div class="col-sm-6 col-md-6 col-lg-6">';
    echo '<h3 class="text-dark u-items-center my-2">PHP Configuration</h3>';
    echo '<div class="u-flex u-flex-column">';

    $i = 0;
    foreach ($phpConfig as $label => $value) {
        $bgStyle = ($i % 2 === 0) ? 'u-round-sm" style="background: #eee' : '';
        echo '<div class="item u-flex p-1 ' . $bgStyle . '">';
        echo '<span class="u-flex u-items-center u-basis-30p">' . $label . '</span>';
        echo '<span class="u-flex u-items-center u-basis-70p">' . $value . '</span>';
        echo '</div>';
        $i++;
    }

    echo '</div></div>';

    // Extensions Section
    function display_extension($name, $check) {
        $enabled = (is_callable($check) ? $check() : $check);
        $status = $enabled ? '<svg viewBox="0 0 24 24" width="16" height="16" style="fill: green;"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>' : '<svg viewBox="0 0 24 24" width="16" height="16" style="fill: red;"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>';
        echo <<<HTML
    <div class="item u-flex py-1 w-20p u-border-b">
        <span class="u-flex u-items-center u-basis-70p font-bold">$name</span>
        <span class="u-flex u-items-center u-basis-30p">$status</span>
    </div>
    HTML;
    }

    echo '<div class="col-sm-12">';
    echo '<h3 class="text-dark u-items-center my-2">PHP Extensions</h3>';
    echo '<div class="u-flex u-flex-wrap u-gap-1">';

    display_extension('MySQL', function() { return function_exists('mysql_connect'); });
    display_extension('MySQLi', function() { return function_exists('mysqli_connect'); });
    display_extension('PDO', function() { return class_exists('PDO'); });
    display_extension('PDO_MySQL', function() { return extension_loaded('pdo_mysql'); });
    display_extension('SQLite3', function() { return class_exists('SQLite3'); });
    display_extension('PDO_SQLite', function() { return extension_loaded('pdo_sqlite'); });

    display_extension('GD', function() { return function_exists('gd_info'); });
    display_extension('ImageMagick', function() { return extension_loaded('imagick'); });
    display_extension('GraphicsMagick', function() { return class_exists('Gmagick'); });
    display_extension('Exif', function() { return function_exists('exif_read_data'); });

    display_extension('cURL', function() { return function_exists('curl_init'); });
    display_extension('OpenSSL', function() { return function_exists('openssl_open'); });
    display_extension('Sockets', function() { return function_exists('socket_create'); });

    display_extension('Memcache', function() { return class_exists('Memcache'); });
    display_extension('Memcached', function() { return class_exists('Memcached'); });
    display_extension('Redis', function() { return class_exists('Redis'); });
    display_extension('OPcache', function() { return function_exists('opcache_get_status'); });
    display_extension('APCu', function() { return function_exists('apcu_enabled') && apcu_enabled(); });

    display_extension('mbstring', function() { return function_exists('mb_strlen'); });
    display_extension('iconv', function() { return function_exists('iconv'); });

    display_extension('SimpleXML', function() { return function_exists('simplexml_load_string'); });
    display_extension('DOM', function() { return class_exists('DOMDocument'); });
    display_extension('XMLReader', function() { return class_exists('XMLReader'); });
    display_extension('XMLWriter', function() { return class_exists('XMLWriter'); });

    display_extension('ZIP', function() { return class_exists('ZipArchive'); });
    display_extension('Fileinfo', function() { return function_exists('finfo_open'); });
    display_extension('LDAP', function() { return function_exists('ldap_connect'); });
    display_extension('Phalcon', function() { return extension_loaded('phalcon'); });
    display_extension('Swoole', function() { return extension_loaded('swoole'); });
    display_extension('Xdebug', function() { return extension_loaded('xdebug'); });
    display_extension('ionCube', function() { return extension_loaded('ionCube Loader'); });
    display_extension('Source Guardian', function() { return function_exists('sg_get_const'); });
    display_extension('Zend Optimizer', function() { return function_exists('zend_optimizer_version'); });

    if (function_exists('opcache_get_status')) {
        $opcacheStatus = opcache_get_status(false);
        display_extension('OPcache JIT', !empty($opcacheStatus['jit']['enabled']));
    }

    echo '</div>';

    echo '<div class="item u-flex py-1">';
    echo '<span class="u-flex u-items-center font-bold" style="width:30% !important">All Loaded Extensions</span>';
    $extensions = get_loaded_extensions();
    natcasesort($extensions);
    echo '<ul class="u-flex u-items-center u-flex-wrap">';
    foreach ($extensions as $extension) {
        echo '<li class="u-ext-style u-flex u-items-center u-round-sm">'.$extension.'</li>';
    }
    echo '</ul>';
    echo '</div></div>';

    //Client Info
    function infoRow($label, $content, $is_link = false) {
        $content = $content ?? 'Unknown';
        echo <<<HTML
    <div class="item u-flex py-1 u-border-b">
        <span class="u-flex u-items-center u-basis-30p">$label</span>
        <span class="u-flex u-items-center u-basis-70p">$content</span>
    </div>
    HTML;
    }

    echo '<div class="col-sm-12 mt-4">';
    echo '<h3 class="text-dark u-items-center my-2">Client Information</h3>';
    echo '<div class="u-flex u-flex-column">';

    infoRow('Browser UA', $_SERVER['HTTP_USER_AGENT'] ?? null);
    infoRow('Request Method', $_SERVER['REQUEST_METHOD'] ?? null);
    infoRow('Browser Language (PHP)', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null);

    echo '<div class="item u-flex py-1 u-border-b">
        <span class="u-flex u-items-center u-basis-30p">Screen Resolution</span>
        <span class="u-flex u-items-center u-basis-70p" id="screen-res">Detecting...</span>
    </div>';

    echo '<div class="item u-flex py-1 u-border-b">
        <span class="u-flex u-items-center u-basis-30p">Browser Language (JS)</span>
        <span class="u-flex u-items-center u-basis-70p" id="js-language">Detecting...</span>
    </div>';

    echo '</div></div>';

    echo <<<HTML
    <script>
    document.getElementById('screen-res').textContent = window.screen.width + '×' + window.screen.height;
    document.getElementById('js-language').textContent = navigator.languages ? navigator.languages.join(',') : (navigator.language || navigator.userLanguage || 'Unknown');
    </script>
    HTML;

    // Quick Links
    echo '<div class="col-sm-12">';
    echo '<h3 class="text-dark u-items-center my-2">Quick Links</h3>';
    echo '<div class="u-flex u-flex-wrap u-gap-1">';
    echo '<a href="http://localhost" class="text-dark u u-C">Home</a>';
    echo '<a href="?q=info" class="text-dark u u-C">Full PHP Info</a>';
    echo '<a href="http://localhost/phpmyadmin/" target="_blank" class="text-dark u u-C">phpMyAdmin</a>';
    echo '</div></div>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Laragon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge;"/>
    <link rel="shortcut icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9IiMzNDlhZmYiIGQ9Ik0xMi44NDMuOTc5Yy0yLjEyLS4wOTYtMy40NzcgMS40MzktMy40NzcgMS40MzlDMi41MiAyLjUuNzkxIDguNDI5Ljc1IDguNTUybC0uMjQ4Ljc0Yy0yLjI2OCA4Ljc4IDMuODg5IDEyLjIyIDMuODg5IDEyLjIyYy4xODguMDkxLjM3NS0uMDY2LjM3NS0uMDY2Yy41LS4zMS4yNTItLjUzLjI1Mi0uNTNjLTEuNDMtMS43NDItMS41OTUtNS44NjQtMS41OTYtNS44OTljLS42NC0uNTMyLTEuMjQ4LTEuMzE4LTEuMTExLTIuMzQyYzAgMCAuMDg0LS41MS41ODQtLjE5N2MwIDAgMS4xODYuNjQ0IDIuMTIzLjgzYy0uMDAxIDAgLjQ3Ni4wNDMuNS4xNzdjMCAwIC4zNzQgMS43NTItLjc4IDIuMzJjLjc0NS40MzcgMS40NjUuODUgMS40NjUuODVjLjEyNCAxLjI2My44MSA1LjMyLjgxIDUuMzJjLjA2NC43OTcuOTA2Ljk1NC45MDYuOTU0Yy40ODMuMTcyIDQuMTIuMDYyIDQuMTIuMDYyYzEuMDE0LS4wNDQgMS4wNjItLjk1MyAxLjA2Mi0uOTUzYy4wMTUtLjU0NS4wMy0zLjYyLjAzLTMuNjJjLjA5Ni0uNTc1Ljc2Ni0uNS43NjYtLjVjLjcwMy0uMDMuNjg4LjQ1NC42ODguNDU0Yy0uMDE3LjUxNS4wNDUgMy40OTYuMDQ1IDMuNDk2Yy4wMy44NTguNzgxIDEuMTI1Ljc4MSAxLjEyNWMuNDg4IDAgLjgyOC0uMDA0IDEuMzY1IDBjLjI1Mi4wMDIgMS40NzMgMCAxLjQ3MyAwYy41NS0uMzA3IDEuMzc3LS45NjkgMS4zNzctLjk2OWM1Ljg2OC00LjkxIDQuMTM1LTExLjkgNC4xMzUtMTEuOUMyMi45MyA1Ljg4IDE3Ljc5MiA1LjEgMTcuNzkyIDUuMWMtLjU4Mi0xLjgxMS0xLjY0My0yLjY4Mi0xLjY0My0yLjY4MmMtMS4yMjItMS4wMTUtMi4zNDMtMS4zOTYtMy4zMDYtMS40NHptNS4wMDYgNC4yNzNzMS44NDUgMy4wOC0xLjcyNyA3Ljg2Yy4wMDEuMDAxLTIuOTQgNC4xMTYtOC4yMzIgMS4yMjNjMS4wODQuNTIzIDUuNTM2IDIuMzEyIDguMzc1LTEuOThjMCAwIDIuNjMyLTMuNDM3IDEuNTg0LTcuMTAzTTYuNzAzIDguODY4czEuMjk2LjAzNiAxLjM0MSAxLjgyYzAgMC0xLjAyLTIuNjY4LTMuMjcxLS4yYzAgMCAuNDA0LTEuNzI5IDEuOTMtMS42MiIvPjwvc3ZnPg==">
    <!--<link href="https://unpkg.com/cirrus-ui@latest/dist/cirrus.min.css" rel="stylesheet">-->
    <style>:root{--cirrus-fg:#0f172a;--cirrus-bg:#ffffff;--cirrus-select-bg:rgba(0,161,255,.2);--cirrus-code-bg:rgba(255,218,221,1);--cirrus-code-fg:#dc4753;--cirrus-form-group-bg:rgba(248,249,250,1);--cirrus-form-group-fg:rgba(144,144,144,1);--toast-primary-bg:rgba(49,59,80,.9);--animation-duration:.2s;--focus-opacity:.55;--font-size-xs:.75rem;--font-size-s:.875rem;--font-size-m:1rem;--font-size-l:1.25rem;--font-size-xl:1.5rem;--bg-opacity:1;--color-opacity:1;--border-opacity:1;}*,*::before,*::after{box-sizing:border-box;border:0 solid currentColor;text-rendering:optimizeLegibility;-webkit-tap-highlight-color:transparent;}html,body,p,ol,ul,li,dl,dt,dd,blockquote,figure,fieldset,legend,textarea,pre,iframe,hr,h1,h2,h3,h4,h5,h6{margin:0;padding:0;}html,body{border:none;height:100%;}body{letter-spacing:.01rem;line-height:1.8;font-size:1rem;font-weight:400;font-family:"Nunito Sans",-apple-system,BlinkMacSystemFont,"Segoe UI","Roboto","Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";color:var(--cirrus-fg);}ul{list-style:none;}audio,canvas,img,embed,object,svg,video{display:block;max-width:100%;height:auto;}article,aside,figure,footer,header,hgroup,section{display:block;}button,input,optgroup,select,textarea{margin:0;font-family:inherit;font-size:inherit;}[hidden]{display:none!important;}::selection{background-color:var(--cirrus-select-bg);}:focus{outline:5px auto Highlight;outline:5px auto -webkit-focus-ring-color;}@media (prefers-reduced-motion:reduce){html:focus-within{scroll-behavior:auto}*,*::before,*::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important;scroll-behavior:auto!important}}.text-xs{font-size:.75rem!important;line-height:1.5rem!important;}.text-sm{font-size:.875rem!important;line-height:1.75rem!important;}p,article,blockquote{font-size:1rem;line-height:2;margin-bottom:1rem;}.font-light{font-weight:300;}.font-normal{font-weight:400;}.uppercase{text-transform:uppercase;}.lowercase{text-transform:lowercase;}.capitalize{text-transform:capitalize;}.info{display:block;font-size:var(--font-size-s);margin-top:.25rem;color:#868e96;}.leading-none{line-height:1!important;}.leading-tight{line-height:1.375!important;}.leading-normal{line-height:1.5!important;}.content{max-width:48em;margin:0 auto 1.5em;width:100%;}@media screen and (min-width:1024px){.content{max-width:64em}}@media screen and (min-width:1280px){.content{max-width:80em}}.divider{border-top:.05rem solid rgba(173,181,189,.5);height:.1rem;margin:1.8rem 0 1.6rem;position:relative;}.row{flex:1;flex-wrap:wrap;padding:.5rem 0;display:flex}.row::after{content:"";clear:both;display:table;}.row.row--no-wrap{flex-wrap:nowrap;overflow-x:auto}.row .col{display:block;flex:1;padding:.15rem .75rem;}.row [class^=col-],.row [class*=" col-"]{width:100%;margin-left:0;padding:0 .5rem;}@media screen and (min-width:640px){.row .col-sm-6{width:50%}}@media screen and (min-width:768px){.row .col-md-4{width:33.3333333333%}}@media screen and (min-width:1024px){.row .col-lg-3{width:25%}}@media screen and (max-width:767px){.container{width:100%}.row{margin-top:0}.divided>.row [class^=col-],.divided>.row [class*=" col-"]{box-shadow:0 -1px 0 0 rgba(34,36,38,.15)}}.text-dark{--btn-fg:54,54,54;--btn-border-color:54,54,54;color:rgba(54,54,54,var(--color-opacity))!important;border-color:rgba(54,54,54,var(--border-opacity));}.text-gray-000{--btn-fg:248,249,250;--btn-border-color:248,249,250;color:rgba(248,249,250,var(--color-opacity))!important;border-color:rgba(248,249,250,var(--border-opacity));}.mt-0,.my-0{margin-top:0!important;}.mb-0,.my-0{margin-bottom:0!important;}.ml-1,.mx-1{margin-left:.5rem!important;}.mr-1,.mx-1{margin-right:.5rem!important;}.mt-2,.my-2{margin-top:1rem!important;}.mb-2,.my-2{margin-bottom:1rem!important;}.mt-3,.my-3{margin-top:1.5rem!important;}.m-8{margin:4rem!important;}.mt-8,.my-8{margin-top:4rem!important;}.p-1{padding:.5rem!important;}.p-4{padding:2rem!important;}.footer{background-color:#343a40;padding:6rem 0;text-align:center;margin-top:5rem;width:100%;}.footer.footer--fixed{bottom:0;position:fixed;}.footer p{color:#868e96;}.header{flex-grow:1;width:100%;z-index:100;margin-bottom:20px;box-shadow:0 3px 15px rgba(57,63,72,.1);background-color:var(--cirrus-bg);max-height:100vh;padding:0 2rem;transition:all .3s;display:flex;--header-link-color:#495057;--header-link-color-hover:#606a73}.header h1,.header h2,.header h3,.header h4,.header h5,.header h6{margin:0;}.header a{color:var(--header-link-color);}.header a:hover{color:var(--header-link-color-hover);}.header.header-dark{background-color:rgba(0,0,0,.87);color:#fff;--header-link-color:#fff;--header-link-color-hover:#fff}.header.header-animated .header-nav{transition:all .3s;}.header .header-nav{overflow:auto;}.header .header-brand{align-items:stretch;display:flex;flex-shrink:0;max-width:100vw;min-height:3.25rem;overflow-x:auto;overflow-y:hidden;}.header.header-fixed{position:fixed;top:0}.header:not(.header-clear) .nav-item:not(.no-hover):hover,.header:not(.header-clear) .nav-item:not(.no-hover).hovered{background-color:rgba(216,216,216,.15);transition:all .3s;}.header:not(.header-clear) .nav-item.active,.header:not(.header-clear) .nav-item.active:hover{background-color:rgba(216,216,216,.35);}.header .nav-btn{cursor:pointer;display:block;height:3.5rem;position:relative;width:3.5rem;}.header .btn,.header button,.header [type=submit],.header [type=reset],.header [type=button]{margin:0;}.nav-menu{transition:all .3s;}.nav-menu .has-sub{position:relative;}.nav-overflow-x{justify-content:inherit;overflow-x:scroll;}.nav-item{align-items:center;display:flex;position:relative;flex-grow:0;flex-shrink:0;justify-content:center;transition:all .3s;padding:0 .3rem;cursor:pointer}.nav-item div{cursor:default;}.nav-item a{align-items:center;display:flex;}.nav-item .dropdown-menu{background-color:var(--cirrus-bg);position:absolute;top:95%;z-index:1000;float:left;min-width:160px;padding:5px 0;margin:2px 0 0;font-size:14px;text-align:left;list-style:none;background-clip:padding-box;border:1px solid #e9ecef;border-radius:0 0 4px 4px;box-shadow:0 .5rem 1rem rgba(10,10,10,.1)}.nav-item .dropdown-menu.dropdown-animated{transition:all var(--animation-duration);}.nav-item .dropdown-menu>li>a{display:block;padding:.5rem 1rem;clear:both;line-height:1.42857143;white-space:nowrap;}.nav-item .dropdown-menu>li{margin:0;transition:all .3s;}.nav-item .dropdown-menu>li:hover{transition:all .3s;background-color:rgba(216,216,216,.15);}.nav-item .dropdown-menu>li:active{transition:all .3s;background-color:rgba(216,216,216,.25);}.nav-item .dropdown-menu>li:last-child{margin-bottom:0;}.nav-item .dropdown-menu .dropdown-menu-divider{border:none;background-color:rgba(216,216,216,.15);height:1px;margin:.5rem 0;}.nav-item.has-sub .nav-dropdown-link{padding-right:2.5rem;position:relative}.nav-item.has-sub .nav-dropdown-link::after{border:2px solid #f03d4d;border-right:0;border-top:0;display:block;height:.5em;width:.5em;content:" ";transform:rotate(-45deg);pointer-events:none;margin-top:-.235em;right:1.5em;top:50%;position:absolute;}.nav-nohover:hover{background-color:inherit!important}.nav-item .dropdown-menu.dropdown-dark,.header.header-dark .dropdown-menu{background-color:rgba(0,0,0,.87);border:1px solid #343a40;color:#fff;}.header.header-dark .nav-item.has-sub .nav-dropdown-link::after{border-color:#fff!important;}.dropdown-menu.dropdown-shown,.nav-item.active{opacity:1;}@media screen and (min-width:768px){.header{align-items:stretch;display:flex}.header .header-nav{flex-grow:1;align-items:stretch;display:flex;position:relative;text-align:center;width:100%;top:0;overflow:visible}.header .nav-left{align-items:stretch;flex-basis:0;flex-grow:1;flex-shrink:0;display:flex;justify-content:flex-start;white-space:nowrap}.header .nav-left .has-sub .dropdown-menu{left:0;right:auto}.header .nav-right{align-items:stretch;flex-basis:0;flex-grow:1;flex-shrink:0;display:flex;justify-content:flex-end;white-space:nowrap}.header .nav-right .has-sub .dropdown-menu{left:auto;right:0}.header .nav-center{align-items:stretch;display:flex;flex-grow:0;flex-shrink:0;justify-content:center;margin-left:auto;margin-right:auto}.header .nav-btn{display:none}.header .nav-item{}.header .nav-item a{padding:.5rem 1rem}.header .nav-item .dropdown-menu{opacity:0;pointer-events:none}.header .nav-item .dropdown-menu.dropdown-animated{transform:translateY(-5px)}.header .nav-item .dropdown-menu.dropdown-shown,.header .nav-item.toggle-hover:hover .dropdown-menu,.header .nav-item .dropdown-menu.dropdown-animated.dropdown-shown{opacity:1;transform:none;pointer-events:auto}}@media screen and (max-width:767px){.header{flex-direction:column}.header .header-brand .nav-item:first-child{padding:0 1rem}.header .header-nav{height:0}.header .header-nav.active{height:100vh}.header .header-nav .nav-item{padding:1rem}.header .header-nav .nav-item>a{padding:0;width:100%}.nav-item.has-sub{display:block}.nav-item.has-sub .dropdown-menu{display:none}.nav-item.has-sub .dropdown-menu.dropdown-shown{border-radius:0;box-shadow:none;display:block;position:relative;top:1rem;float:none;border:none;background-color:transparent;margin-bottom:1rem}.nav-item.has-sub .dropdown-menu.dropdown-dark{background-color:rgba(0,0,0,.17);border:0}.nav-btn{cursor:pointer;display:block;position:relative;margin-left:auto}.nav-btn span{background-color:var(--header-link-color);display:block;height:2px;left:50%;margin-left:-7px;position:absolute;top:50%;transition:all 86ms ease-out;width:15px}.nav-btn span:nth-child(1){margin-top:-6px}.nav-btn span:nth-child(2){margin-top:-1px}.nav-btn span:nth-child(3){margin-top:4px}.nav-btn.active span:nth-child(1){margin-left:-5px;transform:rotate(45deg);transform-origin:left top}.nav-btn.active span:nth-child(2){opacity:0}.nav-btn.active span:nth-child(3){margin-left:-5px;transform:rotate(-45deg);transform-origin:left bottom}.nav-left,.nav-center,.nav-right{overflow:hidden}.header .nav-item.has-sub.toggle-hover:not(.no-hover):hover>.dropdown-menu{border-radius:0;box-shadow:none;display:block;position:relative;top:1rem;float:none;border:none;background-color:transparent;margin-bottom:1rem}}a{color:#5e5cc7;font-weight:600;text-decoration:none;transition:all .3s;}a:hover{color:#4643e2;transition:all .3s;}a.underline{text-decoration:underline;}h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,article a,blockquote a{display:inline;}ul,ol{margin:1rem 0 1rem 1rem;padding-inline-start:.5rem}ul ul,ul ol,ol ul,ol ol{margin:0 0 0 1rem;}ul{list-style:disc}ul ul{list-style-type:circle;}ul ul ul{list-style-type:square;}ol ol{list-style:lower-alpha;}ol ol ol{list-style:upper-roman;}dl{margin:1rem 0;}dt{font-weight:700;}dd{margin-bottom:.5rem;}li{margin:.25rem 0;}ul{}ul.no-bullets{list-style:none;}ul.menu{font-size:1rem;list-style:none;margin:.5rem 0;}ul .menu-title:not(:first-child){margin-bottom:1rem;}ul .menu-title:not(:last-child){margin-top:1rem;}ul .menu-item>a:first-child,ul .menu-item>div:first-child,ul .menu-item>span:first-child{color:#495057;display:block;padding:.5em .75em;border-radius:3px;font-size:var(--font-size-s);transition:all var(--animation-duration);}ul .menu-item:hover>a:first-child,ul .menu-item:hover>div:first-child,ul .menu-item:hover>span:first-child{background-color:rgba(208,208,208,.3);color:#f03d4d;transition:all var(--animation-duration);}ul .menu-item.selected>a:first-child,ul .menu-item.selected>div:first-child,ul .menu-item.selected>span:first-child{color:#fff;background-color:#f03d4d;}ul .menu-item .menu-addon{z-index:1;position:relative;color:var(--cirrus-fg);cursor:pointer;transition:all var(--animation-duration);}ul .menu-item .menu-addon .icon{font-size:inherit;vertical-align:auto;}ul .menu-item .menu-addon:hover{transition:all var(--animation-duration);}ul .menu-item.selected .menu-addon{color:#fff;}ul .menu-item ul{border-left:1px solid #dee2e6;margin:.75rem;padding-left:.75rem;}ul .divider{border-top:.1rem solid #e9ecef;height:.1rem;margin:1rem 0;}ul .divider::after{content:attr(data-label);background-color:var(--cirrus-bg);color:#adb5bd;display:inline-block;padding:0 .7rem;margin:.5rem;font-size:.7rem;transform:translateY(-1.1rem);}.u-flex{display:flex!important;}.u-inline-flex{display:inline-flex!important;}.u-flex-column{flex-direction:column!important;}.u-justify-space-between{justify-content:space-between!important;}.u-items-center{align-items:center!important;}.u-flex-grow-0{flex-grow:0!important;}.u-flex-grow-1{flex-grow:1!important;}.u-text-center{text-align:center!important;}.avatar{border-radius:50%;position:relative;display:block;margin:auto;font-size:1.5rem;font-weight:lighter;width:3.2rem;height:3.2rem;background-color:#f03d4d;overflow:hidden}.avatar::before{content:attr(data-text);color:currentColor;left:50%;top:50%;position:absolute;transform:translate(-50%,-50%);}.avatar.avatar--xs{font-size:.8rem;width:1.6rem;height:1.6rem;}.avatar.avatar--sm{font-size:1rem;width:2.4rem;height:2.4rem;}.avatar img.padded{padding:.5rem;width:100%;}.card{background-color:#fff;backface-visibility:hidden;border-radius:5px;box-shadow:0 5px 12px 0 rgba(42,51,83,.12),0 0 5px rgba(0,0,0,.06);margin-bottom:1rem;overflow:hidden;position:relative;transition:all .3s}.card:hover{transition:all .3s;box-shadow:0 8px 20px 0 rgba(42,51,83,.12),0 5px 5px rgba(0,0,0,.06);}.u{display:inline;position:relative}.u::after{content:"";transition:all .3s;backface-visibility:hidden;position:absolute;height:2px;width:0;background:currentColor;bottom:-.25em;}.u:hover::after{width:100%;}.u.u-LR::after{left:0;}.u.u-LR::after{left:0;}.u.u-RL::after{right:0;}.u.u-RL:hover::after{width:100%;}.u.u-C::after{left:50%;transform:translateX(-50%);}.u-basis-30p{flex-basis:30% !important}.u-basis-50p{flex-basis:50% !important}.u-basis-70p{flex-basis:70% !important}@media screen and (min-width:768px){.w-20p{width:calc(20% - 16px)!important}}.u-border-b{border-bottom:1px dashed hsla(0,0%,0%,0.3)}.px-1{padding-left:0.5rem !important;padding-right:0.5rem !important}.py-1{padding-top:0.5rem !important;padding-bottom:0.5rem !important}.u-gap-1{column-gap:20px !important}.text-error{color:#fb4143}.text-success{color:#0dd157}.font-bold{font-weight:600}.u-flex-wrap{flex-wrap:wrap !important}.u-ext-style{list-style:none;background:hsla(0,0%,0%,0.05);padding:0 6px;margin:3px;}.u-round-sm {border-radius: 0.5rem !important;}.avatar:has(img),.avatar:has(svg){background-color: #eee;}.avatar svg {width: 70%;height: 70%;display: block;}.u-cursor-pointer {cursor: pointer;}.u-justify-center {justify-content: center !important;}</style>
    <script>document.addEventListener("DOMContentLoaded",function(){var a=document.getElementById("header-btn"),b=document.getElementById("header-menu"),c=document.getElementById("left-dropdown");a.addEventListener("click",function(d){d.stopPropagation(),b.classList.toggle("active")}),document.addEventListener("click",function(d){b.contains(d.target)||c.contains(d.target)||b.classList.remove("active")}),c.addEventListener("click",function(a){a.stopPropagation()})});</script>
</head>
<body>
<div class="page-wrapper" style="display: flex;flex-direction: column;min-height: 100vh;">
<header id="header" class="header header-fill header-fixed no-transition header-dark header-animated">
    <div class="header-brand">
        <div class="nav-item no-hover">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" class="mr-1" viewBox="0 0 24 24"><path fill="#349aff" d="M12.843.979c-2.12-.096-3.477 1.439-3.477 1.439C2.52 2.5.791 8.429.75 8.552l-.248.74c-2.268 8.78 3.889 12.22 3.889 12.22c.188.091.375-.066.375-.066c.5-.31.252-.53.252-.53c-1.43-1.742-1.595-5.864-1.596-5.899c-.64-.532-1.248-1.318-1.111-2.342c0 0 .084-.51.584-.197c0 0 1.186.644 2.123.83c-.001 0 .476.043.5.177c0 0 .374 1.752-.78 2.32c.745.437 1.465.85 1.465.85c.124 1.263.81 5.32.81 5.32c.064.797.906.954.906.954c.483.172 4.12.062 4.12.062c1.014-.044 1.062-.953 1.062-.953c.015-.545.03-3.62.03-3.62c.096-.575.766-.5.766-.5c.703-.03.688.454.688.454c-.017.515.045 3.496.045 3.496c.03.858.781 1.125.781 1.125c.488 0 .828-.004 1.365 0c.252.002 1.473 0 1.473 0c.55-.307 1.377-.969 1.377-.969c5.868-4.91 4.135-11.9 4.135-11.9C22.93 5.88 17.792 5.1 17.792 5.1c-.582-1.811-1.643-2.682-1.643-2.682c-1.222-1.015-2.343-1.396-3.306-1.44zm5.006 4.273s1.845 3.08-1.727 7.86c.001.001-2.94 4.116-8.232 1.223c1.084.523 5.536 2.312 8.375-1.98c0 0 2.632-3.437 1.584-7.103M6.703 8.868s1.296.036 1.341 1.82c0 0-1.02-2.668-3.271-.2c0 0 .404-1.729 1.93-1.62"/></svg>
            <strong>Laragon</strong>
        </div>

        <div class="nav-item nav-btn" id="header-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="header-nav" id="header-menu">
        <div class="nav-left">
            <div class="nav-item text-center">
                <a href="http://localhost">
                    Home
                </a>
            </div>
            <div class="nav-item has-sub toggle-hover" id="left-dropdown">
                <a class="nav-dropdown-link">Tools</a>
                <ul class="dropdown-menu dropdown-animated" role="menu">
                    <li role="menuitem"><a href="http://localhost/phpmyadmin/" target="_blank">PhpMyAdmin</a></li>
                    <li role="menuitem"><a href="http://localhost/?q=probe">PHP Probe</a></li>
                    <li role="menuitem"><a href="http://localhost/?q=info" target="_blank">PHP Info</a></li>
                    <li class="divider"></li>
                    <li role="menuitem"><a href="http://localhost/redis/?overview" target="_blank">Redis WA</a></li>
                    <li role="menuitem"><a href="http://localhost/memcached/" target="_blank">Memecached WA</a></li>
                </ul>
            </div>
            <div class="nav-item text-center">
                <a href="https://github.com/leokhoa/laragon/discussions" target="_blank">
                   Help
                </a>
            </div>
            <div class="nav-item text-center nav-nohover">
                <a class="nav-link" aria-disabled="true">PHP: <?php print phpversion(); ?></a>
            </div>
        </div>
        <div class="nav-right">
           <?php
            $greeting = getGreeting(); echo '<div class="nav-item nav-nohover">' . $greeting . '!</div>';
            ?>
        </div>
    </div>
</header>

<div class="container mt-8" style="flex: 1;">
    <div class="content row">
        <?php //generateSiteInfoCards($DomainPostFix); ?>
        <?php
            if (isset($_GET['q'])) {
                switch ($_GET['q']) {
                    case 'probe':
                        echo '<div class="row">';
                        generatePhpProbeContent();
                        echo '</div>';
                        break;
                    default:
                        echo '<div class="row">';
                        generateSiteInfoCards($DomainPostFix);
                        echo '</div>';
                }
            } else {
                echo '<div class="row">';
                generateSiteInfoCards($DomainPostFix);
                echo '</div>';
            }
            ?>
    </div>
</div>

<footer class="footer p-4 mt-3 mb-0">
        <div class="info mt-0">
            <p class="text-sm mb-0"><?php print($_SERVER['SERVER_SOFTWARE']); ?></p>
            <p class="text-sm mb-0">PHP version: <?php print phpversion(); ?> and MYSQL version:<?php echo getMySQLServerVersion(); ?></p>
            <p class="text-sm mb-0">Document Root: <?php print($_SERVER['DOCUMENT_ROOT']); ?></p>
            <p class="text-sm mb-0"><?php echo "&copy; " . htmlspecialchars(date('Y')) . ", <a href=\"https://ietheme.com\" target=\"_blank\">Jerry</a>." ." Made with &hearts; and powered by " ."<a href=\"https://laragon.org/\" target=\"_blank\">Laragon</a>";?>
            </p>
        </div>
</footer>
</div>
</body>
</html>