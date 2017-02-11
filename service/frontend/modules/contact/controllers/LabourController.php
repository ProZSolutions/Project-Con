<?php

namespace app\modules\contact\controllers;
use Yii;
use app\modules\contact\models\Labour;
use app\modules\payment\models\BankDetails;
use app\modules\payment\models\LabourCost;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\ArrayHelper; 
use yii\helpers\Json;

class LabourController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index'=>['get'],
                    'create-labour-contact' =>['POST'],
                    'update-labour-contact' =>['POST'],
                    'delete-labour-contact' =>['POST'],
                ],
            ],
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
             echo json_encode(array('status'=>"error",'data'=>array('message'=>'method not allowed')),JSON_PRETTY_PRINT);
            exit;          
        }         
        return true;  
    } 

    /**
     * Lists all labour Account models.
     * @return mixed
     */
    public function actionIndex() {         
        $query= new Query;      
        $query->from('labour')  
        ->select("`labour_id`, `name`, `mobile_no`, `alternate_no`, `address`,`bank_id`");           
        $command = $query->createCommand();
        $models = $command->queryAll();       
       
     $one = $models[8]['bank_id'];     

     $arr = json_decode($one);
      print_r($arr->bank_id);
      exit;

 
     


      


        echo json_encode(array('status'=>"success",'data'=>array_filter($models)),JSON_PRETTY_PRINT);   
    }

    /**
     * Displays a single labour Account model.
     * @param integer $id
     *
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new labour Account model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   protected function getbankId($value, $bankDetails) {
        for($i=0; $i<$value; $i++) {           
            $account_no = $bankDetails[$i]['accountNo'];          
            $account_name = $bankDetails[$i]['accountName'];  
            $account_type = $bankDetails[$i]['accountType'];  
            $bank_name = $bankDetails[$i]['bankName'];  
            $branch = $bankDetails[$i]['branch'];
            $ifsc_code = $bankDetails[$i]['ifscCode'];  
             
        $model = new Query;      
        $model ->from('bank_details')  
        ->select("`bank_id`") 
         ->where(['account_name'=>$account_name, 'account_type'=>$account_type,'bank_name'=>$bank_name,'branch'=>$branch,'ifsc_code'=>$ifsc_code]);        
        $command = $model->createCommand();
        $models = $command->queryAll();  
        return $models;       
        } 
    
         
        
        
               
    }
    public function actionCreateLabourContact() {  
        $pars = Yii::$app->getRequest()->getBodyParams(); 
 
        $request = Yii::$app->request;    

        $params = $request->bodyParams;
        
        //print_r(json_encode($params)); 
        /**
         * getting labour contact JSON parameter model. 
        */
        $name = $params['name'];
        $mobile = $params['mobile_no'];
        $alterNo = $params['alternative_no'];
        $address = $params['address'];
        $bankId = $params['bank_id'];
        $type = $params['type'];
        /**
         * getting bank details JSON parameter model. 
        */
        $bankDetails = $params['bankDetails'];

        $value = count($bankDetails);

       // $model =$this->bankDetails($value, $bankDetails);        
        $getBankId = $this->getbankId($value, $bankDetails);

        $accountOne="";
        for($i=0; $i<count($getBankId); $i++)
        {           
        $accountOne=$getBankId[$i]['bank_id'];             
        } 
        print_r($accountOne);
    exit;
        /**
         * passing labour contact JSON parameter model. 
        */        
        $labourContactModel = $this->labourContact($name, $mobile, $alterNo, $address, $labourId, $type);  
        /**
         * getting labour cost JSON parameter model. 
        */
        $labourCost = $params['labourCost'];
        $masonCost = $labourCost['masonCost'];
        $otMason = $labourCost['otMasonCost'];
        $workerCost = $labourCost['workerCost'];
        $otWorker = $labourCost['otWorkerCost'];
        $sqrtCost = $labourCost['sqrtCost'];
        $labourCostModel = $this->labourCost($masonCost, $otMason, $workerCost, $otWorker, $sqrtCost);
        if($model->save()) {
            if($labourContactModel->save()) {
                if($labourCostModel->save()) {
                    echo json_encode(array('status'=>"success",'data'=>array('message'=>'record saved successfully')),JSON_PRETTY_PRINT);
                }
                else{
                    echo json_encode(array('status'=>"error",'data'=>array_filter($labourCostModel->errors)),JSON_PRETTY_PRINT);
                    exit;
                }
            }
            else{
                echo json_encode(array('status'=>"error",'data'=>array_filter($labourContactModel->errors)),JSON_PRETTY_PRINT);
                exit;
            }
        }
        else{
            echo json_encode(array('status'=>"error",'data'=>array_filter($model->errors)),JSON_PRETTY_PRINT);
            exit;
        }
    }
    /**
     * Updates an existing labour Account model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateLabourContact($id)
    {    
        $params = Yii::$app->getRequest()->getBodyParams(); 
        $model = new Labour();
        $model->attributes = $params;     
        $model = $this->findModel($id);
        if ($model->save()) {
            echo json_encode(array('status'=>"success",'data'=>array('message'=>'record updated successfully')),JSON_PRETTY_PRINT);        
        } 
        else {    
            echo json_encode(array('status'=>"error",'data'=>array('message'=>'record not updated')),JSON_PRETTY_PRINT);
        }     
    }
    /**
     * Deletes an existing labour Account model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteLabourContact($id) {
        $model=$this->findModel($id);      
        if($model->delete()) {        
          echo json_encode(array('status'=>"success",'data'=>array('message'=>'record deleted successfully')),JSON_PRETTY_PRINT);    
        }
        else {          
          echo json_encode(array('status'=>"error",'data'=>array('message'=>'record not deleted')),JSON_PRETTY_PRINT);
        }
    }
    /**
     * Finds the Account model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Account the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Labour::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function bankDetails($value, $bankDetails) {
        $model = new BankDetails();
        for($i=0; $i<$value; $i++) {           
            $model->account_no = $bankDetails[$i]['accountNo'];         
            $model->account_name = $bankDetails[$i]['accountName'];  
            $model->account_type = $bankDetails[$i]['accountType'];  
            $model->bank_name = $bankDetails[$i]['bankName'];  
            $model->branch = $bankDetails[$i]['branch'];  
            $model->ifsc_code = $bankDetails[$i]['ifscCode'];           
            return $model;        
        }        
    }
    protected function labourCost($masonCost, $otMason, $workerCost, $otWorker, $sqrtCost) {
        $models = new LabourCost();
        $models->mason_cost = $masonCost;  
        $models->ot_mason_cost= $otMason; 
        $models->worker_cost = $workerCost; 
        $models->ot_worker_cost = $otWorker; 
        $models->sqrt_cost = $sqrtCost;
        $models->labour_id ='1'; 
        return $models;        
    }
    protected function labourContact($name, $mobile, $alterNo, $address, $labourId, $type) {
        $model = new Labour();
        $model->name = $name;  
        $model->mobile_no = $mobile; 
        $model->alternate_no = $alterNo; 
        $model->address = $address;     
        $model->bank_id = $labourId;
        $model->type = $type;   
        return $model;
    }
}
