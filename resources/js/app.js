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

initTE({ Input, Select, Collapse, Ripple});

