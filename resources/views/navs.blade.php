
<?php
/**
 * Created by PhpStorm.
 * User: sabin
 * Date: 9/23/2016
 * Time: 9:07 PM
 */

if(Auth::check())
    {
        //print_r(Auth::user()->id);
Menu::make('MainMenu',function($menu)
{

    foreach(Route::getRoutes() as $route)
        {

            $role='';
            if( array_key_exists('role',$route->getAction()))
            {
                $role=$route->getAction()['role'];
                       // print_r($role);die();
            }

            if( array_key_exists('icon',$route->getAction()))
            {
               // print_r($route->getAction()['icon']);die();
                $icon='<i class="'.str_replace('_',' ',$route->getAction()['icon']).'"></i>';
            }
            else
                {
                    $icon='<i></i>';
                }
            if($role==Auth::user()->user_type_id)
                {
                   // print_r($route->getName());die();
                    $data=explode('@', $route->getName());
                   // print_r($data);die();
                    $name='';
                    if(array_key_exists(0,$data))
                        {
                            $name=str_replace('_',' ',$data[0]);
                          //  print_r($name);die();
                        }
                        $type="";
                    //print_r($route->getAction()['type']);die();
                      if(array_key_exists('type',$route->getAction()))
                          {
                              $type=$route->getAction()['type'];
                          }
                        if($type=='main')
                            {
                                $item=$menu->add($name,['route'=>$route->getName(),'class'=>'nav-item'])->divide();
                                $item->link->attr(['class'=>'nav-link']);
                                $currentRoute=Route::getCurrentRoute();
                              //  print_r($currentRoute);die();

                                $cdata=explode('@', $currentRoute->getName());
                                $item->link->attr(['class'=>'nav-link']);
                                if($cdata[0]==$data[0])
                                    {
                                       // print_r($data);die();
                                        $item->link->attr(['class'=>'nav-link active']);
                                    }

                                $item->prepend($icon);
                            }


                }



        }

});

Menu::make('SubMenu',function($menu)
{
    foreach(Route::getRoutes() as $route)
    {
        $role='';
        if( array_key_exists('role',$route->getAction()))
        {
            $role=$route->getAction()['role'];
        }
        if( array_key_exists('icon',$route->getAction()))
        {
            $icon='<i class="'.str_replace('_',' ',$route->getAction()['icon']).'"></i>';
        }
        else
        {
            $icon='<i></i>';
        }
        if($role==Auth::user()->user_type_id)
        {
            $data=explode('@', $route->getName());
            $name='';
            if(array_key_exists(1,$data))
            {
                $name=str_replace('_',' ',$data[1]);
            }
            $type="";
            if(array_key_exists('type',$route->getAction()))
            {
                $type=$route->getAction()['type'];
            }
            if($type=='sub'&& $route->getPrefix()==Route::getCurrentRoute()->getPrefix())
            {
                $item=$menu->add($name,['route'=>$route->getName(),'class'=>'nav-item'])->divide();
                $item->link->attr(['class'=>'nav-link']);
                //print_r($route->getName().'-'.Route::getCurrentRoute()->getName().'<br/>');
                if($route->getName()==Route::getCurrentRoute()->getName())
                {

                    $item->link->attr(['class'=>'nav-link active']);
                }
                $item->prepend($icon);
            }


        }



    }

});
        }
?>

@if(Auth::check())

   {!! Menu::get('MainMenu')->asUl(['class'=>"nav nav-tabs",'id'=>'navmain', 'role'=>"tablist"]) !!}
   {!! Menu::get('SubMenu')->asUl(['class'=>"nav  ", 'role'=>"tablist"]) !!}

@endif