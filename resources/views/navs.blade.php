
<?php
/**
 * Created by PhpStorm.
 * User: sabin
 * Date: 9/23/2016
 * Time: 9:07 PM
 */

if(Auth::check())
    {
Menu::make('MainMenu',function($menu)
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
            if($role==Auth::user()->group_id)
                {
                    $data=explode('@', $route->getName());
                    $name='';
                    if(array_key_exists(0,$data))
                        {
                            $name=str_replace('_',' ',$data[0]);
                        }
                        $type="";
                      if(array_key_exists('type',$route->getAction()))
                          {
                              $type=$route->getAction()['type'];
                          }
                        if($type=='main')
                            {
                                $item=$menu->add($name,['route'=>$route->getName(),'class'=>'nav-item'])->divide();
                                $item->link->attr(['class'=>'nav-link']);
                                $currentRoute=Route::getCurrentRoute();
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
        if($role==Auth::user()->group_id)
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

   {!! Menu::get('MainMenu')->asUl(['class'=>"nav nav-tabs warning-color-dark ", 'role'=>"tablist"]) !!}
   {!! Menu::get('SubMenu')->asUl(['class'=>"nav nav-tabs warning-color-dark ", 'role'=>"tablist"]) !!}

@endif