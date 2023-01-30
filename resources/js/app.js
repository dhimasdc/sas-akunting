import './bootstrap';

import focus from '@alpinejs/focus';
import mask from '@alpinejs/mask'

Alpine.plugin(mask);
Alpine.plugin(focus);

import ApexCharts from 'apexcharts';

var Turbolinks = require("turbolinks")
Turbolinks.start()