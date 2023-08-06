<?php

namespace App\Http\Controllers;

use App\Models\SocialNetworks;
use App\Models\User;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ResizeController;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\OperationServicesController;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
                
        return view('profile.edit', [
            'user' => $request->user(),
            'avatar' => OperationServicesController::getAuthUserImageProfile("avatar"),
            'portada' => OperationServicesController::getAuthUserImageProfile("portadaPerfil"),
            'facebook' => $this->getNetwork('facebook'),
            'twitter' => $this->getNetwork('twitter'),
            'instagram' => $this->getNetwork('instagram'),
            'youtube' => $this->getNetwork('youtube'),
            'tiktok' => $this->getNetwork('tiktok'),
            'linkedin' => $this->getNetwork('linkedin')
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->action) {
            switch ($request->action) {
                case 'foto-perfil':
                    ResizeController::resizeImage($request);
                    break;

                case 'portadaPerfil':
                    ResizeController::resizeImage($request);
                    break;

                case 'rrss':
                    $this->rrss($request);
                    break;
                
                default:
                    dd('defael del suiche');
                    break;
            }
        } else {

            try {
                
                $request->user()->fill($request->validated());

                if ($request->user()->isDirty('email')) {
                    $request->user()->email_verified_at = null;
                }

                if ($request->biography) {
                    $save = User::find($request->user()->id);
                    $save->biography = $request->biography;
                    $save->save();
                }
                
                $request->user()->save();
            } catch (Exception $e) {
                logger($e);
            }
            
        }
        
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function getNetwork($criterio)
    {
        $getSN = SocialNetworks::where('user_id', '=', Auth::user()->id)
                    ->where('sn_network', '=', $criterio)
                    ->whereNull('deleted')
                    ->get();

        if (count($getSN) >= 1) {
            $response = $getSN[0]['sn_url']; 
        } else {
            $response = NULL;
        }
        
        return $response;
    }

    public function rrss($request) {
        for ($i=0; $i < count($request->all()); $i++) { 
            if ($request->facebook) {
                $getSN = SocialNetworks::where('user_id', '=', Auth::user()->id)
                    ->where('sn_network', '=', 'facebook')
                    ->whereNull('deleted')
                    ->get();
                    
                if (count($getSN) >= 1) {
                    $getSN = SocialNetworks::find($getSN[0]['id']);
                    $getSN->sn_url = $request->facebook;
                    $getSN->save();
                } else {
                    $save = [
                        'user_id' => Auth::user()->id,
                        'sn_network' => 'facebook',
                        'sn_url' => $request->facebook
                    ];
                    SocialNetworks::create($save);
                }
            }
            if ($request->twitter) {
                $getSN = SocialNetworks::where('user_id', '=', Auth::user()->id)
                    ->where('sn_network', '=', 'twitter')
                    ->whereNull('deleted')
                    ->get();
                    
                if (count($getSN) >= 1) {
                    $getSN = SocialNetworks::find($getSN[0]['id']);
                    $getSN->sn_url = $request->twitter;
                    $getSN->save();
                } else {
                    $save = [
                        'user_id' => Auth::user()->id,
                        'sn_network' => 'twitter',
                        'sn_url' => $request->twitter
                    ];
                    SocialNetworks::create($save);
                }
            }
            if ($request->instagram) {
                $getSN = SocialNetworks::where('user_id', '=', Auth::user()->id)
                    ->where('sn_network', '=', 'instagram')
                    ->whereNull('deleted')
                    ->get();
                    
                if (count($getSN) >= 1) {
                    $getSN = SocialNetworks::find($getSN[0]['id']);
                    $getSN->sn_url = $request->instagram;
                    $getSN->save();
                } else {
                    $save = [
                        'user_id' => Auth::user()->id,
                        'sn_network' => 'instagram',
                        'sn_url' => $request->instagram
                    ];
                    SocialNetworks::create($save);
                }
            }
            if ($request->tiktok) {
                $getSN = SocialNetworks::where('user_id', '=', Auth::user()->id)
                    ->where('sn_network', '=', 'tiktok')
                    ->whereNull('deleted')
                    ->get();
                    
                if (count($getSN) >= 1) {
                    $getSN = SocialNetworks::find($getSN[0]['id']);
                    $getSN->sn_url = $request->tiktok;
                    $getSN->save();
                } else {
                    $save = [
                        'user_id' => Auth::user()->id,
                        'sn_network' => 'tiktok',
                        'sn_url' => $request->tiktok
                    ];
                    SocialNetworks::create($save);
                }
            }
            if ($request->youtube) {
                $getSN = SocialNetworks::where('user_id', '=', Auth::user()->id)
                    ->where('sn_network', '=', 'youtube')
                    ->whereNull('deleted')
                    ->get();
                    
                if (count($getSN) >= 1) {
                    $getSN = SocialNetworks::find($getSN[0]['id']);
                    $getSN->sn_url = $request->youtube;
                    $getSN->save();
                } else {
                    $save = [
                        'user_id' => Auth::user()->id,
                        'sn_network' => 'youtube',
                        'sn_url' => $request->youtube
                    ];
                    SocialNetworks::create($save);
                }
            }
            if ($request->linkedin) {
                $getSN = SocialNetworks::where('user_id', '=', Auth::user()->id)
                    ->where('sn_network', '=', 'linkedin')
                    ->whereNull('deleted')
                    ->get();
                    
                if (count($getSN) >= 1) {
                    $getSN = SocialNetworks::find($getSN[0]['id']);
                    $getSN->sn_url = $request->linkedin;
                    $getSN->save();
                } else {
                    $save = [
                        'user_id' => Auth::user()->id,
                        'sn_network' => 'linkedin',
                        'sn_url' => $request->linkedin
                    ];
                    SocialNetworks::create($save);
                }
            }
        }
    }
}
