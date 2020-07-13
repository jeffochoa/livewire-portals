<script>
    document.addEventListener("livewire:load", function(event) {
        window.addEventListener('portal-open', function (e) {
            var fn;
            var portal = document.querySelector('[wire\\:portal="'+e.detail.portal+'"]');
            if (portal.hasAttribute('wire:portal.replace')) {
                portal.innerHTML = e.detail.content;
            } else {
                portal.innerHTML += e.detail.content;
            }
            if (portal.getAttribute('wire:portal-end')) {
                eval(`var fn = function () {  ${portal.getAttribute('wire:portal-end')} }`);
                fn.call()
            }
        });
    });
</script>