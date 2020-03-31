<?php

/**
 * User: linhth
 * Date: 25/03/2019
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('minifyCSS')) {
    function minifyCSS($asset_path, $templates_assets, $minify = false, $version = false)
    {
        if ($minify) {
            require_once(APPPATH . 'libraries/minify/cssminify.php');
            $css = new cssminify();
            $file_name = md5(implode(',',$asset_path)).'.min.css';
            $output_file = $_SERVER['DOCUMENT_ROOT'].str_replace(base_url(), "", $templates_assets ).'css/'.$file_name;
            $new_content = null;
            if (!file_exists($output_file)) {
                foreach ($asset_path as $key => $path) {
                    $global_path = $templates_assets.'css/';
                    $asset_path = preg_split('/css/', $path)[0];
                    if(preg_match('#^\.\.\/#', $path) == TRUE) {
                        $path = preg_replace('#^\.\.\/#', '', $path);
                        $global_path = preg_replace('/css\//', '', $global_path);
                    }
                    $content = file_get_contents($global_path.$path);
                    $content = preg_replace('/\.\.\//', $asset_path, $content);
                    $new_content .= $css->compress($content);
                }
                file_put_contents($output_file, $new_content);
            } else {
                foreach ($asset_path as $key => $path) {
                    $global_dir = $_SERVER['DOCUMENT_ROOT'].str_replace(base_url(), "", $templates_assets ).'css/';
                    if(preg_match('#^\.\.\/#', $path) == TRUE) {
                        $path = preg_replace('#^\.\.\/#', '', $path);
                        $global_dir = preg_replace('/css\//', '', $global_dir);
                    }
                    if ((time()-5*60)<filemtime($global_dir.$path)) {
                        foreach ($asset_path as $path) {
                            $global_path = $templates_assets.'css/';
                            $asset_path = preg_split('/css/', $path)[0];
                            if(preg_match('#^\.\.\/#', $path) == TRUE) {
                                $path = preg_replace('#^\.\.\/#', '', $path);
                                $global_path = preg_replace('/css\//', '', $global_path);
                            }
                            $content = file_get_contents($global_path.$path);
                            $content = preg_replace('/\.\.\//', $asset_path, $content);
                            $new_content .= $css->compress($content);
                        }
                        file_put_contents($output_file, $new_content);
                        break;
                    }
                }
            }
            echo '<link href="'.$templates_assets.'css/'.$file_name.($version ? '?v='.time() : "").'" rel="stylesheet" type="text/css">';
        } else {
            foreach ($asset_path as $path) {
                $global_path = $templates_assets.'css/';
                if(preg_match('#^\.\.\/#', $path) == TRUE) {
                    $path = preg_replace('#^\.\.\/#', '', $path);
                    $global_path = preg_replace('/css\//', '', $global_path);
                }
                echo '<link href="'.$global_path.$path.($version ? '?v='.time() : "").'" rel="stylesheet" type="text/css">';
            }
        }
    }
}

if (!function_exists('minifyJS')) {
    function minifyJS($asset_path, $templates_assets, $minify = false, $version = false) {
        if ($minify) {
            require_once(APPPATH.'libraries/minify/JSMin.php');
            $file_name = md5(implode(',',$asset_path)).'.min.js';
            $output_file = $_SERVER['DOCUMENT_ROOT'].str_replace(base_url(), "", $templates_assets ).'js/'.$file_name;
            $new_content = null;
            if (!file_exists($output_file)) {
                foreach ($asset_path as $path) {
                    $global_path = $templates_assets.'js/';
                    $asset_path = preg_split('/js/', $path)[0];
                    if(preg_match('#^\.\.\/#', $path) == TRUE) {
                        $path = preg_replace('#^\.\.\/#', '', $path);
                        $global_path = preg_replace('/js\//', '', $global_path);
                    }
                    $content = file_get_contents($global_path.$path);
                    $content = preg_replace('/\.\.\//', $asset_path, $content);
                    $new_content .= JSMin::minify($content);
                }
            } else {
                foreach ($asset_path as $key => $path) {
                    $global_dir = $_SERVER['DOCUMENT_ROOT'].str_replace(base_url(), "", $templates_assets ).'js/';
                    if(preg_match('#^\.\.\/#', $path) == TRUE) {
                        $path = preg_replace('#^\.\.\/#', '', $path);
                        $global_dir = preg_replace('/js\//', '', $global_dir);
                    }
                    if ((time()-5*60)<filemtime($global_dir.$path)) {
                        foreach ($asset_path as $path) {
                            $global_path = $templates_assets.'js/';
                            $asset_path = preg_split('/js/', $path)[0];
                            if(preg_match('#^\.\.\/#', $path) == TRUE) {
                                $path = preg_replace('#^\.\.\/#', '', $path);
                                $global_path = preg_replace('/js\//', '', $global_path);
                            }
                            $content = file_get_contents($global_path.$path);
                            $content = preg_replace('/\.\.\//', $asset_path, $content);
                            $new_content .= JSMin::minify($content);
                        }
                        file_put_contents($output_file, $new_content);
                        break;
                    }
                }
            }
            echo '<script type="text/javascript" src="'.$templates_assets.'js/'.$file_name.($version ? '?v='.time() : "").'"></script>';
        } else {
            foreach ($asset_path as $path) {
                $global_path = $templates_assets.'js/';
                if(preg_match('#^\.\.\/#', $path) == TRUE) {
                    $path = preg_replace('#^\.\.\/#', '', $path);
                    $global_path = preg_replace('/js\//', '', $global_path);
                }
                echo '<script type="text/javascript" src="'.$global_path.$path.($version ? '?v='.time() : "").'"></script>';
            }
        }
    }
}