<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use IT_Glance_Forum\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;


/**
 * Class PostController
 * @package IT_Glance_Forum\Http\Controllers\Web
 */
class PostController extends Controller
{
    /**
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Post(FormBuilder $formBuilder, Request $request)
    {
        try {
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
                            'uid' => Auth::user()->id,
                        ]
                    ]);

                    /*$data = $response->getBody()->getContents();
                  print_r($data);die();
                  $u = \GuzzleHttp\json_decode($data);*/


                } catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }
                $request->session()->flash('alert-success', 'Posted Successfully!');
            }
            if (Auth::user()->user_type_id == 1) {
                $form = $formBuilder->Create('IT_Glance_Forum\Form\CategoryForm',
                    ['method' => 'POST', 'url' => route('Post@admin')],
                    ['category' => $category,]);
            } elseif (Auth::user()->user_type_id == 2) {
                $form = $formBuilder->Create('IT_Glance_Forum\Form\CategoryForm',
                    ['method' => 'POST', 'url' => route('Post@mentor')],
                    ['category' => $category,]);

            } elseif (Auth::user()->user_type_id == 3) {
                $form = $formBuilder->Create('IT_Glance_Forum\Form\CategoryForm',
                    ['method' => 'POST', 'url' => route('Post@submentor')],
                    ['category' => $category,]);

            } else {
                $form = $formBuilder->Create('IT_Glance_Forum\Form\CategoryForm',
                    ['method' => 'POST', 'url' => route('Post@intern')],
                    ['category' => $category,]);
            }

            return view('Post', compact('form'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostApprove($id)
    {
        try {
            //print_r($id);die();
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'postapprove/' . $id);
            //$data = $response->getBody()->getContents();
            //$all = \GuzzleHttp\json_decode($data);
            return redirect('admin/postnotice');

        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }


}
