<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('hal-awal');
	}

	//--------------------------------------------------------------------

	public function keluar()
    { 
        $this->session->destroy();
        echo 
            '<script>
                alert("Keluar dari sistem");
                window.location = "'.base_url('home').'"
            </script>';
    }
}
