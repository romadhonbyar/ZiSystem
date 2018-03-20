<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pu_home extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->url1 = $this->uri->rsegment(1);
		$this->url2 = $this->uri->rsegment(2);
		$this->url3 = $this->uri->rsegment(3);
		$this->url4 = $this->uri->rsegment(4);
		$this->url5 = $this->uri->rsegment(5);
	}

	public function index(){
		$knowledge_num = $this->m_knowledge->get_all_count();
        $content_per_page = 5;
        $total_data = ceil($knowledge_num->tol_records/$content_per_page);

		$data = array(
			'title' => "Beranda",
			'url1' => $this->url1,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'general_data' => $this->m_set_general->general_view(),
			'knowledge_data' => $this->m_knowledge->knowledge_view(FALSE,FALSE,2),
			'total_data' => $total_data,
			'message' => '',
		);
		$this->_render_page('pu_home/content/contents', 'pu_home/component/pages/pages-content/page-content-home',$data);
	}
	public function about(){
		$data = array(
			'title' => "About",
			'url1' => $this->url1,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		$this->_render_page('pu_home/content/contents', 'pu_home/component/pages/pages-content/page-content-about',$data);
	}
	public function contact(){
		$data = array(
			'title' => "Contact",
			'url1' => $this->url1,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		$this->_render_page('pu_home/content/contents', 'pu_home/component/pages/pages-content/page-content-contact',$data);
	}
	public function view_post($code_knowledge,$slug_knowledge){ //code_knowledge atau id_knowledge?
		$data = array(
			'title' => "POST",
			'url1' => $this->url1,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'general_data' => $this->m_set_general->general_view(),
			'knowledge_data' => $this->m_knowledge->knowledge_view(FALSE,$code_knowledge,2), //
			'message' => '',
		);
		$this->_render_page('pu_home/content/contents', 'pu_home/component/pages/pages-content/page-content-post',$data);
	}

	/* Other */
	public function more(){
		$group_no = $this->input->post('group_no');
        $content_per_page = 5;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->m_knowledge->get_all_content($start,$content_per_page);
        $get_last_id = $this->m_knowledge->get_last_id(); /* ambil #ID terakhir untuk sorot knowledge terbaru */
        if(isset($all_content) && is_array($all_content) && count($all_content)){
            foreach ($all_content as $key => $content) :
				$string = $content->title_knowledge;
				if(($content->viewed_knowledge > 0) or ($content->id_knowledge == $get_last_id->id_knowledge)){
					echo '
						<div class="col-page col-sm-8 col-md-6">
							<a href="'.site_url('post/'.$content->code_knowledge.'/'.$content->slug_knowledge).'" class="black fondo-publicacion-home">
								<div class="img-publicacion-principal-home">
									<img class="" src="https://placeholdit.imgix.net/~text?txtsize=34&txt=&w=500&h=300">
								</div>
								<div class="contenido-publicacion-principal-home">
									<h3>'.$string.'</h3>
									<p>'.word_limiter($content->content_knowledge,10).'<span>...</span></p>
								</div>
								<div class="mascara-enlace-blog-home">
									<span>Lorem </span>
								</div>
							</a>
						</div>
					';
				} else {
					echo '
						<div class="col-page col-sm-4 col-md-3">
							<a href="'.site_url('post/'.$content->code_knowledge.'/'.$content->slug_knowledge).'"  class="fondo-publicacion-home">
								<div class="img-publicacion-home">
									<img class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=34&txt=&w=500&h=300">
								</div>
								<div class="contenido-publicacion-home">
									<h3>'.$string.'</h3>
									<p>'.word_limiter($content->content_knowledge,10).'<span>...</span></p>
								</div>
								<div class="mascara-enlace-blog-home">
									<span>Lihat </span>
								</div>
							</a>
						</div>
					';
				}    
            endforeach;                                
		} else {
			echo '
				<div class="text-center" style="margin-top:5px;margin-bottom:20px;">
					<a href="#">
						<span><i class="fa fa-hashtag"></i>No knowledge <i class="fa fa-frown-o"></i></span>
					</a>
				</div>
			';
		} 	

		/*
		echo 'Kamu'.$_POST['id'];
		$status_knowledge = 2;
		//count all rows except already displayed
		$queryAll = $this->db->query("SELECT COUNT(*) as num_rows FROM knowledge_ 
									 WHERE id_knowledge < ".$_POST['id']." 
									 AND status_knowledge = ".$status_knowledge."
									 ORDER BY id_knowledge DESC");
								 
		$data = $queryAll->row_array();
		$allRows = $data['num_rows'];

		$showLimit = 2;

		//get rows query
		$query = $this->db->query("SELECT * FROM knowledge_ 
								  WHERE id_knowledge < ".$_POST['id']." 
								  AND status_knowledge = ".$status_knowledge."
								  ORDER BY id_knowledge DESC LIMIT ".$showLimit);

		$data = $query->result();
		//number of rows
		$rowCount = $query->num_rows();

		if($rowCount > 0){
			foreach($data as $row){ 
				$book_diary_id = $row->id_knowledge;
				echo "
				<h2>".word_limiter($row->title_knowledge , 50, '')."</h2>
				<img src='//placehold.it/150x100/EEEEEE' class='img-responsive pull-right'>".word_limiter($row->content_knowledge , 50, '')." ...";
			}
			if($allRows > $showLimit){ 
				echo '<div class="show_more_main_note" id="show_more_main_note'.$book_diary_id.'">
					<span id="'.$book_diary_id.'" class="show_more_note" title="Load more posts">Show more</span>
					<span class="loding_note" style="display: none;"><span class="loding_txt_note">Loading…</span></span>
				</div>';
			}
		}
		*/
	}

	function _render_page($view, $data=null, $render=false){ //I think this makes more sense
		$this->viewdata = (empty($data)) ? $data: $data;
		$view_html = $this->template->load($view, $this->viewdata, $render);
		if ($render) return $view_html;//This will return html on 3rd argument being true
	}
}
