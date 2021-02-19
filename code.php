<?php
namespace aw2\controllers;

\aw2_library::add_service('controllers.code','Code Controller',['namespace'=>__NAMESPACE__]);


function code($atts,$content=null,$shortcode=null){

	if(\aw2_library::pre_actions('all',$atts,$content,$shortcode)==false)exit();
	
	$o=$atts['o'];
	\controllers::set_qs($o);
	\controllers::set_cache_header('no'); // HTTP 1.1.
	
	$module=\aw2_library::get('qs.1');
	$post_type=\aw2_library::get('qs.0');
	
	if(empty($module)||empty($post_type)){
		die('Invalid Request');
	}
	
	
	\aw2_library::get_post_from_slug($module,$post_type,$post);
	//\util::var_dump($post);
	echo $post->post_content;
	
	exit();
}


