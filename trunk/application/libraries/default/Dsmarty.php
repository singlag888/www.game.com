<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 引入第smarty
 * @author kevin email:kevin177703@gmail.com
 */
include_once ROOT_APP_THIRD_PARTY."smarty/Smarty.class.php";
class Dsmarty extends Smarty {
	function __construct() {
		parent::__construct ();
		$this->left_delimiter = '{{';
		$this->right_delimiter = "}}";
		$this->caching = false;
		$this->template_dir = null;
	}
	//设置对应的网站编码
	function set_brand_no($brand_no){
		$this->template_dir = ROOT_PUBLIC.$brand_no."/html";
		$this->compile_dir = ROOT_TMP.$brand_no.'/smarty/templates_c';
		$this->cache_dir = ROOT_TMP.$brand_no.'/smarty/cache';
		if(!file_exists($this->compile_dir))make_dir($this->compile_dir);
		if(!file_exists($this->cache_dir))make_dir($this->cache_dir);
	}
	function dassign($key,$value=null,$nocache=false){
		if(empty($this->template_dir))return false;
		$this->assign($key,$value,$nocache);
	}
	function ddisplay($html,$cache_id=null,$compile_id=null,$parent=null){
		if(empty($this->template_dir))return false;
		return $this->display($html,$cache_id,$compile_id,$parent);
	}
	function dfetch($html, $cache_id = null, $compile_id = null, $parent = null, $display = false, $merge_tpl_vars = true, $no_output_filter = false){
		return fetch($html, $cache_id, $compile_id, $parent, $display, $merge_tpl_vars, $no_output_filter);
	}
}