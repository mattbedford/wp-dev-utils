<?php

namespace WPDevUtils\Inc;

class Allow_Svg {


    public function __construct()
    {

        add_filter('wp_check_filetype_and_ext', [self::class, 'AllowSvg'], 10, 4);
        add_filter('upload_mimes', [self::class, 'MimeType'], 10, 1);
        add_action('admin_head', [self::class, 'FixSvgOutputAdmin']);


    }



    // Allow SVG
public static function AllowSvg ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = \wp_check_filetype($filename, $mimes);

        return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];

    }

    public static function MimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }


    public static function FixSvgOutputAdmin()
    {
        echo '<style>
            .attachment-266x266, .thumbnail img {
                 width: 100% !important;
                 height: auto !important;
            }
            </style>';
    }




}