<?php

namespace app\controllers;

use app\models\Marcas;
use app\models\SearchMarcas;
use app\models\Produtos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use Yii;

/**
 * MarcasController implements the CRUD actions for Marcas model.
 */
class MarcasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'], // Permite o acesso apenas para usuários logados
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ]
            ]
        );
    }

    /**
     * Lists all Marcas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchMarcas();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Marcas model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Marcas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreateBackup()
    {
        $model = new Marcas();

        // Obtém todos os produtos disponíveis
        $produtos = Produtos::find()->all();
        /*var_dump($produtos);
        die();*/
        $produtosDropdown = ArrayHelper::map($produtos, 'id', 'nome');

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                echo 'success';
            }else{
                echo 'erro40';
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'produtosDropdown' => $produtosDropdown,
        ]);
    }
    
    /**
     * Creates a new Marcas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Marcas();

        // Obtém todos os produtos disponíveis
        $produtos = Produtos::find()->all();
        /*var_dump($produtos);
        die();*/
        $produtosDropdown = ArrayHelper::map($produtos, 'id', 'nome');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                //echo 'success';
                return $this->asJson(['status' => 'success']);
            }else{
                //echo 'erro40';
                return $this->asJson(['status' => 'erro40']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'produtosDropdown' => $produtosDropdown,
        ]);
    }

    /**
     * Updates an existing Marcas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Obtém todos os produtos disponíveis
        $produtos = Produtos::find()->all();
        /*var_dump($produtos);
        die();*/
        $produtosDropdown = ArrayHelper::map($produtos, 'id', 'nome');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'produtosDropdown' => $produtosDropdown,
        ]);
    }

    /**
     * Deletes an existing Marcas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Marcas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Marcas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Marcas::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
