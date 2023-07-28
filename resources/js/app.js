import './bootstrap';
import Turbolinks from 'turbolinks';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import 'flowbite';

Turbolinks.start();
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
