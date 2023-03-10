<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\{ Validator, DB };
use Livewire\WithFileUploads;
use App\Models\{ 
    ProductBatik,
    Pemesanan,
    Media,
    PemesananKeranjang,
    ProductPesanan,
};

class Transaksi extends Component
{
    use WithFileUploads;

    public $detailPemesanan; 
    public $pemesanan; 
    public $product_pesanan;

    public $media = [];
    public $reviewData = [];
    
    public function mount($user){
        $this->user = $user;
        $this->pemesanan = PemesananKeranjang::query()
            ->where('keranjang_id', $this->user->keranjang->id)
            ->get();
        
        $this->pemesanan = Pemesanan::query()
            ->with(['pembayaran', 'productpesanan'])
            ->whereIn('id', $this->pemesanan->map->only(['pemesanan_id']))
            ->get();
        $this->url = 'transaksi';
    }

    public function detailP($id){
        if($this->user == null){
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
        }
        $this->url = 'pembayaran';
        
        $this->pemesanan = Pemesanan::query()
            ->with(['pembayaran'])
            ->where('id', $id)
            ->get();
        
        $this->product_pesanan = ProductPesanan::query()
            ->with(['productbatik', 'reviewproduct'])
            ->withCount(['reviewproduct as review_count' => function ($query) {
                $query->where('user_id', '=', $this->user->id);
            }])
            ->where('pemesanan_id', $this->pemesanan[0]->id)
            ->get();
    }

    public function bayar(){
        $this->pemesanan[0]->status = 3;
        $this->pemesanan[0]->update();
        $this->pemesanan[0]->pembayaran->status = 2;
        $this->pemesanan[0]->pembayaran->update();
        return 'pembayaran berhasil';
    }

    public function review(ProductBatik $batik, $media, $reviewData){
        $reviewData = [
            'user_id' => $this->user->id,
            'product_id' => $batik->id,
            'judul' => $reviewData[0],
            'komentar' => $reviewData[1],
            'rating' => $reviewData[2],
            'media' => $this->media
        ];
        
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari 5 karakter',
            'array' => 'Input :attribute tidak valid',
            'media.max' => 'File :attribute tidak boleh lebih dari 1 megabytes',
        ];

        $rules = [
            'user_id' => 'required',
            'product_id' => 'required',
            'judul' => 'required|min:5',
            'komentar' => 'required|min:5',
            'rating' => 'required|min:1|max:5',
            'media' => 'array',
            'media.*' => 'required|image|max:1024|mimes:jpg,png,jpeg,gif,svg'
        ];

        dd(Validator::validate($reviewData, $rules, $messages));
        dd('test', $reviewData);
        $reviewData = Validator::validate($reviewData, $rules, $messages);
        $review = $batik->reviewproduct()->create($reviewData);

        if($this->media){
            foreach ($this->media as $media) {
                $media = '/' . $media->store('img/Review', ['disk' => 'public_uploads']);
                $payload = [
                    'entitas_id' => $review->id,
                    'nama_entitas' => 'review_product',
                    'file' => $media,
                    'ekstensi' => substr($media, strrpos($media, '.')+1)
                ];
                Media::create($payload);
                $reviewData['media'] = $media;
            }
        }
        $review->update($reviewData);
        return true;
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
