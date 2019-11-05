<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

            //     $config['full_tag_open'] = '<ul class="pagination">';
            //     $config['full_tag_close'] = '</ul>';
            //     $config['first_link'] = '&laquo'; 
            //     $config['first_tag_open'] = '<li>';
            //     $config['first_tag_close'] = '</li>';
            //    $config['prev_link'] = '&laquo;';
            //     $config['prev_tag_open'] = '<li>';
            //     $config['prev_tag_close'] = '</li>';
            //     $config['last_tag_open'] = '<li>';
            //     $config['last_tag_close'] = '</li>';
            //     $config['next_link'] = '&raquo;';
            //     $config['next_tag_open'] = '<li>';
            //     $config['next_tag_close'] = '</li>';
            //     $config['cur_tag_open'] = '<li class="active">';
            //     $config['cur_tag_close'] = '</a></li>';
            //     $config['num_tag_open'] = '<li>';
            //     $config['num_tag_close'] = '</li>';

            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
             
            $config['first_link'] = '';
            $config['first_tag_open'] = '';
            $config['first_tag_close'] = '';
             
            $config['last_link'] = '';
            $config['last_tag_open'] = '';
            $config['last_tag_close'] = '';
             
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="active"><a/>';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

/* End of file pagination.php */
/* Location: /application/config/pagination.php */