<?php

namespace App\Livewire;

use CodersFree\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CourseEnrolled extends Component
{
    public $course;

    public function addCart()
    {
        Cart::instance('shopping');
        Cart::add([
            'id' => $this->course->id,
            'name' => $this->course->title,
            'qty' => 1,
            'price' => $this->course->price->value,
            'options' => [
                'slug' => $this->course->slug,
                'image' => $this->course->image,
                'teacher' => $this->course->teacher->name,
            ]
        ]);
    }

    public function removeCart()
    {
        Cart::instance('shopping');
        $itemCart = Cart::content()->where('id', $this->course->id)->first();

        if ($itemCart) {
            Cart::remove($itemCart->rowId);
        }

    }

    public function buyNow()
    {
        $this->removeCart();
        $this->addCart();
        //Redireccionar a la pagina de checkout

        return redirect()->route('cart.index');
    }

    public function render()
    {
        return view('livewire.course-enrolled');
    }
}