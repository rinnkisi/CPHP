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

    Public function product_mail($user_id=23111,$product_id=271119,$frequency=
    60,$cryptodate=0612){
        $month = array('31','28','31','30','31','30','31','31','30','31','30','31');
        $start_month = substr($cryptodate,0,2); //使用開始月をとってくる(文字の先頭2文字)
        $start_day = substr($cryptodate,-2); //使用開始日をとってくる(文字の先頭2文字)
        $tmp = 0;//一時変数
        foreach ($month as $key => $value) {//使用開始日を日数にする処理
            $tmp = $tmp + $value;
            if($key == ($start_month - 2)){
                $date = $tmp + $start_day;
            }
        }
        $frequency = $frequency - 7;//7は一週間前に通知するために
        $depletion_date = $frequency + $date;//商品枯渇日に代入
        $today = date("m/d");
        $today_month = substr($today,0,2); //現在時間をとってくる(文字の先頭2文字)
        $today_day = substr($today,-2); //現在時間の日をとってくる(文字の先頭2文字)
        $tmp = 0;//初期化
        foreach ($month as $key => $value) {//現在時間を日数にする処理
            $tmp = $tmp + $value;
            if($key == ($today_month - 2)){
                $today_date = $tmp + $today_day;
            }
        }
        $judge = $depletion_date - $today_date;//判定用(商品枯渇日数　- 今日の日数)
        if($judge <= 0){
            $message = <<<MAIL
            {$user_id} 様
            今回はけーきぴーえいちぴーをご利用いただき、ありがとうございます。

            ご登録いただきました商品の消耗期限が近づいてまいります。

            以下のリンクから商品のご注文を確定するか、商品期限のご延長をお願いいたします。

http://ver1.black/CPHP/user_product_histories/agree?id={$product_id}

            期日中にご注文が確定されない場合には自動で商品期限2週間延長されますので、
            ご了承くださいませ。
            ― お問い合わせフォーム ―
            　　-適当なメールアドレス-
            ※本メールは送信専用のアドレスよりお送りしております。
MAIL;
            $mail = new CakeEmail('hackathon');
            $mail->to('kuroisiratama@yahoo.co.jp')//->to('rinnkisi40th@gmail.com')
                ->subject('商品発注についてのご連絡')
                ->send($message);
            return true;
        }
    }
}
