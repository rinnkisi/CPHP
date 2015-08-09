<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    Public function product_mail(){
        $month = array('31','28','31','30','31','30','31','31','30','31','30','31');
        $frequency = '65'; // 使用頻度
        $cryptodate = '0612'; //使用開始日
        debug($cryptodate);
        $start_month = substr($cryptodate,0,2); //使用開始月をとってくる(文字の先頭2文字)
        debug($start_month);
        $start_day = substr($cryptodate,-2); //使用開始日をとってくる(文字の先頭2文字)
        debug($start_day);
        $tmp = 0;//一時変数
        foreach ($month as $key => $value) {//使用開始日を日数にする処理
            $tmp = $tmp + $value;
            if($key == ($start_month - 2)){
                $date = $tmp + $start_day;
                debug($date);
            }
        }
        $frequency = $frequency - 7;//7は一週間前に通知するために
        debug($frequency);
        $depletion_date = $frequency + $date;//商品枯渇日に代入
        debug($depletion_date);
        $today = date("m/d");
        debug($today);
        $today_month = substr($today,0,2); //現在時間をとってくる(文字の先頭2文字)
        debug($today_month);
        $today_day = substr($today,-2); //現在時間の日をとってくる(文字の先頭2文字)
        debug($today_day);
        $tmp = 0;//初期化
        foreach ($month as $key => $value) {//現在時間を日数にする処理
            $tmp = $tmp + $value;
            if($key == ($today_month - 2)){
                $today_date = $tmp + $today_day;
                debug($today_date);
            }
        }
        $judge = $depletion_date - $today_date;//判定用(商品枯渇日数　- 今日の日数)
        if($judge <= 0){
            echo "メール送信";
        }
		$mail = new CakeEmail('hackathon');
		/*$mail->to('kuroisiratama@yahoo.co.jp')//->to('rinnkisi40@gmail.com')
			->subject('商品発送についてのご連絡')
			->send('テスト');*/
            
			return true;
    }
}
