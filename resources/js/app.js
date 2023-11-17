import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialization for ES Users
import {
  Input,
  initTE,
  Collapse,
  Select
} from "tw-elements";

initTE({ Input, Select, Collapse   });

