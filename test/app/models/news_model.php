<?php
class News_model extends CI_Model {

	public function __construct()
	{
		//也可以写在方法里面，这样只有这个方法能用db连接
		//可用的参数
		//数据库连接值，用数组或DSN字符串传递；
		//TRUE/FALSE (boolean) - 是否返回连接ID（参考下文的“连接多数据库”）；
		//TRUE/FALSE (boolean) - 是否启用查询构造器类，默认为 TRUE 。
		//http://codeigniter.org.cn/user_guide/database/connecting.html
		$this->load->database();
	}
	
	public function get_news($slug = FALSE)
	{
		$this->db->query("set names utf8");
		if ($slug === FALSE)
		{
			//$query = $this->db->get('news');
			//return $query->result_array();
			$query = $this->db->query('select * from news');
			return $query->result_array();
		}
	
		//$query = $this->db->get_where('news', array('slug' => $slug));
		
		//查询绑定,安全查询
		$sql = "select * from news where slug = ?";
		$query = $this->db->query($sql, array($slug));
		return $query->row_array();
	}
}
