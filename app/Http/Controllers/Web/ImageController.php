<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use IT_Glance_Forum\Http\Requests;
use IT_Glance_Forum\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function ImageUploadPost(Request $request)
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);

            $image = $request->file('proimage');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = public_path('/profile_pic');
            $image->move($destinationPath, $input['imagename']);

            $imagename = $input['imagename'];
            $response = $client->request('POST', 'changeprofileimage', [
                'form_params' => [
                    'image' => $imagename,
                    'uid' => Auth::user()->id,
                ]
            ]);
            //$data = $response->getBody()->getContents();
            //print_r($data);die();
            //$request->session()->flash('alert-success', 'Posted Successfully!');
            if (Auth::user()->user_type_id == 1) {
                return redirect()->route('My_Profile@admin');
            } elseif (Auth::user()->user_type_id == 2) {
                return redirect()->route('My_Profile@mentor');

            } elseif (Auth::user()->user_type_id == 3) {
                return redirect()->route('My_Profile@submentor');

            } else {
                return redirect()->route('My_Profile@intern');
            }

        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
}
