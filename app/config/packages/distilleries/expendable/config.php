<?php

    return [
        'login_uri'          => 'admin/login',
        'admin_base_uri'     => 'admin',
        'config_file_assets' => base_path() . '/package.json',
        'folder_whiteliste'  => [
            'moximanager'
        ],
        'listener'           => [
            '\Distilleries\Expendable\Listeners\UserListener'
        ],
        'mail'               => [
            'template' => 'admin.templates.mails.default',
            "actions"  => [
                'emails.auth.reminder'
            ],

            'override' => [
                'enabled' => false,
                'to'      => [''],
                'cc'      => [''],
                'bcc'     => ['']
            ]
        ],
        'menu'               => \Distilleries\Expendable\Config\MenuConfig::menu([
            'left' => [
                [
                    'icon'    => 'globe',
                    'action'  => 'Admin\CountryController@getIndex',
                    'libelle' => _('Country'),
                    'submenu' => [
                        [
                            'icon'    => 'th-list',
                            'libelle' => _('List of Country'),
                            'action'  => 'Admin\CountryController@getIndex',
                        ],
                        [
                            'icon'    => 'pencil',
                            'libelle' => _('Add Country'),
                            'action'  => 'Admin\CountryController@getEdit',
                        ]
                    ]
                ],
            ]
        ], 'beginning'),

        'state'              => [
            'Distilleries\Expendable\Contracts\DatatableStateContract' => [
                'color'            => 'bg-green-haze',
                'icon'             => 'th-list',
                'libelle'          => _('Datatable'),
                'extended_libelle' => _('List of %s'),
                'position'         => 0,
                'action'           => 'getIndex'
            ],
            'Distilleries\Expendable\Contracts\FormStateContract'      => [
                'color'            => 'bg-yellow',
                'icon'             => 'pencil',
                'libelle'          => _('Add'),
                'extended_libelle' => _('Detail of %s'),
                'position'         => 2,
                'action'           => 'getEdit'
            ],
            'Distilleries\Expendable\Contracts\ExportStateContract'    => [
                'color'            => 'bg-blue-hoki',
                'icon'             => 'save-file',
                'libelle'          => _('Export'),
                'extended_libelle' => _('Chose date to export %s'),
                'position'         => 1,
                'action'           => 'getExport'
            ]
        ]
    ];