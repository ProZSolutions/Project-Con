<?php

namespace app\modules\payment\controllers;
use Yii;
use yii\filters\Cors;
use app\modules\payment\models\VehicleCost;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\ArrayHelper; 

class VehicleCostController extends \yii\web\Controller
{
  public function behaviors() {  
    return [
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'index'=>['get'],
        'get-vehicle-cost'=>['get'],
        'create-vehicle-cost'=>['post'],
        'update-vehicle-cost'=>['post'],
        'delete-vehicle-cost' => ['post'],         
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
    $query ->from('vehicle_cost')      
    ->select("`id`, `vehicle_id`, `cost`, `start_date`, `end_date`");           
    $command = $query->createCommand();
    $models = $command->queryAll();   
    $this->setHeader(200);     
    echo json_encode(array('status'=>"success",'data'=>array_filter($models)),JSON_PRETTY_PRINT);    
  }  

  public function actionGetVehicleCost($id) {
    $model=$this->findModel($id);      
    $this->setHeader(200);
    echo json_encode(array('status'=>"success",'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);   
  }  
  public function actionCreateVehicleCost() {       
    $params = Yii::$app->getRequest()->getBodyParams();    
    $model = new VehicleCost();
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

  public function actionUpdateVehicleCost($id) {
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

  public function actionDeleteVehicleCost($id) {
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
    if (($model = VehicleCost::findOne($id)) !== null) {
      return $model;
    }
    else {
      $this->setHeader(400);
      echo json_encode(array('status'=>"error",'data'=>array('message'=>'Bad request')),JSON_PRETTY_PRINT);
      exit;
    }
  }
  
    private function setHeader($status) {    
      $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
      $content_type = "application/json";  
      header($status_header);
      header('Content-type: ' . $content_type);
      header('X-Powered-By: ' . "ProZ Solutions");
    }
    private function _getStatusCodeMessage($status)
    {
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
