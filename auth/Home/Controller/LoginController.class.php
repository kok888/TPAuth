<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-5-23
 * Time: 下午11:45
 */

namespace Home\Controller;


class LoginController extends \THink\Controller
{
    public function index()
    {
        if(IS_POST){
            Switch(I('user',null,false))
            {
                case 'admin':
                    $login['uid'] = 1;
                    $login['user'] ='admin';
                    break;
                case 'test':
                    $login['uid'] = 2;
                    $login['user'] ='test';
                    break;
                case 'guest':
                    $login['uid'] = 3;
                    $login['user'] ='guset';
                    break;
                default:
                    $this->error('不存在此用户');
            }
            if($login)
            {
                session('auth',$login);
                $this->success('登录成功',U('Index/index'));
            }


        }else{
            $this->display();
        }
    }
}