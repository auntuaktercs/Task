<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
    'tempDir'               => base_path('vendor/mpdf/mpdf/temp/'),
    'font_path' => base_path('storage/fonts/'),
	'font_data' => [
    'bangla' => [
        'R'  => 'kalpurush.ttf',    // regular font
			'useOTL' => 0xFF,
			'useKashida' => 75,
		]
	]
];
