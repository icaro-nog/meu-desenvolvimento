<?php

include_once 'QLIGG_Model.php';

class QLIGG_Account extends QLIGG_Model
{

  protected $table = 'insta_gallery_accounts';

  function get_args()
  {
    return array(
      'id'                  => '',
      'account_type'        => '',
      'username'            => '',
      'profile_picture_url' => '',
      'access_token'        => '',
      'token_type'          => '',
      'expiration_date'     => '',
      'renew_count'         => 0
    );
  }

  function get_defaults()
  {
    return array();
  }

  function get_account($id)
  {
    $accounts = $this->get_accounts();
    if (isset($accounts[$id])) {
      if (isset($accounts[$id]['expiration_date']) && $this->is_about_to_expire($accounts[$id])) {
        $this->validate_token($accounts[$id]);
      }
      return $accounts[$id];
    }
  }

  function renew_account_fail($account)
  {
    $account['renew_count'] = min(0, $account['renew_count']) - 1;
    $this->update_account($account);
  }
	/* TODO: check token renew */
  function renew_access_token($access_token, $renew_count = 0)
  {

    global $qliggAPI;

    if (substr($access_token, 0, 4) === 'IGQV') {
      return $qliggAPI->PERSONAL->renewAccessToken($access_token, $renew_count);
    }

    return $qliggAPI->BUSINESS->renewAccessToken($access_token, $renew_count);
  }

  /* TODO: check token renew */
  function validate_token($account)
  {

    $response = $this->renew_access_token($account['access_token'], $account['renew_count']);

    if (isset($response['error']) || !isset($response['expires_in']) || !isset($response['access_token'])) {
      $this->renew_account_fail($account);
      return $response;
    }

    if ($account['expiration_date'] >= $this->expiration_date($response['expires_in'])) {
      return;
    }

    $account['renew_count'] = max($account['renew_count'], 0) + 1;

    $account['expires_in'] = (int) $response['expires_in'];
    $account['access_token'] = $response['access_token'];

    if ($account = $this->update_account($account)) {
      return $account;
    }
  }

  function renew_account_token($acount_id)
  {
    $account = $this->get_account($acount_id);
    if (!$this->is_about_to_expire($account)) {
      return array(
        'error' => 1,
        'message' => ''
      );
    }

    $response = $this->validate_token($account);

    return $response;
  }

  function is_about_to_expire($account)
  {
    if ($account['renew_count'] <= -3) {
      return false;
    }
    if (($account['expiration_date'] - strtotime(current_time('mysql'))) / DAY_IN_SECONDS <= 10) {
      return true;
    }

    return false;
  }

  function get_accounts()
  {
    $accounts = $this->get_all();
    //make sure each account has all values
    if (count($accounts)) {
      foreach ($accounts as $id => $account) {
        $accounts[$id] = array_replace_recursive($this->get_args(), $accounts[$id]);
      }
    }
    return $accounts;
  }

  function update_account($account_data)
  {
    return $this->save_account($account_data);
  }

  function update_accounts($accounts, $order = 0)
  {
    return $this->save_all($accounts);
  }

  function add_account($account_data)
  {
    return $this->save_account($account_data);
    /*   if ($account_data['id']) {
      $account_data['access_token'] = $this->clean_token($account_data['access_token']);
      $account_data['expiration_date'] = $this->expiration_date($account_data['expires_in']);
      $account_data = array_intersect_key($account_data, $this->get_args());
      return $this->save_account($account_data);
    } */
  }

  function save_account($account_data = null)
  {
    if ($account_data['id']) {
      $account_data['access_token'] = $this->clean_token($account_data['access_token']);
      $account_data['expiration_date'] = $this->expiration_date($account_data['expires_in']);
      $account_data = array_intersect_key($account_data, $this->get_args());
      $accounts = $this->get_accounts();
      $accounts[$account_data['id']] = array_replace_recursive($this->get_args(), $account_data);
      if ($this->save_all($accounts)) {
        return $account_data;
      }
    }
  }

  function delete_account($id = null)
  {
    $accounts = $this->get_all();
    if ($accounts) {
      if (count($accounts) > 0) {
        unset($accounts[$id]);
        return $this->save_all($accounts);
      }
    }
  }

  function clean_token($maybe_dirty)
  {
    if (substr_count($maybe_dirty, '.') < 3) {
      return str_replace('634hgdf83hjdj2', '', $maybe_dirty);
    }

    $parts = explode('.', trim($maybe_dirty));
    $last_part = $parts[2] . $parts[3];
    $cleaned = $parts[0] . '.' . base64_decode($parts[1]) . '.' . base64_decode($last_part);

    return $cleaned;
  }

  function expiration_date($expires_in)
  {
    return strtotime(current_time('mysql')) + $expires_in - 1;
  }
}
