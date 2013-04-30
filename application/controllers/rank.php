<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rank extends CI_Controller
{
	public function __construct()
       {
            parent::__construct();
           $this->load->helper('url');
       }
	function index()
	{
		$this->load->helper('url');
	}
	function team_json()
	{
		$this->load->model('rankmodel');
		$result=$this->rankmodel->getTeamRank(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function batsman_json()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getBatsman(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function bowler_json()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getBowler(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function allrounder_json()
	{
		$this->load->model('rankmodel');
		$result = $this->rankmodel->getAllRounder(3,0);
		$data['resultset']=$result;
		$this->load->view('json', $data);
		//print_r($result);
	}
	function team()
	{
		$this->load->model('rankmodel');
        $data['content'] = $this->rankmodel->getTeamRank(50,0);
        //echo "<pre>";
		//print_r($data); die;
		$data['view_page'] = 'team_rank';
		$this->load->view('template', $data);
	}
	function batting()
	{
		$this->load->model('rankmodel');
        /*we are string 100 records only for odi(100) , test(100) , t20(100)
         * and the pagenation is same for above there and along with men/women in same page 
         */ 
        $data['content']['batsman']= $this->rankmodel->getBatsman(100, 0);
        $data['content']['batswomen']= $this->rankmodel->getBatswomen(100, 0);
		$data['links'] = $this->pagination->create_links();
		//echo "<pre>"; print_r($data); die;
		$data['view_page'] = 'player_rank';
		$data['page'] = 'Batting Rank';
		$this->load->view('template', $data);
	}
	function bowling()
	{
		$this->load->model('rankmodel');
        /*we are string 100 records only for odi(100) , test(100) , t20(100)
         * and the pagenation is same for above there and along with men/women in same page 
         */ 
        $data['content']['batsman']= $this->rankmodel->getBowler(100, 0);
        $data['content']['batswomen']= $this->rankmodel->getBowlerwomen(100, 0);
		$data['links'] = $this->pagination->create_links();
		//echo "<pre>"; print_r($data); die;
		$data['view_page'] = 'player_rank';
		$data['page'] = 'Bowling Rank';
		$this->load->view('template', $data);
	}
	function allrounder()
	{
		$this->load->model('rankmodel');
        /*we are string 100 records only for odi(100) , test(100) , t20(100)
         * and the pagenation is same for above there and along with men/women in same page 
         */ 
        $data['content']['batsman']= $this->rankmodel->getAllRounder(100, 0);
        $data['content']['batswomen']= $this->rankmodel->getAllrounderwomen(100, 0);
		$data['links'] = $this->pagination->create_links();
		//echo "<pre>"; print_r($data); die;
		$data['view_page'] = 'player_rank';
		$data['page'] = 'All Rounder Rank';
		$this->load->view('template', $data);
	}
}
?>
