# Pid_check
 Only one class that will check if a console is already being used in linux environments to prevent multiple executions from running on that console

How to use?
Inside if your console types the following lines of code:

Remember to call the Pid class

```
$checkpid = true;
if($checkpid)
{
	if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') // On Windows not use PID
	{
		$console_pid = new Pid('/var/run/');
		if($console_pid->already_running)
			die("Running process...\n");
	}
}
```
