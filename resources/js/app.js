require('./bootstrap');

import * as FilePond from "filepond";
//import Swal from 'sweetalert2'

window.Swal = require('sweetalert2')

const inputElement = document.querySelector('input[type="file"]');
const token = document.querySelector('input[name="_token"]');
const userId = document.querySelector('input[name="user_id"]');

const pond = FilePond.create( inputElement );

FilePond.setOptions({
    name:'avatar',
    server: {
        url: '/dashboard/user/upload-avatar/'+userId.value,
        headers: {
            'X-CSRF-TOKEN': token.value
        }
    }
});

//Swal.fire('Hello world!')