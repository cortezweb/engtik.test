@props(['label' => ''])

<button
wire:ignore
class="flex items-center" x-data="{
    active: @entangle($attributes->wire('model')).live,
  }" x-on:click="active = !active">
    <i class="fas text-2xl mr-2"
        :class="{
            'fa-toggle-on text-blue-600': active,
            'fa-toggle-off text-gray-600': !active,
        }"></i>

        <span class="text-sm ml-2">
            {{$label}}
        </span>
</button>
