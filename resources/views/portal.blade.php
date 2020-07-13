{{-- <div wire:portal="modal"  > --}}
<div wire:portal="modal"></div>
{{-- <div id="{{$id = Str::random(10)}}" x-data x-on:expand.window="
document.querySelector('#{{$id}}').innerHTML=$event.detail.content;
window.livewire.rescan();
Prism.highlightElement(document.querySelector('#{{$id}} pre'));
"></div> --}}

<script>
    document.addEventListener("livewire:load", function(event) {
        document.querySelector('[wire:portal]').forEach(function (el) {
            el.addEventListener('portal-open', function (e) {
                if (e.target.getAttribute('wire:portal') === e.detail.portal) {
                    e.target.innerHTML = e.detail.content;
                    window.livewire.rescan();
                }
            });
        });
    });
</script>