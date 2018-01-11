<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();

		/*
		*  composer Monolog
		*/
		$log = new Logger('name');
		$log->pushHandler(new StreamHandler('/tmp/log.log', Logger::WARNING));
		// add records to the log
		$log->addWarning('Foo');
		$log->addError('Bar');

		$data['title'] = 'News archive';
		
		$this->load->view('templates/header', $data);
		$this->load->view('news/news', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = FALSE)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
		
		if (empty($data['news_item']))
		{
			show_404();
		}
		
		$data['title'] = $data['news_item']['title'];
		
		$this->load->view('templates/header', $data);
		$this->load->view('news/news', $data);
		$this->load->view('templates/footer');
	}
	public function mem()
	{
		$this->load->helper('url');
		echo current_url();
		//	$this->load->driver('cache',array('adapter'=>'memcached'));
		//	$this->cache->memcached->save('foo', 'bar', 100);
		//	$result = $this->cache->memcached->get('foo');
		//	error_log(var_export($result, TRUE),3,"/tmp/errorLog.log"); 
		//	var_dump($result);
			$m = new Memcached();
			$m->addServer('localhost', 11211);
			var_dump($m->set('foo', 100));
			var_dump($m->get('foo'));
	}
}
