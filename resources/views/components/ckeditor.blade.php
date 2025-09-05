<div>
    <div
        wire:ignore
        x-data="{
            content: @entangle($attributes->wire('model')),
            }"
                x-init="
                ClassicEditor
                .create($refs.editor)
                .then(editor=> {
                    if (content){
                        editor.setData(content);
                    }

                    editor.model.document.on('change:data', () => {
                        content = editor.getData();

                    });
                 })
                .catch(error => {
                    console.error(error);
                });
                    ">
                        <x-textarea x-ref="editor"></x-textarea>
    </div>


    <x-input-error for="{{ $attributes->wire('model') }}" class="mt-2" />
</div>