<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Example use of the CodeIgniter Sitemap Generator Model
 * 
 * @author Gerard Nijboer <me@gerardnijboer.com>
 * @version 1.0
 * @access public
 *
 */
class Sitemap extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// We load the url helper to be able to use the base_url() function
		$this->load->helper('url');
		
		$this->load->model('sitemapmodel');
		
		// Array of some articles for demonstration purposes
		// $this->cadastros = $this->painel_model->cadastros();
	}
	
	/**
	 * Generate a sitemap index file
	 * More information about sitemap indexes: http://www.sitemaps.org/protocol.html#index
	 */
	public function index() {
		$this->sitemapmodel->add(base_url(), date('Y-m-d', time()));
		$this->sitemapmodel->add(base_url('cadastrar'), date('Y-m-d', time()));
		$this->sitemapmodel->output('sitemapindex');
	}
	
	/**
	 * Generate a sitemap both based on static urls and an array of urls
	 */


	// public function general() {
	// 	$this->sitemapmodel->add(base_url(), NULL, 'monthly', 1);
	// 	$this->sitemapmodel->add(base_url('contact'), NULL, 'monthly', 0.9);

	// 	foreach ($this->articles as $article) {
	// 		$this->sitemapmodel->add($article['loc'], $article['lastmod'], $article['changefreq'], $article['priority']);
	// 	}
	// 	$this->sitemapmodel->output();
	// }
	
	/**
	 * Generate a sitemap only on an array of urls
	 */
	// public function articles() {
	// 	foreach ($this->articles as $article) {
	// 		$this->sitemapmodel->add($article['loc'], $article['lastmod'], $article['changefreq'], $article['priority']);
	// 	}
	// 	$this->sitemapmodel->output();
	// }
	
}