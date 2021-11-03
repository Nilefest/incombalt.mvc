<?php

class indexController extends Controller {
    
	public function index() {
        
        $this->load->model('notes_lang');
        $notes = $this->notes_langModel->getNotes($this->config->lang);
        
        $this->load->model('articles');
        $this->data['main_info'] = $this->articlesModel->getItems(array('article'), array('title' => 'about', 'lang' => $this->config->lang))[0]['article'];
        
        $this->data['notes'] = $notes;
        $this->config->title = 'ADM';
        $this->config->description = $notes['about'];
        $this->config->css = array('admin');
		$this->getChild(array('common/header', 'common/footer'));
		return $this->load->view('admin/about/index', $this->data);
	}
}
?>
