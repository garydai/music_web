<?php

class HomeController extends Controller
{
	public $layout='column1';

	public $g_guest;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}


	
        public function actionIndex()
        {

		$date = date('Y-m-d');
		$date1 = $date.' 23:59:59';
		$this->g_guest = Yii::app()->admin->isGuest;

		$criteria = new CDbCriteria;
		$criteria->condition = 'source ="qq" and date >= "'.$date.'" and date <= "'.$date1.'"';
		$criteria->order = 'date desc';
		
		$qq = Music::model()->findAll($criteria);

                $criteria = new CDbCriteria;
                $criteria->condition = 'source ="xiami" and date >= "'.$date.'" and date <= "'.$date1.'"';


                $criteria->order = 'date desc';

                $xiami = Music::model()->findAll($criteria);


                $criteria = new CDbCriteria;
                $criteria->condition = 'source ="163" and date >= "'.$date.'" and date <= "'.$date1.'"';


                $criteria->order = 'date desc';

                $net = Music::model()->findAll($criteria);

                $this->render('index', array('qq'=>$qq, 'xiami'=>$xiami, 'net'=>$net));




	
        }


	public function actionVote()
	{

		echo Yii::app()->admin->isGuest;
	        if(Yii::app()->admin->isGuest){
        		   $this->redirect(Yii::app()->admin->loginUrl);
	        }
		else
		{
			$id = $_GET['id'];
			$score = $_GET['score'];
			$score += 1;
			Music::model()->updateByPk($id, array('vote'=>$score));
			$this->redirect(Yii::app()->request->urlReferrer);
		}
	}
	
	public function actionSubmit()
	{
		$msg = '';
		if(isset($_POST['msg']))
		{
			$msg=$_POST['msg'];
		}


		
		if($msg != '')
		{

			$m = new Chat;
			$m->ip = Yii::app()->request->userHostAddress;
			$m->user = Yii::app()->request->userHostAddress;
			$m->date =  $date = date('Y-m-d H:i:s');
			$m->content = $msg;
			$m->save();
			
			$criteria = new CDbCriteria;
			$criteria->order = "date asc";	
			$chat = Chat::model()->findAll($criteria);
			
			$html = '';
			foreach($chat as $item)	
			{
				$html.=$this->get_item($item->date, 'xxx', $item->content);
			}
		}
		echo $html;
	}

	public function get_item($date, $name, $content)
	{
		return "<div class='item'><span class='item_date'>$date</span><span class='item_ip'> $name </span><span class='item_content'>$content</span></div>";

	}	
        public function actionLoadMsg()
        {

                $criteria = new CDbCriteria;
                $criteria->order = "date asc";
                $chat = Chat::model()->findAll($criteria);

                $html = '';
                foreach($chat as $item)
                {
			$html.=$this->get_item($item->date, 'xxx', $item->content);

	        }
                echo $html;
        }





}
