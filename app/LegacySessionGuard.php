<?php

namespace App;

use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;

class LegacySessionGuard extends SessionGuard
{
    public function user()
    {
        if ($this->loggedOut) {
            return;
        }

        if (! is_null($this->user)) {
            return $this->user;
        }
        if ((int) $id = $this->getSessionData()) {

        //  $id = array_get($this->getSessionData(), 'ban.id_member');

            $user = null;
        }

        if (! is_null($id)) {
            $user = $this->provider->retrieveById($id);
        }

        return $this->user = $user;
    }

    /**  verify smf cookie is user login or not
     *   @return user id
     *
     *
     **/
    protected function getSessionData()
    {
        $request = request();

        $cookieName = 'l2hotzoneCom';

        $cookie = $request->cookie($cookieName);

        $ID_MEMBER = 0;

        if (isset($cookie) && preg_match('~^a:[34]:\{i:0;(i:\d{1,6}|s:[1-8]:"\d{1,8}");i:1;s:(0|40):"([a-fA-F0-9]{40})?";i:2;[id]:\d{1,14};(i:3;i:\d;)?\}$~', $cookie) === 1) {
            list($ID_MEMBER, $password, $timeout) = unserialize($cookie);

            $ID_MEMBER = ! empty($ID_MEMBER) && strlen($password) > 0 ? (int) $ID_MEMBER : 0;
        }

        // if user id not
        if ($ID_MEMBER != 0) {
            if (strlen($password) == 40) {
                $user = $this->provider->retrieveById($ID_MEMBER);

                //    var_dump();
                //    var_dump(($timeout - $user->last_login));

                $check = sha1($user->passwd.$user->password_salt) == $password;

                return $ID_MEMBER;
            } else {
                return $check = false;
            }
        } else {
            return  $ID_MEMBER = false;
        }
    }
}
