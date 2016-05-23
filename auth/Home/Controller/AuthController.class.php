<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-5-23
 * Time: 下午10:06
 */
namespace Home\Controller;

use Think\Controller;
use Think\Auth;

class AuthController extends Controller
{
    public function _initialize()
    {
        $session_auth = session('auth');
        if(!$session_auth)$this->error('非法访问！',U('Login/index'));
        if($session_auth['uid']==1)return true;
        $auth  = new Auth();
        //echo MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;exit;
        if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$sess_auth['uid']))
        {
            $this->error('无权访问！',U('Login/index'));

        }
    }



}