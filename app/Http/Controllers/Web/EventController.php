<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use IT_Glance_Forum\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    /**
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostEvent(FormBuilder $formBuilder, Request $request)
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'getevent');
            $data = $response->getBody()->getContents();
            $postedevent = \GuzzleHttp\json_decode($data);
            //rint_r($postedevent);die();

            if ($request->getMethod() == 'POST') { //activates register button
                try {
                    $image = $request->file('event_image');
                    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/thumbnail');
                    $img = Image::make($image->getRealPath());
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['imagename']);

                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $input['imagename']);

                    $imagename = $input['imagename'];
                    $response = $client->request('POST', 'eventpost', [ //fetching form datas
                        'form_params' => [
                            'event_title' => $request->get('event_title'),
                            'start' => $request->get('start'),
                            'end' => $request->get('end'),
                            'location' => $request->get('location'),
                            'image' => $imagename,
                            'description' => $request->get('description'),
                            'uid' => Auth::user()->id,
                        ]
                    ]);

                    /*$data = $response->getBody()->getContents();
                    $u = \GuzzleHttp\json_decode($data);*/
                    // print_r('done');die();

                } catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }
                $request->session()->flash('alert-success', 'Posted Successfully!');
            }
            $form = $formBuilder->Create('IT_Glance_Forum\Form\EventForm',
                ['method' => 'POST', 'url' => route('Event@submentor')]);

            return view('Event', compact('form','postedevent'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }


    /**
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ShowEvent(FormBuilder $formBuilder, Request $request){
        $client = new Client(['base_uri' => config('app.REST_API')]);
        $response = $client->request('GET', 'getevent');
        $data = $response->getBody()->getContents();
        $postedevent = \GuzzleHttp\json_decode($data);
        $events = [];
        foreach($postedevent as $pd){
            $events[] = Calendar::event(
                "{$pd->event_title}",//event title
                true,//full day: boolean value
                "{$pd->start_datetime}",//event staring date
                "{$pd->end_datetime}",//event  ending date
                1,
                [
                    'url' => 'www.facebook.com',
                    'color' => 'red'
                ]
            );


            $calendar = Calendar::addEvents($events)
                ->setOptions([
                    'firstDay' => 1,
                ])->setCallbacks([

                ]);
        }

        if ($request->getMethod() == 'POST') { //activates register button
            try {
                //print_r('hi');die();
                $image = $request->file('event_image');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                /*print_r($input['imagename']);
                die();*/
                $destinationPath = public_path('/thumbnail');
                $img = Image::make($image->getRealPath());
                //print_r($img);die();
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['imagename']);

                $destinationPath = public_path('/eventimage');
                $image->move($destinationPath, $input['imagename']);

                $imagename = $input['imagename'];
                $response = $client->request('POST', 'eventpost', [ //fetching form datas
                    'form_params' => [
                        'event_title' => $request->get('event_title'),
                        'start' => $request->get('start'),
                        'end' => $request->get('end'),
                        'location' => $request->get('location'),
                        'image' => $imagename,
                        'description' => $request->get('description'),
                        'uid' => Auth::user()->id,
                    ]
                ]);

            } catch (\Exception $e) {
                print_r($e->getMessage());
                die();
            }
            $request->session()->flash('alert-success', 'Posted Successfully!');
        }
        $form = $formBuilder->Create('IT_Glance_Forum\Form\EventForm',
            ['method' => 'POST', 'url' => route('Event@admin')]);
        return view('Events.Events', compact('form'),array('calendar'=>$calendar));
    }
}
