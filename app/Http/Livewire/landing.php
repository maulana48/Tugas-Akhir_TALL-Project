<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Sanctum\PersonalAccessToken as PAT;
use App\Models\{ 
    KategoriProduct
};

class Landing extends Component
{
    public $user;
    public $title;
    public $icon;
    public $url;
    public $productId;
    public $kategori;
    public $cartProduct;

    public $listeners = ['shop', 'logout', 'registration', 'login', 'checkOut' => '$refresh'];

    public function boot(){
    }

    public function mount(){
        // dd(session()->all());
        $this->url = 'cart';
        $this->kategori = KategoriProduct::all();
        $token = session()->get('token'. '');
        if(!$token == ''){
            $token = PAT::findToken($token->plainTextToken);
            if($token){
                $this->user = $token->tokenable;
                $this->cartProduct = $this->user->keranjang->productkeranjang->count();
            }
        }

        // if($token != ''){
        //     $headers['authorization'] = "Bearer $token";
        // }
    }
    
    public function home(){
        $this->url = 'index';
    }

    public function shop(){
        $this->url = 'shop';
    }

    public function detailProduct($id){
        $this->url = 'product';
        $this->productId = 1;
    }

    public function cart(){
        if($this->user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
        }
        else{
            $this->url = 'cart';
        }
    }

    public function checkOut(){
        if($this->user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
        }
        else{
            $this->url = 'check-out';
        }
    }

    public function profile(){
        if($this->user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
        }
        else{
            $this->url = 'profile';
        }
    }
    
    public function login(){
        if($this->user){
            return;
        }
        $this->url = 'auth.login';
        $this->title = 'Login Page';
        $this->icon = 'batik(1).png';
    }

    public function logout(){
        $this->url = 'auth.login';
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

    public function registration(){
        $this->url = 'auth.registration';
    }

    
    public function render()
    {
        if($this->user){
            $this->cartProduct = $this->user->keranjang->productkeranjang->count();
        }  
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';

        return view('livewire.landing')->layout('layouts.app', [
            'title' => $this->title,
            'icon' => $this->icon,
        ]);
    }
}
