import './bootstrap';
import Alpine from 'alpinejs';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

window.Alpine = Alpine;
Alpine.start();

window.toastr = toastr;

toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
};