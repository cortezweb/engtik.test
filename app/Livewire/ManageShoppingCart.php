<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;


use CodersFree\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ManageShoppingCart extends Component
{

    public function remove($rowId)
    {
        Cart::instance('shopping');
        Cart::remove($rowId);

        $this->dispatch('cart-updated', Cart::count());

        if (auth::check()){
            Cart::store(Auth::id());
        }
    }

    public function destroy()
    {
        Cart::instance('shopping');
        Cart::destroy();

        $this->dispatch('cart-updated', Cart::count());

        if (auth::check()){
            Cart::store(Auth::id());
        }
    }


    public function render()
    {
        return view('livewire.manage-shopping-cart');
    }
}
