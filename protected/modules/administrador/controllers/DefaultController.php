<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogout(){
		Yii::app()->user->logout();
		Yii::app()->getSession()->remove('id');
		Yii::app()->getSession()->remove('username');
		Yii::app()->getSession()->remove('perfil');

		$this->redirect(Yii::app()->homeUrl);
	}
}