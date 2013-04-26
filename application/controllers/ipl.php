<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ipl extends CI_Controller
{
	function index()
	{
		$this->load->helper('url');
		
		$this->load->model('newsmodel');
		$data['news']=$this->newsmodel->getNews(3,0);
		
		$this->load->model('iplmodel');
		$data['points']=$this->iplmodel->getPoints(10,0);
		
		$this->load->model('match');
		$data['schedule']=$this->match->getUpcomingMatch(2, 0,2170);

		$this->load->model('photosmodel');
		$data['photos']=$this->photosmodel->getList(10,0);

		$data['view_page'] = 'ipl';
		//echo "<pre>";
		//print_r($data); die;
		$this->load->view('template', $data);
	}
	function stats()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		$data['content']=$this->iplmodel->getPoints(10,0);
		$data['view_page'] = 'iplStatistics';
		$this->load->view('template', $data);
	}
	function compare_stats()
	{
		$this->load->helper('url');
		$data['pids']=$this->input->post('pids', TRUE);
		$data['pnames']=$this->input->post('pnames', TRUE);
		$this->load->model('iplmodel');
		$data['view_page'] = 'iplStatsCompare';
		$data['players'] = $this->get_player_list();
		$this->load->view('template', $data);
	}
	function batting_stats()
	{
		$this->load->helper('url');
		
		$this->load->model('iplmodel');
		$data['mostRun']=$this->iplmodel->mostRun();
		$data['mostSix']=$this->iplmodel->mostSix();
		$data['highestScore']=$this->iplmodel->highestScore();
		$data['highestStrikeRate']=$this->iplmodel->highestStrikeRate();
		$data['view_page'] = 'iplBattingStatistics';
		//echo "<pre>";
		//print_r($data); die;
		$this->load->view('template', $data);
	}
	function batting_player()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		if($pids=$this->input->get('pids', TRUE))
		{
			$data['resultset']['data']=$this->iplmodel->mostRun($pids);
			$data['resultset']['success']=1;
		}
		else
		{
			$data['resultset']['success']=-1;
		}
		$this->load->view('json',$data);
	}
	function get_player_list()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		return $this->iplmodel->getPlayersList();
	}
	function get_players()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		if($pids=$this->input->get('pids', TRUE))
		{
			$data['resultset']['data']=$this->iplmodel->getPlayers(explode(',', $pids));
			$data['resultset']['success']=1;
		}
		else
		{
			$data['resultset']['success']=-1;
		}
		//echo "<pre>";
		//print_r($data);
		$this->load->view('json',$data);
	}
	function bowling_stats()
	{
		$this->load->helper('url');
		$total_count=array();
		$this->load->model('iplmodel');
		$data['mostWicket']=$this->iplmodel->mostWicket();
		$data['bestBowling']=$this->iplmodel->bestBowling();
		$data['bestBowlingAvg']=$this->iplmodel->bestBowlingAvg();
		$data['bestBowlingEconomy']=$this->iplmodel->bestBowlingEconomy();
		$data['view_page'] = 'iplBowlingStatistics';
		//echo "<pre>";
		//print_r($data); die;
		$this->load->view('template', $data);
	}
	function bowling_player()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		if($pids=$this->input->get('pids', TRUE))
		{
			$data['resultset']['data']=$this->iplmodel->mostWicket($pids);
			$data['resultset']['success']=1;
		}
		else
		{
			$data['resultset']['success']=-1;
		}
		$this->load->view('json',$data);
	}
	function points_json()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		return $this->iplmodel->getPoints(10,0);
		$data['resultset']=$this->iplmodel->getPoints(10,0);
		$this->load->view('json',$data);
	}
	function points()
	{
		$this->load->helper('url');
		$this->load->model('iplmodel');
		$data['content']=$this->iplmodel->getPoints(10,0);
		$data['view_page'] = 'iplPoints';
		$this->load->view('template', $data);
	}
	function schedule_json()
	{
		$this->load->helper('url');
		$this->load->model('match');
		$srs_id = 2170;
		$data['resultset']=$this->match->getUpcomingMatch(2, 0,$srs_id);
		$this->load->view('json',$data);
	}
	function schedule()
	{
		$today_end =  strtotime(date('d-M-Y',time()).' 23:59');
		$this->load->helper('url');
		$this->load->model('match');
		$srs_id = 2170;
		$data['srs_name']=
		$config = array();
        $config['base_url'] = base_url() . 'ipl/schedule/'.$srs_id;
        $config['total_rows'] = $this->match->recordCountUpcoming($today_end,$srs_id);
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $config['num_links']=5;
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['cur_tag_open'] = '<a href="#" class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['content'] = $this->match->getUpcomingMatch($config['per_page'], $page, $srs_id);
		$data['base_url']=base_url() . 'ipl/schedule/';
		$data['links'] = $this->pagination->create_links();
		//print_r($data); die;
		$data['view_page'] = 'iplSchedule';
		$this->load->view('template', $data);
	}

	function crossword(){
		$this->load->helper('url');
		$data['view_page'] = 'crossword';
		$this->load->view('template', $data);
	}

	function quiz(){
		$this->load->helper('url');
		$data['view_page'] = 'quiz';
		$this->load->view('template', $data);
	}
}
