<?php
/**
 * Created by PhpStorm.
 * User: chok
 * Date: 2018/1/8
 * Time: 14:38
 */

namespace app\index\controller;

use think\Db;
use think\Controller;

class User extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		return view('user');
	}

}