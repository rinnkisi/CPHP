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
        $frequency = '80'; // 使用頻度
        $cryptodate = '0412'; //使用開始日
        debug($cryptodate);
        $start_month = substr($cryptodate,0,2); //使用開始月をとってくる(文字の先頭2文字)
        debug($start_month);
        $start_day = substr($cryptodate,-2); //使用開始日をとってくる(文字の先頭2文字)
        debug($start_day);
        $tmp = 0;//一時変数
        foreach ($month as $key => $value) {//使用開始日を日数にする処理
            $tmp = $tmp + $value;
            if($key == ($start_month-2)){
                $date = $tmp + $start_day;
                debug($date);
            }
        }
        $frequency = $frequency - 7;//7は一週間前に通知するために
        debug($frequency);
        $today = date("m/d");
        debug($today);

    }
}
