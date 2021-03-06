<?php 

class Pid {

    protected $filename;
    public $already_running = FALSE;
   
    function __construct($directory)
    {
        $this->filename = $directory . '/' . basename($_SERVER['PHP_SELF']) . '.pid';
       
        if(is_writable($this->filename) || is_writable($directory))
        {
            if(file_exists($this->filename))
            {
                $pid = (int)trim(file_get_contents($this->filename));
                if(posix_kill($pid, 0))
                    $this->already_running = TRUE;
            }
        }
        else
            die("Cannot write to pid file '$this->filename'. Program execution halted.\n");
       
        if(!$this->already_running)
        {
            $pid = getmypid();
            file_put_contents($this->filename, $pid);
        }
       
    }
}