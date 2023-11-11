import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialization for ES Users
import {
  Input,
  initTE,
} from "tw-elements";

initTE({ Input });

// import Dropzone from 'dropzone';
// Dropzone.autoDiscover = false;
// const dropzone = new Dropzone('#dropzone', {
//   dictDefaultMessage: "Sube aqui tu imagen",
//   acceptedFiles: ".png, .jpg, jpeg, .gif",
//   addRemoveLinks: true,
//   dictRemoveFile: 'Borrar Archivo',
//   maxFiles: 1,
//   uploadMultiple: false,
// });