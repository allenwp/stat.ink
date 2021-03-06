<?php
/**
 * @copyright Copyright (C) 2015 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@bouhime.com>
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\components\web\Controller;

class UserController extends Controller
{
    public $layout = "main.tpl";

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    'edit-password',
                    'edit-profile',
                    'login',
                    'logout',
                    'profile',
                    'register',
                    'slack-add',
                    'slack-delete',
                    'slack-suspend',
                    'slack-test',
                ],
                'rules' => [
                    [
                        'actions' => [
                            'login',
                            'register',
                        ],
                        'roles' => ['?'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'edit-password',
                            'edit-profile',
                            'logout',
                            'profile',
                            'slack-add',
                            'slack-delete',
                            'slack-suspend',
                            'slack-test',
                        ],
                        'roles' => ['@'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'edit-password' => [ 'get', 'post' ],
                    'edit-profile'  => [ 'get', 'post' ],
                    'language'      => [ 'post' ],
                    'login'         => [ 'get', 'post' ],
                    'register'      => [ 'get', 'post' ],
                    'slack-add'     => [ 'get', 'post' ],
                    'slack-delete'  => [ 'post' ],
                    'slack-suspend' => [ 'post' ],
                    'slack-test'    => [ 'post' ],
                    'timezone'      => [ 'post' ],
                    '*'             => [ 'get' ],
                ],
            ],
        ];
    }

    public function actions()
    {
        $prefix = 'app\actions\user';
        return [
            'download'      => [ 'class' => $prefix . '\DownloadAction' ],
            'edit-password' => [ 'class' => $prefix . '\EditPasswordAction' ],
            'edit-profile'  => [ 'class' => $prefix . '\EditProfileAction' ],
            'language'      => [ 'class' => $prefix . '\LanguageAction' ],
            'login'         => [ 'class' => $prefix . '\LoginAction' ],
            'logout'        => [ 'class' => $prefix . '\LogoutAction' ],
            'profile'       => [ 'class' => $prefix . '\ProfileAction' ],
            'register'      => [ 'class' => $prefix . '\RegisterAction' ],
            'slack-add'     => [ 'class' => $prefix . '\SlackAddAction' ],
            'slack-delete'  => [ 'class' => $prefix . '\SlackDeleteAction' ],
            'slack-suspend' => [ 'class' => $prefix . '\SlackSuspendAction' ],
            'slack-test'    => [ 'class' => $prefix . '\SlackTestAction' ],
            'timezone'      => [ 'class' => $prefix . '\TimezoneAction' ],
        ];
    }
}
