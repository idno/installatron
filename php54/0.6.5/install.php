<?php

/**
 * Known version 0.6.5
 *
 * @author Ben Werdmuller
 */
class i_known2_0_6_5_install extends i_action_install
{	//==========================================================================
	// STEP II: ARCHIVE EXTRACTION
	//==========================================================================
		
	public function step2_init()
	{
		$this->setStepLabel("_step_progress_extracting");
	}
		
	public function step2_process()
	{
		// extract the 'main' archive:
		$this->extract("main");
	}
		
	//==========================================================================
	// STEP III: CONFIGURING INSTALL
	//==========================================================================
		
	public function step3_init()
	{
		$this->setStepLabel("_step_progress_processing");
	}
		
	public function step3_process()
	{
		$this->chmod('Uploads',0755);
        $this->db_import('schemas/mysql/mysql.sql');
        $this->cp('htaccess.dist','.htaccess');
		$this->write('config.ini', '
	database = "MySQL"
	dbuser = "##dbuser##"
	dbpass = "##dbpass##"
	dbname = "##dbname##"
	dbhost = "##dbhost##"
	title = "##title##"
	path = "##path##"
	uploadpath = "##uploadpath##"
');
	
        $this->sr("config.ini", "/##dbuser##/", ($this->db_user));
        $this->sr("config.ini", "/##dbpass##/", ($this->db_pass));
        $this->sr("config.ini", "/##dbhost##/", ($this->db_host));
        $this->sr("config.ini", "/##dbname##/", ($this->db_name));
        $this->sr("config.ini", "/##path##/", $this->path);
        $this->sr("config.ini", "/##uploadpath##/", $this->path . '/Uploads');
        $this->sr("config.ini", "/##title##/", ($this->input["field_sitetitle"]));	
	
	}
}


?>
