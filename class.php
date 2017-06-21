<? php
class Token{
function store_in_session($key,$value)
{
	if (isset($_SESSION))
	{
		$_SESSION[$key]=$value;
	}
}
function unset_session($key)
{
	$_SESSION[$key]=' ';
	unset($_SESSION[$key]);
}
function get_from_session($key)
{
	if (isset($_SESSION[$key]))
	{
		return $_SESSION[$key];
	}
	else {  return false; }
}
function csrfguard_generate_token($unique_form_name)
{
	$token = rand(0.1, 1000000000); // PHP 7, or via paragonie/random_compat
	store_in_session($unique_form_name,$token);
	return $token;
}
function csrfguard_validate_token($unique_form_name,$token_value)
{
	$token = get_from_session($unique_form_name);
	if (!is_string($token_value)) {
return false;

	}
	$result = hash_equals($token, $token_value);
	unset_session($unique_form_name);
	return $result;
}
}
