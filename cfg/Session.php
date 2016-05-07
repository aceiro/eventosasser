<?php

class Session
{
	public function __construct($name='NEWNAME')
	{
		session_name($name);
		session_start();
	}

	public function set($field, $value)
	{
		$_SESSION[$field] = $value;
	}

	public function has($field)
	{
		return isset($_SESSION[$field]);
	}

	public function get($field)
	{
		return $this->has($field)?$_SESSION[$field]:null;
	}

	public function setExpireTime($strtime)
	{
		$this->set('duration', $strtime);
		$this->set('expire', strtotime("+strtime"));
	}

	public function register($duration='15 minutes')
	{
		$this->setExpireTime($duration);
	}

	public function expired()
	{
		if (time() > $this->get('expire')){
			return true;
		}
		return false;
	}

	public function valid()
	{
		if($this->expired()){
			$this->destroy();
			return false;
		}
		$this->renew();
		return true;
	}

	public function renew()
	{
		$this->setExpireTime($this->get('duration'));
	}

	public function destroy()
	{
		$_SESSION = array();
		session_destroy();
	}

}

?>