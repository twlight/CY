<?php if (! defined('BASEPATH')) exit('Access Denied!');
/**
*/
class Hpages {

	var $base_url			= '';	//�������ӵ�ַ
	var $total_rows  		= '';	//��������
	var $per_page	 		= 10;	//ÿҳ����
	var $num_links			=  2;	//Ҫ��ʾ���������ӵĸ���
	var $cur_page	 		=  1;	//��ǰҳ��
	var $first_link   		= '&lsaquo; First';	//��ҳ�ַ�
	var $next_link			= '&gt;';			//��һҳ���ַ�
	var $prev_link			= '&lt;';			//��һҳ���ַ�
	var $last_link			= 'Last &rsaquo;';	//ĩҳ���ַ�
	var $uri_segment		= 3;		//��ҳ�����ڵ�uriƬ��λ��
	var $full_tag_open		= '';		//��ҳ����ʼ��html��ǩ
	var $full_tag_close		= '';		//��ҳ��������ĺ�html��ǩ
	var $first_tag_open		= '';		//��ҳ��ʼ��html��ǩ
	var $first_tag_close	= '&nbsp;';	//��ҳ������html��ǩ
	var $last_tag_open		= '&nbsp;';	//ĩҳ��ʼ��html��ǩ
	var $last_tag_close		= '';		//ĩҳ������html��ǩ
	var $cur_tag_open		= '&nbsp;<b>';//��ǰҳ��ʼ��...
	var $cur_tag_close		= '</b>';	//��ǰҳ������...
	var $next_tag_open		= '&nbsp;';	//��һҳ��ʼ��.....
	var $next_tag_close		= '&nbsp;';	//��һҳ������.....
	var $prev_tag_open		= '&nbsp;';	//��һҳ��ʼ��.....
	var $prev_tag_close		= '';		//��һҳ������.....
	var $num_tag_open		= '&nbsp;';	//�����֡����ӵĴ򿪱�ǩ��
	var $num_tag_close		= '';		//�����֡����ӵĽ�����ǩ��
	var $page_query_string	= FALSE;
	var $query_string_segment = 'per_page';
	
	var $page_mode			= 'default';	//default for add page at the end? if include {page}, will replace it for current page.
	var $underline_uri_seg	= -1;			//�����»���ʱ,ҳ�����������±�λ��
	var $custom_cur_page	= 0;			//�Զ��嵱ǰҳ�룬���ڴ�ֵ�ǣ�ϵͳ�����Զ��жϵ�ǰҳ����Ĭ�ϲ�����
	
	function __construct() {
		$this->Hpages();
	}
	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function Hpages() {
		if (file_exists(APPPATH.'config/pagination.php')) {
			require_once(APPPATH.'config/pagination.php');
			
			foreach ($config as $key=>$val) {
				$this->{$key} = $val;
			}
		}
		
		log_message('debug', "Hpages Class Initialized");
	}
	
	/**
	 * ��ʼ������
	 *
	 * @see		init()
	 * @author	Laurence.xu <haohailuo@163.com>
	 * @version	Wed Dec 08 12:26:07 CST 2010
	 * @param	<array> $params ����ʼ���Ĳ���
	*/
	function init($params = array()) {
		if (count($params) > 0) {
			foreach ($params as $key => $val) {
				if (isset($this->$key)) {
					$this->$key = $val;
				}
			}		
		}
	}
	
	/**
	 * ������ҳ����
	 *
	 * @see		create_links()
	 * @author	Laurence.xu <haohailuo@163.com>
	 * @version	Wed Dec 08 15:02:27 CST 2010
	 * @param	<boolean> $show_info �Ƿ���ʾ����������Ϣ
	 * @return	<string> $output
	*/
	function create_links($show_info = false, $top_info = false) {
		//���û�м�¼����ÿҳ����Ϊ0,�򷵻ؿ�
		if ($this->total_rows == 0 || $this->per_page == 0) {
			return '';
		}

		//������ҳ��
		$num_pages = ceil($this->total_rows / $this->per_page);

		//ֻ��һҳ,���ؿ�
		if ($num_pages == 1 && !$show_info) {
			return '';
		}
		
		$CI =& get_instance();

		//��ȡ��ǰҳ���
		if ($CI->config->item('enable_query_strings') === TRUE || $this->page_query_string === TRUE) {
			if ($CI->input->get($this->query_string_segment) != 0) {
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		} else {
			if (intval($this->custom_cur_page) > 0) {
				$this->cur_page = (int) $this->custom_cur_page;
			}else{
				$uri_segment = $CI->uri->segment($this->uri_segment, 0);
				if ( !empty($uri_segment) ) {
					$this->cur_page = $uri_segment;
					//������»���
					if ($this->underline_uri_seg >= 0) {
						if (strpos($this->cur_page, '-') !== false) {
							$arr = explode('-', $this->cur_page);
						}else {
							$arr = explode('_', $this->cur_page);
						}
						$this->cur_page = $arr[$this->underline_uri_seg];
						unset($arr);
					}
					// Prep the current page - no funny business!
					$this->cur_page = (int) $this->cur_page;
				}
			}
		}
		//echo $this->cur_page;exit;
		//������ʾ��ҳ�����
		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1) {
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page) || $this->cur_page < 1) {
			$this->cur_page = 1;
		}
		
