<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floor_plan extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
    }

    public function draw()
	{
        $data['data'] = array(
            array(
                "ID" => 1,
                "Status" => 1,
                "Top" => 72.312,
                "Left" => 13.186,
                "No" => 108
            ),
            array(
                "ID" => 2,
                "Status" => 1,
                "Top" => 72.312,
                "Left" => 16.830,
                "No" => 207
            ),

            array(
                "ID" => 3,
                "Status" => 1,
                "Top" => 74.881,
                "Left" => 13.186,
                "No" => 106
            ),
            array(
                "ID" => 4,
                "Status" => 1,
                "Top" => 74.881,
                "Left" => 16.830,
                "No" => 205
            ),

            array(
                "ID" => 5,
                "Status" => 1,
                "Top" => 46.631,
                "Left" => 82.451,
                "No" => 825
            ),
            array(
                "ID" => 6,
                "Status" => 1,
                "Top" => 46.630,
                "Left" => 78.798,
                "No" => 726
            ),

            array(
                "ID" => 7,
                "Status" => 1,
                "Top" => 49.198,
                "Left" => 78.798,
                "No" => 724
            ),
            array(
                "ID" => 8,
                "Status" => 1,
                "Top" => 49.198,
                "Left" => 82.451,
                "No" => 823
            ),

            array(
                "ID" => 9,
                "Status" => 1,
                "Top" =>    44.119,
                "Left" => 5.898,
                "No" => 129
            ),
            array(
                "ID" => 10,
                "Status" => 1,
                "Top" =>    46.687,
                "Left" => 5.898,
                "No" => 127
            )
        );
		$this->load->view('map',$data);
	}
}
