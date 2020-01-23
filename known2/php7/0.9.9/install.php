<?php


/**
 * known version 0.9.9 - install
 *
 * @author Your Name Here
 */
class i_known2_0_9_9_install extends i_action_install
{	//==========================================================================
	// STEP I: INTERNAL CONFIGURABLES
	//==========================================================================
		
	public function step1_init()
	{
		$this->setStepLabel("_step_progress_settings");
		// TIP: custom inputs can be added here! see: http://www.installatron.com/sdk_commands#howinput
	}
		
	public function step1_process()
	{
		// TIP: error checking for custom inputs can be added here
	}
		
	//==========================================================================
	// STEP II: ARCHIVE EXTRACTION
	//==========================================================================
		
	public function step2_init()
	{
		$this->setStepLabel("_step_progress_extracting");
	}
		
	public function step2_process()
	{
		/// extract the 'main' archive:
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
		// TIP: this is where you install code goes. see: http://www.installatron.com/sdk
		// TIP: if no code is added here, the installer will simply extract the archive
		//      into the install directory.
		
		// TIP: install code is made of Installatron commands. some examples:
		//   move                $this->mv('FROM','TO');
		//   copy                $this->cp('FROM','TO');
		//   remove (delete)     $this->rm('FILE_OR_DIR');
		//   chmod               $this->chmod('FILE_OR_DIR',0777);
		//   edit file (regex)   $this->sr('FILE','#REGEX#","REPLACE_WITH");
		//   ...see all the commands at: http://www.installatron.com/sdk_commands
		
		   $this->chmod('Uploads',0755);
		   $this->db_import('schemas/mysql/mysql.sql');
		          $this->cp('htaccess.dist','.htaccess');
		
		// TIP: Installatron has a lot of useful variables. some examples:
		//   install url         $this->url
		//   install path        $this->path
		//   database host       $this->db_host
		//   database host       $this->db_host
		//   database name       $this->db_name
		//   database username   $this->db_user
		//   database password   $this->db_pass
		//   table prefix        $this->db_prefix
		//   ...see all the variables at: http://www.installatron.com/sdk_commands
		
		// TIP: you can add as many steps as you need
		// TIP: you can remove these comments if you don't need them.
		
		   $this->write('config.ini', '
	database = "MySQL"
	dbuser = "/##dbuser##/"
	dbpass = "/##dbpass##/"
	dbname = "/##dbname##/"
	dbhost = "/##dbhost##/"
	title = "/##title##/"
	path = "/##path##/"
	uploadpath = "/##uploadpath##/"
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