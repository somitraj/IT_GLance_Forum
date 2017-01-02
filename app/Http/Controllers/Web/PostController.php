<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IT_Glance_Forum\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;


class PostController extends Controller
{
    public function Post(FormBuilder $formBuilder,Request $request){
        try{
            $client = new Client(['base_uri' => config('app.REST_API')]);

            $response = $client->request('GET', 'category');
            $data = $response->getBody()->getContents();
            $category = \GuzzleHttp\json_decode($data);
            if ($request->getMethod() == 'POST') { //activates register button
                try {

                    $response = $client->request('POST', 'forumpost', [ //fetching form datas
                        'form_params' => [
                            'category_id' => $request->get('category'),
                            'posttitle' => $request->get('posttitle'),
                            'postbody' => $request->get('postbody'),
                            'uid'=>Auth::user()->id,
                        ]
                    ]);

                  /*  $data = $response->getBody()->getContents();
                    $u = \GuzzleHttp\json_decode($data);*/

                } catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }
                $request->session()->flash('alert-success', 'Posted Successfully!');
            }

            $form = $formBuilder->Create('IT_Glance_Forum\Form\CategoryForm',
                ['method' => 'POST', 'url' => route('Post@admin')],
                ['category' => $category, ]);

            return view('Post', compact('form'));
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }

    public function PostDetails($id)
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'postdetails/' . $id);
            $data = $response->getBody()->getContents();
            $details = \GuzzleHttp\json_decode($data);
            return view('ViewPostDetails', compact('details'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
    public function PostApprove($id)
    {
        try {
            //print_r($id);die();
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'postapprove/' . $id);
             //$data = $response->getBody()->getContents();
             //$all = \GuzzleHttp\json_decode($data);
            return view('demo');

        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}
