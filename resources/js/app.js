import './bootstrap';

import Alpine from 'alpinejs';
document.addEventListener('alpine:init', () => {
    Alpine.data('sideBar', () => ({
        toggledSideBar: false,

        toggle() {
            this.toggledSideBar = ! this.toggledSideBar
        }
    }) )

})

window.Alpine = Alpine;

Alpine.start();
