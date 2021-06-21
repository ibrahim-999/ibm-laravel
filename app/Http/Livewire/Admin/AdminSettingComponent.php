<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $facebook;
    public $linkedin;
    public $youtube;
    public $instagram;
    public $pinterest;
    public $twitter;


    public function mount()
    {
        $settings = Setting::find(1);
        if($settings)
        {
            $this->email = $settings->email;
            $this->phone = $settings->phone;
            $this->phone2 = $settings->phone2;
            $this->address = $settings->address;
            $this->map = $settings->map;
            $this->facebook = $settings->facebook;
            $this->linkedin = $settings->linkedin;
            $this->youtube = $settings->youtube;
            $this->instagram = $settings->instagram;
            $this->pinterest = $settings->pinterest;
            $this->twitter = $settings->twitter;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'email'=>'required|email',
            'phone'=>'required',
            'phone2'=>'required',
            'address'=>'required',
            'map'=>'required',
            'facebook'=>'required',
            'linkedin'=>'required',
            'youtube'=>'required',
            'instagram'=>'required',
            'pinterest'=>'required',
            'twitter'=>'required',
        ]);

    }

    public function saveSettings()
    {
        $this->validate([
            'email'=>'required|email',
            'phone'=>'required',
            'phone2'=>'required',
            'address'=>'required',
            'map'=>'required',
            'facebook'=>'required',
            'linkedin'=>'required',
            'youtube'=>'required',
            'instagram'=>'required',
            'pinterest'=>'required',
            'twitter'=>'required',

        ]);

        $settings = Setting::find(1);
        if(!$settings)
        {
            $settings = new Setting();
        }
        $settings->email = $this->email;
        $settings->phone = $this->phone;
        $settings->phone2 = $this->phone2;
        $settings->address = $this->address;
        $settings->map = $this->map;
        $settings->facebook = $this->facebook;
        $settings->linkedin = $this->linkedin;
        $settings->youtube = $this->youtube;
        $settings->instagram = $this->instagram;
        $settings->pinterest = $this->pinterest;
        $settings->twitter = $this->twitter;
        $settings->save();
        session()->flash('message','Settings have been saved successfully!');


    }


    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
