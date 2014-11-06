<?php namespace OctoDevel\OctoMail;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Octo Mail',
            'description' => 'Create front-end contact forms that allow to send email messages based on custom templates.',
            'author' => 'Octo Devel',
            'icon' => 'icon-envelope'
        ];
    }

    public function registerComponents()
    {
        return [
            'OctoDevel\OctoMail\Components\Template' => 'mailTemplate',
        ];
    }

    public function registerNavigation()
    {
        return [
            'octomail' => [
                'label'       => 'Octo Mail',
                'url'         => Backend::url('octodevel/octomail/templates'),
                'icon'        => 'icon-envelope',
                'permissions' => ['octodevel.octomail.*'],
                'order'       => 500,

                'sideMenu' => [
                    'templates' => [
                        'label'       => 'Templates',
                        'icon'        => 'icon-list-alt',
                        'url'         => Backend::url('octodevel/octomail/templates'),
                        'permissions' => ['octodevel.octomail.access_templates'],
                    ],
                    'recipients' => [
                        'label'       => 'Recipients',
                        'icon'        => 'icon-envelope-o',
                        'url'         => Backend::url('octodevel/octomail/recipients'),
                        'permissions' => ['octodevel.octomail.access_recipients'],
                    ],
                    'logs' => [
                        'label'       => 'Contact Logs',
                        'icon'        => 'icon-file-text-o',
                        'url'         => Backend::url('octodevel/octomail/logs'),
                        'permissions' => ['octodevel.octomail.access_logs'],
                    ]
                ]
            ]
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'OctoDevel\OctoMail\FormWidgets\JsonRender' => [
                'label' => 'JsonRender',
                'alias' => 'jsonrender'
            ],
            'OctoDevel\OctoMail\FormWidgets\TemplateData' => [
                'label' => 'TemplateData',
                'alias' => 'templatedata'
            ],
            'OctoDevel\OctoMail\FormWidgets\UserAgent' => [
                'label' => 'UserAgent',
                'alias' => 'useragent'
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'octodevel.octomail.access_templates' => ['label' => 'OctoMail - Manage Templates', 'tab' => 'OctoDevel'],
            'octodevel.octomail.access_recipients' => ['label' => 'OctoMail - Manage Recipients', 'tab' => 'OctoDevel'],
            'octodevel.octomail.access_logs' => ['label' => 'OctoMail - View Logs', 'tab' => 'OctoDevel']
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'octodevel.octomail::mail.autoresponse' => 'Send a response email to user when send a message from Octo Mail.',
        ];
    }
}