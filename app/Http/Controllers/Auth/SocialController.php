<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function getSocialRedirect( $provider )
    {

        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {

            return view('pages.status')
                ->with('error','No such provider');

        }

        return Socialite::driver( $provider )->redirect();

    }

    public function getSocialHandle( $provider )
    {

        if (Input::get('error') != '') { // access_denied

            return redirect()->route('home')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');

        }


        $user = Socialite::driver( $provider )->user();

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();

        $email = $user->email;

        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }

        if (!empty($userCheck)) {

            $socialUser = $userCheck;

        } else {

            $sameSocialId = Social::where('social_id', '=', $user->id)
                ->where('provider', '=', $provider )
                ->first();

            if (empty($sameSocialId)) {

                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User();
                $newSocialUser->email = $email;
                $name = explode(' ', $user->name);

//                if (count($name) >= 1) {
//                    $newSocialUser->first_name = $name[0];
//                }
//
//                if (count($name) >= 2) {
//                    $newSocialUser->last_name = $name[1];
//                }
                $newSocialUser->first_name = count($name) >= 1 ? $name[0] : '';
                $newSocialUser->last_name = count($name) >= 2 ? $name[1] : '';

                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->token = str_random(64);
                $newSocialUser->save();

                $socialData = new Social();
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                // Add role
                $role = Role::whereName('user')->first();
                $newSocialUser->assignRole($role);

                $socialUser = $newSocialUser;

            }
            else {

                //Load this existing social user
                $socialUser = $sameSocialId->user;

            }

        }

        auth()->login($socialUser, true);

        if ( auth()->user()->hasRole('user')) {

            return redirect()->route('home');

        }

        if ( auth()->user()->hasRole('administrator')) {

            return redirect()->route('admin.home');

        }

        return abort(500, 'User has no Role assigned, role is obligatory! You did not seed the database with the roles.');

    }
}
