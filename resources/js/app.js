import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialization for ES Users
import {
  Input,
  initTE,
  Collapse,
  Select,
  Ripple,
} from "tw-elements";

initTE({ Input, Select, Collapse, Ripple });


import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles

AOS.init();


AOS.init({

  duration: 500, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: true, // whether animation should happen only once - while scrolling down

});