		//�����ǰҳ��������ҳ��,��ֵ����ǰҳ�����ֵ
		if ($this->cur_page > $num_pages) {
			$this->cur_page = $num_pages;
		}

		$uri_page_number = $this->cur_page;

		if ($CI->config->item('enable_query_strings') === TRUE || $this->page_query_string === TRUE) {
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
		} else {
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}
		
		if (strpos($this->base_url, "{page}") !== false) {
			$this->page_mode = 'replace';
		}
		
		$output = $top_output = '';
		//����������Ϣ
		if ($show_info) {
			$output = " ��<b>".$this->total_rows ."</b>����¼ <span style='color:#ff0000;font-weight:bold'>{$this->cur_page}</span>/<b>".$num_pages."</b>ҳ ÿҳ<b>{$this->per_page}</b>�� ";
		}
		//������Ϣ����ʾ�����棬�Թ�����
		if ($top_info) {
			$top_output = " �� <b>".$this->total_rows ."</b> ����¼ ��<span style='color:#ff0000;font-weight:bold'>{$this->cur_page}</span>ҳ/��<b>".$num_pages."</b>ҳ ";
		}
		//�ж��Ƿ�Ҫ��ʾ��ҳ
		if  ($this->cur_page > $this->num_links+1) {
			$output .= $this->first_tag_open.'<a href="'.$this->makelink().'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}
		
		//��ʾ��һҳ
		if  ($this->cur_page != 1) {
			$j = $this->cur_page - 1;
			if ($j == 0) $j = '';
			$output .= $this->prev_tag_open.'<a href="'.$this->makelink($j).'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
		}
		
		//��ʾ�м�ҳ
		for ($i=1; $i <= $num_pages; $i++){
			if ($i < $this->cur_page-$this->num_links || $i > $this->cur_page+$this->num_links) {
				continue;
			}
			
			//��ʾ�м�ҳ��
			if($this->cur_page == $i){
				$output .= $this->cur_tag_open.$i.$this->cur_tag_close; //��ǰҳ
			}else {
				$output .= $this->num_tag_open.'<a href="'.$this->makelink($i).'">'.$i.'</a>'.$this->num_tag_close;
			}
		}
		
		//��ʾ��һҳ
		if  ($this->cur_page < $num_pages) {
			$k = $this->cur_page + 1;
			$output .= $this->next_tag_open.'<a href="'.$this->makelink($k).'">'.$this->next_link.'</a>'.$this->next_tag_close;
		}
		
		//��ʾβҳ
		if (($this->cur_page + $this->num_links) < $num_pages) {
			$output .= $this->last_tag_open.'<a href="'.$this->makelink($num_pages).'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		if ($top_info) {
			return array($output, $top_output);
		}else {
			return $output;
		}
	}
	
	/**
	 * ��������url��ַ
	 *
	 * @param <string> $str
	 * @return <string>
	 */
	function makelink($str = '') {
		if($this->page_mode == 'default') {
			return $this->_forsearch($this->base_url.$str);
		} else {
			$url = $this->base_url;
			if ($str == 1) {
				$url = str_replace('/{page}', '', $this->base_url);
			}
			$url = str_replace("{page}", $str, $url);
			
			return $this->_forsearch($url);
		}
	}
	
	/**
	 * ����url��ַ
	 *
	 * @see		_forsearch()
	 * @author	Laurence.xu <haohailuo@163.com>
	 * @version	Wed Dec 08 14:33:58 CST 2010
	 * @param	<string> $string pInfo
	 * @return	<string>
	*/
	function _forsearch($string) {
		$length = strlen($string) - 1;
		if($string{$length} == '/') {
			$string = rtrim($string, '/');
		}
		
		return site_url($string);
		return $string;
	}
}

// END Pagination Class

/* End of file Hpages.php */
/* Location: ./system/libraries/Hpages.php */