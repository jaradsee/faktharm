<?php

namespace app\controllers;

use Yii;
use app\models\Uploads;
use app\models\Friskhead;
use app\models\FriskheadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\html;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use app\models\Prohead;
use app\models\Prodetail;
use app\models\District;



/**
 * FriskheadController implements the CRUD actions for Friskhead model.
 */
class FriskheadController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Friskhead models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FriskheadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Friskhead model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Friskhead model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Friskhead();

        if ($model->load(Yii::$app->request->post()) ) {

            $this->Uploads(false);

            if($model->save()){
                 return $this->redirect(['view', 'id' => $model->risk_id]);
            }

        } else {
             $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        }

        return $this->render('create', [
            'model' => $model,
            'prodetail'=> [],
        ]);
        
    }

    /**
     * Updates an existing Friskhead model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $prodetail         = ArrayHelper::map($this->getProdetail($model->prohead),'id','name');
        


        list($initialPreview,$initialPreviewConfig) = $this->getInitialPreview($model->ref);

        if ($model->load(Yii::$app->request->post())) {
            $this->Uploads(false);

            if($model->save()){
                 return $this->redirect(['view', 'id' => $model->risk_id]);
            }
        } 
        
        return $this->render('update', [
            'model' => $model,
            'prodetail'=> [],
             'initialPreview'=>$initialPreview,
             'initialPreviewConfig'=>$initialPreviewConfig
        ]);
    }

    /**
     * Deletes an existing Friskhead model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //remove upload file & data
        $this->removeUploadDir($model->ref);
        Uploads::deleteAll(['ref'=>$model->ref]);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Friskhead model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Friskhead the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Friskhead::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetProdetail() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $prohead_id = $parents[0];
                $out = $this->getProdetail($prohead_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionGetDistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
               $data = $this->getDistrict($amphur_id);      
               echo Json::encode(['output'=>$data, 'selected'=>'']);
               return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    protected function getProdetail($id){
        $datas = Prodetail::find()->where(['PROHEAD_ID'=>$id])->all(); 
        return $this->MapData($datas,'PRODETAIL_ID','PRODETAIL_NAME');
    }

    protected function getDistrict($id){
        $datas = District::find()->where(['AMPHUR_ID'=>$id])->all(); 
        return $this->MapData($datas,'DISTRICT_ID','DISTRICT_NAME');
    }

    protected function MapData($datas,$fieldId,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
        }
        return $obj;
    }
    /*|*********************************************************************************|
  |================================ Upload Ajax ====================================|
  |*********************************************************************************|*/

    public function actionUploadAjax(){
           $this->Uploads(true);
     }

    private function CreateDir($folderName){
        if($folderName != NULL){
            $basePath = Friskhead::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(Friskhead::getUploadPath().$dir);
    }

    private function Uploads($isAjax=false) {
             if (Yii::$app->request->isPost) {
                $images = UploadedFile::getInstancesByName('upload_ajax');
                if ($images) {

                    if($isAjax===true){
                        $ref =Yii::$app->request->post('ref');
                    }else{
                        $Friskhead = Yii::$app->request->post('Friskhead');
                        $ref = $Friskhead['ref'];
                    }
                   
                    $this->CreateDir($ref);

                    foreach ($images as $file){
                        $fileName       = $file->baseName . '.' . $file->extension;
                        $realFileName   = md5($file->baseName.time()) . '.' . $file->extension;
                        $savePath       = Friskhead::UPLOAD_FOLDER.'/'.$ref.'/'. $realFileName;
                        if($file->saveAs($savePath)){

                            if($this->isImage(Url::base(true).'/'.$savePath)){
                                 $this->createThumbnail($ref,$realFileName);
                            }
                          
                            $model                  = new Uploads;
                            $model->ref             = $ref;
                            $model->file_name       = $fileName;
                            $model->real_filename   = $realFileName;
                            $model->save();

                            if($isAjax===true){
                                echo json_encode(['success' => 'true']);
                            }
                            
                        }else{
                            if($isAjax===true){
                                echo json_encode(['success'=>'false','eror'=>$file->error]);
                            }
                        }
                        
                    }
                }
            }
    }

    private function getInitialPreview($ref) {
            $datas = Uploads::find()->where(['ref'=>$ref])->all();
            $initialPreview = [];
            $initialPreviewConfig = [];
            foreach ($datas as $key => $value) {
                array_push($initialPreview, $this->getTemplatePreview($value));
                array_push($initialPreviewConfig, [
                    'caption'=> $value->file_name,
                    'width'  => '120px',
                    'url'    => Url::to(['/friskhead/deletefile-ajax']),
                    'key'    => $value->upload_id
                ]);
            }
            return  [$initialPreview,$initialPreviewConfig];
    }

    public function isImage($filePath){
            return @is_array(getimagesize($filePath)) ? true : false;
    }

    private function getTemplatePreview(Uploads $model){     
            $filePath = Friskhead::getUploadUrl().$model->ref.'/thumbnail/'.$model->real_filename;
            $isImage  = $this->isImage($filePath);
            if($isImage){
                $file = Html::img($filePath,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
            }else{
                $file =  "<div class='file-preview-other'> " .
                         "<h2><i class='glyphicon glyphicon-file'></i></h2>" .
                         "</div>";
            }
            return $file;
    }

    private function createThumbnail($folderName,$fileName,$width=250){
      $uploadPath   = Friskhead::getUploadPath().'/'.$folderName.'/'; 
      $file         = $uploadPath.$fileName;
      $image        = Yii::$app->image->load($file);
      $image->resize($width);
      $image->save($uploadPath.'thumbnail/'.$fileName);
      return;
    }
    
    public function actionDeletefileAjax(){

        $model = Uploads::findOne(Yii::$app->request->post('key'));
        if($model!==NULL){
            $filename  = Friskhead::getUploadPath().$model->ref.'/'.$model->real_filename;
            $thumbnail = Friskhead::getUploadPath().$model->ref.'/thumbnail/'.$model->real_filename;
            if($model->delete()){
                @unlink($filename);
                @unlink($thumbnail);
                echo json_encode(['success'=>true]);
            }else{
                echo json_encode(['success'=>false]);
            }
        }else{
          echo json_encode(['success'=>false]);  
        }
    }
}
