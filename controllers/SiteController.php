<?php

namespace app\controllers;

use app\models\forms\HashLinkForm;
use app\models\HashLink;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     *
     */
    public function actionShortLink()
    {
        $modelForm = new HashLinkForm();
        $shortLink = "";
        $isLoad = $modelForm->load(Yii::$app->request->post());
        if($isLoad && $modelForm->validateLink()) {
            $model = new HashLink();
            $model->link = $modelForm->link;
            $shortLink = $model->generateShortLink();
        }
        return $this->render('short-link',["model"=>$modelForm,"shortLink"=>$shortLink]);
    }

}
