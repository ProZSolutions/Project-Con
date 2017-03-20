<?php

namespace app\modules\attendance\controllers;
use Yii;
use yii\filters\Cors;
use app\modules\attendance\models\LabourAttendance;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\ArrayHelper; 

class LabourAttendanceController extends \yii\web\Controller
{
  public function behaviors() {  
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'index'=>['get'],
          'get-labour-attendance'=>['get'],
          'create-labour-attendance'=>['post'],
          'update-labour-attendance'=>['post'],
          'delete-labour-attendance' => ['post'], 
          'search-labour-attendance' => ['post'],        
        ],        
      ]
    ];
  }

  public function beforeAction($event) {
    $action = $event->id;   
    if (isset($this->actions[$action])) {
      $verbs = $this->actions[$action];
    } 
    elseif (isset($this->actions['*'])) {
    	$verbs = $this->actions['*'];
    } 
    else {
    	return $event->isValid;
    }
    $verb = Yii::$app->getRequest()->getMethod(); 
    $allowed = array_map('strtoupper', $verbs);    
    if (!in_array($verb, $allowed)) {          
    	$this->setHeader(400);
    	echo json_encode(array('status'=>"error",'data'=>array('message'=>'method not allowed')),JSON_PRETTY_PRINT);
    	exit;          
    }         
   	return true;  
  }   
    
  public function actionIndex() {         
    $query= new Query;      
    $query ->from('labour_attendance')      
    ->select("`id`, `labour_id`, `no_of_worker`, `no_of_mazons`, `ot_mazons`, `ot_mazon_hrs`, `ot_workers`, `ot_workers_hrs`, `date_time`");           
    $command = $query->createCommand();
    $models = $command->queryAll();   
    $this->setHeader(200);     
    echo json_encode(array('status'=>"success",'data'=>array_filter($models)),JSON_PRETTY_PRINT);    
  }  

  public function actionGetLabourAttendance($id) {
    $model=$this->findModel($id);      
    $this->setHeader(200);
    echo json_encode(array('status'=>"success",'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);   
  } 

  public function actionCreateLabourAttendance() {       
    $params = Yii::$app->getRequest()->getBodyParams();    
    $model = new LabourAttendance();
    $model->attributes=$params;       
    if ($model->save()) {      
      $this->setHeader(200);
      echo json_encode(array('status'=>"success",'data'=>array('message'=>'record saved successfully')),JSON_PRETTY_PRINT);        
    } 
    else {
      $this->setHeader(400);
      echo json_encode(array('status'=>"error",'data'=>array_filter($model->errors)),JSON_PRETTY_PRINT);
    }     
  } 

  public function actionUpdateLabourAttendance($id) {
    $params = Yii::$app->getRequest()->getBodyParams();  
    $model = $this->findModel($id);  
    $model->attributes=$params;
    if($model->save()) {      
      $this->setHeader(200);
      echo json_encode(array('status'=>"success",'data'=>array('message'=>'record updated successfully')),JSON_PRETTY_PRINT);         
    } 
    else {
      $this->setHeader(400);
      echo json_encode(array('status'=>"error",'data'=>array('message'=>'record not updated')),JSON_PRETTY_PRINT);
    }        
  }  

  public function actionDeleteLabourAttendance($id) {
    $model=$this->findModel($id);      
    if($model->delete()) { 
      $this->setHeader(200);
      echo json_encode(array('status'=>"success",'data'=>array('message'=>'record deleted successfully')),JSON_PRETTY_PRINT);        
    }
    else {         
      $this->setHeader(400);
      echo json_encode(array('status'=>"error",'data'=>array('message'=>'record not deleted')),JSON_PRETTY_PRINT);
    }
  }
      
  protected function findModel($id) { 
    if (($model = LabourAttendance::findOne($id)) !== null) {
      return $model;
    }
    else {
      $this->setHeader(400);
      echo json_encode(array('status'=>"error",'data'=>array('message'=>'Bad request')),JSON_PRETTY_PRINT);
      exit;
    }
  }

  public function actionSearchLabourAttendance() {    
    $StartDate = Yii::$app->request->post('startDate');   
    $EndDate = Yii::$app->request->post('endDate');  
    $LabourId = Yii::$app->request->post('labourId');
    $query = new Query;    
    $query ->select(['labour.name', 'labour_attendance.no_of_mazons'])
      ->from('labour_attendance')  
    ->where(['between', 'labour_attendance.date_time', $StartDate, $EndDate])
    ->andWhere(['=','labour_attendance.labour_id',$LabourId])
    ->innerjoin('labour','labour.labour_id = labour_attendance.labour_id');
    //->innerjoin('project','project.project_id=material_purchased.project_id')
    //->innerjoin('supplier','material_purchased.supplier_id = supplier.supplier_id');
    $command = $query->createCommand();
    $models = $command->queryAll();       
    if($models != null) {
      $this->setHeader(200);     
      echo json_encode(array('status'=>"success",'data'=>array_filter($models)),JSON_PRETTY_PRINT);        
    }
    else {
      $this->setHeader(400);     
      echo json_encode(array('status'=>"error",'data'=>array('message'=>'record not found')),JSON_PRETTY_PRINT);
    }
  }
  
  private function setHeader($status) {    
    $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
    $content_type = "application/json";  
    header($status_header);
    header('Content-type: ' . $content_type);
    header('X-Powered-By: ' . "ProZ Solutions");
  }
  private function _getStatusCodeMessage($status) {
    $codes = Array(
      200 => 'OK.',
      201 =>'A resource was successfully created in response to a POST request. The Location header contains the URL pointing to the newly created resource.',
      204 =>  'The request was handled successfully and the response contains no content.', 
      304 =>  'The resource was not modified.',
      400 =>  'Bad request.',
      401 =>  'Authentication failed.',
      403 =>  'The authenticated user is not allowed to access the specified API endpoint.',
      404 =>  'The resource does not exist.',
      405 =>  'Method not allowed.',
      415 =>  'Unsupported media type.',
      422 =>  'Data validation failed.',
      429 =>  'Too many requests.',
      500 =>  'Internal server error.',     
    );
    return (isset($codes[$status])) ? $codes[$status] : '';
  }
}
