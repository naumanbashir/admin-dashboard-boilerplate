import {popper} from "@popperjs/core";

window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


import * as Popper from 'popper.js'
import {Chart, registerables} from "chart.js";
import PerfectScrollbar from "perfect-scrollbar";
import {Scrollbar} from "smooth-scrollbar/scrollbar";
import {Calendar} from "fullcalendar";

try {
    Chart.register(...registerables);

    window.Popper = Popper
    window.$ = window.jQuery = require('jquery')
    window.Chart = Chart
    window.Calendar = Calendar
    window.Scrollbar = Scrollbar
    window.PerfectScrollbar = PerfectScrollbar
} catch (e) {}

import * as Bootstrap from 'bootstrap'

window.bootstrap = Bootstrap


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
