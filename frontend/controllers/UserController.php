<?php
namespace frontend\controllers;

use common\models\searchUrl;
use common\models\Url;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\models\User;
use yii\web\NotFoundHttpException;
//* User controller handles user-specific actions.

class UserController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Displays the user panel with statistics and information.
     *
     * @return string The rendered view.
     */
    public function actionPanel()
    {
        $this->layout = 'panel';
        $user = Yii::$app->user->identity;

        // Retrieve URL count and click count for the user

        $urlCount = Url::find()->where(['user_id' => $user->id])->count();
        $clickCount = Url::find()->where(['user_id' => $user->id])->sum('click_count');

        return $this->render('panel', [
            'user' => $user,
            'urlCount' => $urlCount,
            'clickCount' => $clickCount,
        ]);
    }
    /**
     * Manages the user's URLs with search and filtering.
     *
     * @return string The rendered view.
     */

    public function actionUrlManagement()
    {
        $this->layout = 'panel';
        $searchModel = new searchUrl();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('url-management', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Shortens a long URL and saves it to the database.
     *
     * @return yii\web\Response|string The rendered view or redirect response.
     */
    public function actionShorten()
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'برای استفاده از این بخش ابتدا باید وارد شوید.');
            return $this->redirect(['site/login']);
        }
        $model = new Url();   // Model to handle URL shortening

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $shortCode = $model->generateShortCode();

            // Store URL and shortened code in the database

            $url = new Url();
            $url->original_url = $model->original_url;
            $url->shortened_url = $shortCode;
            $url->created_at = time();
            $url->user_id = Yii::$app->user->id;
            $url->save();
            return $this->redirect(['view', 'id' => $url->id]);
        }

        return $this->render('shorten', ['model' => $model]);
    }
    /**
     * Displays details of a specific URL.
     *
     * @param int $id The ID of the URL to view.
     * @return string The rendered view.
     * @throws NotFoundHttpException if the URL cannot be found.
     */

    public function actionViewurl($id){
        $this->layout = 'panel';
        $url = Url::findOne($id);
        return $this->render('viewurl', [
            'model' => $url,
        ]);

    }

//    private function generateShortCode($length = 6)
//    {
//        return substr(md5(uniqid(rand(), true)), 0, $length);
//    }


    /**
     * Redirects to the original URL using a shortened URL code.
     *
     * @param string $shortCode The shortened URL code.
     * @return yii\web\Response The redirect response.
     * @throws NotFoundHttpException if the URL is not found.
     */
    public function actionRedirect($shortCode)
    {
        $url = Url::find()->where(['shortened_url' => $shortCode])->one();

        if ($url) {

            $url->click_count += 1;
            $url->save();
            return $this->redirect($url->original_url);
        }

        throw new NotFoundHttpException('URL not found');
    }

    /**
     * Updates details of a specific URL.
     *
     * @param int $id The ID of the URL to update.
     * @return string|yii\web\Response The rendered view or redirect response.
     * @throws NotFoundHttpException if the URL cannot be found.
     */

    public function actionUpdateurl($id)
    {
        $this->layout = 'panel';
        $model = Url::findOne($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['viewurl', 'id' => $model->id]);
        }
        return $this->render('updateurl', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes a specific URL.
     *
     * @param int $id The ID of the URL to delete.
     * @return yii\web\Response The redirect response.
     */
    public function actionDeleteurl($id)
    {
        $url = Url::findOne($id);
        if($url != null){
            $url->delete();
        }
        return $this->redirect(['url-management']);
    }




}
